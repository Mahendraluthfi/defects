<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('././vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('epf'))) {
			redirect('login','refresh');
		}
		$this->load->model('Amodel');
		$this->load->library('Pdfgenerator');
	}

	public function index()
	{
		$data['content'] = 'dashboard';
		$this->load->view('index', $data);
	}

	public function line()
	{
		$data['content'] = 'line';
		$data['get'] = $this->Amodel->getline()->result();
		$this->load->view('index', $data);
	}

	public function line_get($id)
	{
		$data = $this->db->get_where('line', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function line_save()
	{
		$this->db->insert('line', array(
			'line' => $this->input->post('line'),
			'section' => $this->input->post('section'),
			'shift' => $this->input->post('shift'),
		));

		echo json_encode(array('status' => true));
	}

	public function line_edit($id)
	{
		$this->db->where('id', $id);	
		$this->db->update('line', array(
			'line' => $this->input->post('line'),
			'section' => $this->input->post('section'),
			'shift' => $this->input->post('shift'),
		));

		echo json_encode(array('status' => true));
			
	}

	public function line_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('line');
		redirect('dashboard/line','refresh');
	}

	public function defect()
	{
		$data['content'] = 'defect';
		$data['get'] = $this->db->get('defect')->result();
		$this->load->view('index', $data);
	}

	public function defect_get($id)
	{
		$data = $this->db->get_where('defect', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function defect_save()
	{
		$this->db->insert('defect', array(
			'defect_code' => $this->input->post('defect_code'),
			'remarks' => $this->input->post('remarks'),
		));

		echo json_encode(array('status' => true));
	}

	public function defect_edit($id)
	{
		$this->db->where('id', $id);	
		$this->db->update('defect', array(
			'defect_code' => $this->input->post('defect_code'),
			'remarks' => $this->input->post('remarks'),
		));

		echo json_encode(array('status' => true));
			
	}

	public function defect_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('defect');
		redirect('dashboard/defect','refresh');
	}

	public function input()
	{		
		$data['date'] = date('Y-m-d');		
		$data['content'] = 'input';
		$data['get'] = $this->Amodel->getinput()->result();
		$this->load->view('index', $data);	
	}

	public function input_add($date)
	{
		$data['get'] = $this->Amodel->getinputdate($date)->result();
		$data['line'] = $this->Amodel->getline()->result();
		$data['defect'] = $this->db->get('defect')->result();		
		$data['content'] = 'input_add';
		$this->load->view('index', $data);	
	}

	public function input_save()
	{
		$this->db->insert('data', array(
			'date' => $this->input->post('date'),
			'total' => $this->input->post('total'),
			'line_id' => $this->input->post('line'),
			'defect_code' => $this->input->post('defect'),
		));

		redirect('dashboard/input_add/'.$this->input->post('date'),'refresh');
	}

	public function input_delete($id,$date)
	{
		$this->db->where('id', $id);
		$this->db->delete('data');
		redirect('dashboard/input_add/'.$date,'refresh');
	}

	public function input_delete2($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('data');
		redirect('dashboard/input','refresh');
	}

	public function report()
	{				
		$data['content'] = 'report';		
		$this->load->view('index', $data);	
	}

	public function report_plant()
	{
		$d1 = $this->input->post('dateplant1');
		$d2 = $this->input->post('dateplant2');
		$shift = $this->input->post('shiftplant');
		if ($this->input->post('shiftplant') == "null") {
			$get = $this->Amodel->r_plantboth($d1,$d2)->result();
			$celltitle = 'TOP 3 Defect Plant (Shift A + Shift B) - Date ('.$d1.'-'.$d2.')';
		}else{
			$get = $this->Amodel->r_plantshift($d1,$d2,$shift)->result();
			$celltitle = 'TOP 3 Defect Plant '.$shift.' - Date ('.$d1.'-'.$d2.')';			
		}

		// echo json_encode($get);
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Defect System')
		->setLastModifiedBy('Autonomation')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->getActiveSheet()->mergeCells('A1:D1');
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', $celltitle)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'Code')
		->setCellValue('C3', 'Defect Name')
		->setCellValue('D3', 'Total')		
		;

		foreach(range('A','D') as $columnID) {
 		   $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
		}
		$spreadsheet->getActiveSheet()->getStyle('A1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		// Miscellaneous glyphs, UTF-8
		$no =1;
		$i = 4; foreach($get as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->defect_code)
		->setCellValue('C'.$i, $data->remarks)
		->setCellValue('D'.$i, $data->jumlah);	
		$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Export Data Report');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		$filename = $celltitle.".xlsx";
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;	
	}

	public function report_section()
	{
		$d1 = $this->input->post('datesection1');
		$d2 = $this->input->post('datesection2');
		$section = $this->input->post('section');
		$shift = $this->input->post('shift');		
		$get = $this->Amodel->r_section($d1,$d2,$shift,$section)->result();
		$celltitle = 'TOP 3 Defect '.$section.' '.$shift.' - Date ('.$d1.'-'.$d2.')';
		

		// echo json_encode($get);
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Defect System')
		->setLastModifiedBy('Autonomation')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->getActiveSheet()->mergeCells('A1:D1');
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', $celltitle)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'Code')
		->setCellValue('C3', 'Defect Name')
		->setCellValue('D3', 'Total')		
		;

		foreach(range('A','D') as $columnID) {
 		   $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
		}
		$spreadsheet->getActiveSheet()->getStyle('A1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		// Miscellaneous glyphs, UTF-8
		$no =1;
		$i = 4; foreach($get as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->defect_code)
		->setCellValue('C'.$i, $data->remarks)
		->setCellValue('D'.$i, $data->jumlah);	
		$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Export Data Report');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		$filename = $celltitle.".xlsx";
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;	
	}

	public function report_shift()
	{	
		$d1 = $this->input->post('dateshift1');
		$d2 = $this->input->post('dateshift2');
		$shift = $this->input->post('shift1');
		$data['title'] = 'TOP 3 Line Defect '.$shift.' - Date ('.date('d M Y', strtotime($d1)).'-'.date('d M Y', strtotime($d2)).')';
		$main = $this->Amodel->r_shiftmain($d1,$d2,$shift)->result();
		// $cek = $this->Amodel->r_shiftline('106',$d1,$d2)->result();
		foreach ($main as $key => $value) {
			$value->line_array = $this->Amodel->r_shiftline($value->defect_code,$d1,$d2)->result();
		}
		$data['get'] = $main;
		// print_r($cek);
		// $this->load->view('report_pdf', $data);
		$html = $this->load->view('report_pdf', $data, TRUE);
    	$filename = 'Panty_recut_';    	
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'potrait');		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */