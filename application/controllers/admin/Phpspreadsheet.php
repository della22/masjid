<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Phpspreadsheet extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jamaah');
		$this->load->model('M_rekapitulasi');
		$this->load->model('M_arisan');
		$this->load->helper('dates_helper');
		$this->load->helper('rupiah_helper');
	}

	public function export()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', '1');
		$sheet->setCellValue('A2', '2');
		$sheet->setCellValue('A3', '3');

		$writer = new Xlsx($spreadsheet);
		$filename = 'name-of-the-generated-file';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output'); // download file
	}

	public function cetak_rekapitulasi($bulan = null, $tahun = null)
	{
		$list_rekapitulasi = $this->M_rekapitulasi->list_rekapitulasi_union($bulan, $tahun)->result_array();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$style_col = [
			'font' => ['bold' => true],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
			],
		];
		$sheet->setCellValue('A1', "REKAPITULASI PENERIMAAN DAN PENGELUARAAN MASJID BULAN " . bulan($bulan) . " TAHUN " . $tahun);
		$sheet->mergeCells('A1:F1');
		$sheet->getStyle('A1')->applyFromArray($style_col);
		$sheet->setCellValue('A2', "NO");
		$sheet->setCellValue('B2', "KATEGORI");
		$sheet->setCellValue('C2', "TANGGAL");
		$sheet->setCellValue('D2', "KETERANGAN");
		$sheet->setCellValue('E2', "DEBET");
		$sheet->setCellValue('F2', "KREDIT");

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1    
		$numrow = 3; // Set baris pertama untuk isi tabel adalah baris ke 4   
		$total_pemasukan = 0;
		$total_pengeluaran = 0;
		$saldo = 0;
		foreach ($list_rekapitulasi as $rekap) {
			$total_pemasukan += ($rekap['jenis'] == 'pemasukan') ? (int) $rekap['nominal'] : 0;
			$total_pengeluaran +=  ($rekap['jenis'] == 'pengeluaran') ? (int) $rekap['nominal'] : 0;
			$saldo = (int) ($total_pemasukan - $total_pengeluaran);
			if ($rekap['jenis'] == 'pemasukan') {
				$kategori = $rekap['nama_kategori_masuk'];
			} elseif ($rekap['jenis'] == 'pengeluaran') {
				$kategori = $rekap['nama_kategori_masuk'];
			}
			$sheet->setCellValue('A' . $numrow, $no);
			$sheet->setCellValue('B' . $numrow, $kategori);
			$sheet->setCellValue('C' . $numrow, $rekap['tanggal']);
			$sheet->setCellValue('D' . $numrow, $rekap['keterangan']);
			$sheet->setCellValue('E' . $numrow, ($rekap['jenis'] == 'pemasukan') ? 'Rp. ' . rupiah($rekap['nominal']) : '-');
			$sheet->setCellValue('F' . $numrow, ($rekap['jenis'] == 'pengeluaran') ? 'Rp. ' . rupiah($rekap['nominal']) : '-');
			$no++; // Tambah 1 setiap kali looping      
			$numrow++; // Tambah 1 setiap kali looping  
		}


		$sheet->setCellValue('A' . ($numrow), "TOTAL");
		$sheet->mergeCells('A' . ($numrow) . ':D' . ($numrow));
		$sheet->getStyle('A' . ($numrow))->applyFromArray($style_col);

		$sheet->setCellValue('E' . ($numrow), "Rp." . number_format($total_pemasukan));
		$sheet->getStyle('E' . ($numrow))->getFont()->setBold(true);

		$sheet->setCellValue('F' . ($numrow), "Rp." . number_format($total_pengeluaran));
		$sheet->getStyle('F' . ($numrow))->getFont()->setBold(true);

		$sheet->setCellValue('A' . ($numrow + 1), "SALDO BULAN " . bulan($bulan) . " TAHUN " . $tahun);
		$sheet->mergeCells('A' . ($numrow + 1) . ':E' . ($numrow + 1));
		$sheet->getStyle('A' . ($numrow + 1))->applyFromArray($style_col);


		$sheet->setCellValue('F' . ($numrow + 1), "Rp." . number_format($saldo));
		$sheet->getStyle('F' . ($numrow + 1))->getFont()->setBold(true);

		$sheet->getColumnDimension('A')->setWidth(5);
		$sheet->getColumnDimension('B')->setWidth(20);
		$sheet->getColumnDimension('C')->setWidth(25);
		$sheet->getColumnDimension('D')->setWidth(18);
		$sheet->getColumnDimension('E')->setWidth(18);
		$sheet->getColumnDimension('F')->setWidth(18);

		$writer = new Xlsx($spreadsheet);
		$filename = 'Rekapitulasi ' . bulan($bulan) . ' ' . $tahun;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output'); // download file
	}

	public function cetak_rekap_arisan($tahun = null)
	{
		$arisan_tahunan = $this->M_arisan->list_arisan_by_periode($tahun);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$style_col = [
			'font' => ['bold' => true],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
			],
		];
		$sheet->setCellValue('A1', "REKAP ARISAN PADA TAHUN " . $tahun);
		$sheet->mergeCells('A1:E1');
		$sheet->getStyle('A1')->applyFromArray($style_col);
		$sheet->setCellValue('A2', "NO");
		$sheet->setCellValue('B2', "NAMA");
		$sheet->setCellValue('C2', "TARGET");
		$sheet->setCellValue('D2', "TERBAYAR");
		$sheet->setCellValue('E2', "KEKURANGAN");

		$no = 1;
		$numrow = 3; // Set baris pertama untuk isi tabel adalah baris ke 4   

		foreach ($arisan_tahunan->result_array() as $periode_list) {
			$kekurangan = (int) $periode_list['biaya'] - (int) $periode_list['terbayar'];

			$sheet->setCellValue('A' . $numrow, $no);
			$sheet->setCellValue('B' . $numrow, $periode_list['nama_jamaah']);
			$sheet->setCellValue('C' . $numrow, 'Rp.' . rupiah($periode_list['biaya']));
			$sheet->setCellValue('D' . $numrow, 'Rp.' . rupiah($periode_list['terbayar']));
			$sheet->setCellValue('E' . $numrow, 'Rp.' . rupiah($kekurangan));
			$no++;
			$numrow++;
		}

		$sheet->getColumnDimension('A')->setWidth(5);
		$sheet->getColumnDimension('B')->setWidth(20);
		$sheet->getColumnDimension('C')->setWidth(25);
		$sheet->getColumnDimension('D')->setWidth(18);
		$sheet->getColumnDimension('E')->setWidth(18);
		$writer = new Xlsx($spreadsheet);
		$filename = 'Rekap Arisan Tahun ' . $tahun;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

	public function import_jamaah()
	{
		$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
			$arr_file = explode('.', $_FILES['upload_file']['name']);
			$extension = end($arr_file);
			if ('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else if ('xls' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			for ($i = 1; $i < count($sheetData); $i++) {
				// var_dump($sheetData[$i]);
				$nama_jamaah = $sheetData[$i][0];
				$telepon_jamaah = $sheetData[$i][1];
				$alamat_jamaah = $sheetData[$i][2];
				$tanggal_lahir = $sheetData[$i][3];
				$jenis_kelamin = $sheetData[$i][4];

				$data = array(
					'nama_jamaah' => $nama_jamaah,
					'telepon_jamaah' => $telepon_jamaah,
					'alamat_jamaah' => $alamat_jamaah,
					'tanggal_lahir' => $tanggal_lahir,
					'jenis_kelamin' => $jenis_kelamin,
				);
				// $cek_id = $this->M_jamaah->get_id($id_jamaah)->num_rows();
				// if ($cek_id == 0) {
				// 	$this->M_jamaah->import_data($data);
				// }
				$this->M_jamaah->import_data($data);
			}

			$this->session->set_flashdata('success', 'Item berhasil diimport');
			redirect('admin/jamaah');
			// code...
		}
	}
}
