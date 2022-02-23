<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Phpspreadsheet extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('M_ustadz');
	}

	public function export(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');
		$writer = new Xlsx($spreadsheet);
		$filename = 'name-of-the-generated-file';

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