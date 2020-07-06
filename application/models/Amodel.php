<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amodel extends CI_Model {

	public function getline()
		{
			$this->db->from('line');
			$this->db->order_by('id', 'asc');
			$db = $this->db->get();
			return $db;
		}	

	public function getinput()
	{
		$this->db->select('*, data.id as id_data');		
		$this->db->from('data');
		$this->db->join('line', 'data.line_id = line.id');
		$this->db->join('defect', 'data.defect_code = defect.id');
		$this->db->order_by('date', 'desc');
		$db = $this->db->get();
		return $db;
	}

	public function getinputdate($date)
	{
		$this->db->select('*, data.id as id_data');
		$this->db->from('data');
		$this->db->join('line', 'data.line_id = line.id');
		$this->db->join('defect', 'data.defect_code = defect.id');
		$this->db->where('date', $date);
		$this->db->order_by('data.id', 'asc');
		$db = $this->db->get();
		return $db;
	}

	public function r_plantboth($d1,$d2)
	{
		
		$db = $this->db->query("SELECT *,SUM(total) as jumlah FROM `data`
			JOIN line ON line.id=data.line_id
			JOIN defect ON defect.id=data.defect_code
			WHERE date >= '$d1'
			AND date <= '$d2'
			GROUP BY data.defect_code
			ORDER BY jumlah DESC");
		return $db;
	}

	public function r_plantshift($d1,$d2,$shift)
	{
	
		$db = $this->db->query("SELECT *,SUM(total) as jumlah FROM `data`
			JOIN line ON line.id=data.line_id
			JOIN defect ON defect.id=data.defect_code
			WHERE date >= '$d1'
			AND date <= '$d2'
			AND line.shift = '$shift'
			GROUP BY data.defect_code
			ORDER BY jumlah DESC");
		return $db;
	}

	public function r_section($d1,$d2,$shift,$section)
	{
		$db = $this->db->query("SELECT *,SUM(total) as jumlah FROM `data`
			JOIN line ON line.id=data.line_id
			JOIN defect ON defect.id=data.defect_code
			WHERE date >= '$d1'
			AND date <= '$d2'
			AND line.shift = '$shift'
			AND line.section = '$section'
			GROUP BY data.defect_code
			ORDER BY jumlah DESC");
		return $db;
	}

	public function r_shiftmain($d1,$d2,$shift)
	{
	
		$db = $this->db->query("SELECT *,SUM(total) as jumlah FROM `data`
			JOIN line ON line.id=data.line_id
			JOIN defect ON defect.id=data.defect_code
			WHERE date >= '$d1'
			AND date <= '$d2'
			AND line.shift = '$shift'
			GROUP BY data.defect_code
			ORDER BY jumlah DESC LIMIT 3");
		return $db;
	}

	public function r_shiftline($id,$d1,$d2)
	{
		$db = $this->db->query("SELECT * FROM data
			JOIN line ON line.id=data.line_id			
			JOIN defect ON defect.id=data.defect_code			
			WHERE defect.defect_code = '$id'
			AND date >= '$d1'
			AND date <= '$d2'
			ORDER BY total DESC");
		return $db;
	}
}

/* End of file Amodel.php */
/* Location: ./application/models/Amodel.php */