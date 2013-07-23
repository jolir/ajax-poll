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

	public function vote($choice_id)
	{
		return $this->db->where('id', $choice_id)
						->set('votes', 'votes+1', FALSE)
						->update('choices');
	}

}