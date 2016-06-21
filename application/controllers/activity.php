<?php
	class Activity extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
		}
		public function index()		
		{
			$query = $this->db->get('activity')->result();
			
			if ($this->input->get('format')=="json")
			{
				foreach ($query as $row)
				{
					$json_data[]=array(
							"ID"=>$row->Act_ID,
							"Activity"=>$row->Act_Name,
							"Date"=>$row->Act_Date,
							"Vote"=>$row->Act_Vote,
							"ActivityGroup"=>$row->ActGroup_ID,
					);
				}
				$json=json_encode($json_data);
				echo $json;
			}
			else
			{
				echo '<table width="100%" border="1"><tr><td>ID</td><td>Activity</td><td>Date</td><td>Vote</td><td>Group</td>';
				foreach ($query as $row)
				{
					echo '<tr><td>'.$row->Act_ID.'</td><td>'.$row->Act_Name.'</td><td>'.$row->Act_Date.'</td><td>'.$row->Act_Vote.'</td><td>'.$row->ActGroup_ID.'</td></tr>';
				}
			}
		}
		public function search()
		{
			$data = $this->input->get('data');
			$query = $this->db->where('Act_Name',$data)->get('activity')->result();
			
			if ($this->input->get('format')=="json")
			{
				foreach ($query as $row)
				{
					$json_data[]=array(
							"ID"=>$row->Act_ID,
							"Activity"=>$row->Act_Name,
							"Date"=>$row->Act_Date,
							"Vote"=>$row->Act_Vote,
							"ActivityGroup"=>$row->ActGroup_ID,
					);
				}
				$json=json_encode($json_data);
				echo $json;
			}
			else
			{
				echo '<table width="100%" border="1"><tr><td>ID</td><td>Activity</td><td>Date</td><td>Vote</td><td>Group</td>';
				foreach ($query as $row)
				{
					echo '<tr><td>'.$row->Act_ID.'</td><td>'.$row->Act_Name.'</td><td>'.$row->Act_Date.'</td><td>'.$row->Act_Vote.'</td><td>'.$row->ActGroup_ID.'</td></tr>';
				}
			}
		}
		public function add()
		{
			$this->db->set('Act_Name',$this->input->post('name'))
					->set('Act_Date',$this->input->post('date'))
					->set('Act_Vote',$this->input->post('vote'))
					->set('ActGroup_ID',$this->input->post('droup'))
					->insert('activity');			
		}
		public function edit()
		{
			$this->db->where('Act_ID',$this->input->post('id'))
					->set('Act_Name',$this->input->post('name'))
					->set('Act_Date',$this->input->post('date'))
					->set('Act_Vote',$this->input->post('vote'))
					->set('ActGroup_ID',$this->input->post('droup'))
					->update('activity');
		}
		public function delete()
		{
			$id = $this->input->post('id');
			$this->db->where('Act_ID',$id)->delete('activity');
		}
		
	}