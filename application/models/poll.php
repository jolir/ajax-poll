<?php

class Poll extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_poll()
	{
		return $this->db->get('polls')->result_array();
	}

}