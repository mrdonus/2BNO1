<?php
	class Member extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
		}
		public function index() 
		{
			$query = $this->db->get('member')->result();
		}
		public function search()
		{
			$data = $this->input->get('data');
			$query = $this->db->where('Mem_Name',$data)->get('member')->result();
		}
		public function add()
		{
			$this->db->set('Mem_Name',$this->input->post('name'))
					->set('Mem_Sex',$this->input->post('sex'))
					->set('Mem_Birthday',$this->input->post('birthday'))
					->set('Mem_pass',$this->input->post('password'))
					->set('Mem_Email',$this->input->post('email'))
					->set('MemType_ID',$this->input->post('group'))
					->insert('member');
		}
		public function edit()
		{
			$this->db->where('Mem_ID',$this->input->post('id'))
					->set('Mem_Name',$this->input->post('name'))
					->set('Mem_Sex',$this->input->post('sex'))
					->set('Mem_Birthday',$this->input->post('birthday'))
					->set('Mem_pass',$this->input->post('password'))
					->set('Mem_Email',$this->input->post('email'))
					->set('MemType_ID',$this->input->post('group'))
					->update('member');
		}
		public function delete()
		{
			$id = $this->input->post('id');
			$this->db->where('Mem_ID',$id)->delete('member');
		}
	}