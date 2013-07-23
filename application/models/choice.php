<?php

class Choice extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_choice()
	{
		return $this->db->get('choices')->result_array();
	}

}