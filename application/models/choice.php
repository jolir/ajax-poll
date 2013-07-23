<?php

class Choice extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_choice($poll_id = NULL)
	{
		if($poll_id == NULL)
			return $this->db->get('choices')->result_array();
		else
			return $this->db->where('poll_id', $poll_id)
							->get('choices')->result_array();
	}

	public function vote($choice_id)
	{
		return $this->db->where('id', $choice_id)
						->set('votes', 'votes+1', FALSE)
						->update('choices');
	}

}