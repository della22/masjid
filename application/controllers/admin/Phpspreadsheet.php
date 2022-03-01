<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Phpspreadsheet extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('M_ustadz');
	    $this->load->model('M_rekapitulasi');
	    $this->load->helper('dates_helper');
	}

	public function export(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', '1');
		$sheet->setCellValue('A2', '2');
		$sheet->setCellValue('A3', '3');

		$writer = new Xlsx($spreadsheet);
		$filename = 'name-of-the-generated-file';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output'); // download file
	}

	public function cetak_rekapitulasi($bulan = null, $tahun = null){
		$rekapitulasi = $this->M_rekapitulasi->list_rekapitulasi_filter($bulan,$tahun)->result_array();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', "REKAPITULASI PENERIMAAN DAN PENGELUARAAN MASJID BULAN ".bulan($bulan)." TAHUN ".$tahun);     
		$sheet->mergeCells('A1:E1');     
		$sheet->getStyle('A1')->getFont()->setBold(true);
		$sheet->setCellValue('A2', "NO");
		$sheet->setCellValue('B2', "TANGGAL");
		$sheet->setCellValue('C2', "KETERANGAN");
		$sheet->setCellValue('D2', "DEBET");
		$sheet->setCellValue('E2', "KREDIT");

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1    
		$numrow = 3; // Set baris pertama untuk isi tabel adalah baris ke 4    
		$total_pemasukan = 0;
        $total_pengeluaran = 0;
        $saldo = 0;
		foreach($rekapitulasi as $data){
		    $sheet->setCellValue('A'.$numrow, $no);      
		    $sheet->setCellValue('B'.$numrow, $data['tanggal']);      
		    $sheet->setCellValue('C'.$numrow, $data['keterangan']);      
		    $sheet->setCellValue('D'.$numrow, ($data['nominal_pemasukan'] != null) ? 'Rp. '.number_format($data['nominal_pemasukan']): '-');      
		    $sheet->setCellValue('E'.$numrow, ($data['nominal_pengeluaran'] != null) ? 'Rp. '.number_format($data['nominal_pengeluaran']): '-');
		    $total_pemasukan = $total_pemasukan + $data['nominal_pemasukan']; 
            $total_pengeluaran = $total_pengeluaran + $data['nominal_pengeluaran']; 
            $saldo = ($total_pemasukan - $total_pengeluaran);         
		    $no++; // Tambah 1 setiap kali looping      
		    $numrow++; // Tambah 1 setiap kali looping    
		}
		$sheet->setCellValue('A'.($numrow), "TOTAL");    
		$sheet->mergeCells('A'.($numrow).':C'.($numrow));     
		$sheet->getStyle('A'.($numrow))->getFont()->setBold(true);
		// $sheet->getStyle('A'.($numrow))->getAlignment()->setHorizontal('center');
		// $sheet->getColumnDimension('A'.($numrow))->setAutoSize(true);

		$sheet->setCellValue('D'.($numrow), "Rp.".number_format($total_pemasukan));   
		$sheet->getStyle('D'.($numrow))->getFont()->setBold(true);

		$sheet->setCellValue('E'.($numrow), "Rp.".number_format($total_pengeluaran));   
		$sheet->getStyle('E'.($numrow))->getFont()->setBold(true);

		$sheet->setCellValue('A'.($numrow+1), "SALDO BULAN ".bulan($bulan)." TAHUN ".$tahun);    
		$sheet->mergeCells('A'.($numrow+1).':D'.($numrow+1));     
		$sheet->getStyle('A'.($numrow+1))->getFont()->setBold(true);

		$sheet->setCellValue('E'.($numrow+1), "Rp.".number_format($saldo));   
		$sheet->getStyle('E'.($numrow+1))->getFont()->setBold(true);

		$sheet->getColumnDimension('A')->setWidth(5);
		$sheet->getColumnDimension('B')->setWidth(15);
		$sheet->getColumnDimension('C')->setWidth(25);
		$sheet->getColumnDimension('D')->setWidth(15);
		$sheet->getColumnDimension('E')->setWidth(15);

		$writer = new Xlsx($spreadsheet);
		$filename = 'Rekapitulasi '.$bulan.$tahun;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output'); // download file
	}

	public function import_ustadz(){
		$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
			$arr_file = explode('.', $_FILES['upload_file']['name']);
			$extension = end($arr_file);
			if('csv' == $extension){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			for($i = 1;$i < count($sheetData);$i++){
				$nik = trim($sheetData[$i]['0']);
				$nama_ustadz = $sheetData[$i]['1'];
				$telepon_ustadz = $sheetData[$i]['2'];
				$alamat_ustadz = $sheetData[$i]['3'];

				$data= array(
					'nik' => $nik,
					'nama_ustadz' => $nama_ustadz,
					'telepon_ustadz' => $telepon_ustadz,
					'alamat_ustadz' => $alamat_ustadz,

				);
				$cek_nik = $this->M_ustadz->get_nik($nik)->num_rows();
				if ($cek_nik == 0) {
					$this->M_ustadz->import_data($data);
				}

			}

			$this->session->set_flashdata('success','Item berhasil diimport');
	        redirect('admin/ustadz');
			// code...
		}
	}
}