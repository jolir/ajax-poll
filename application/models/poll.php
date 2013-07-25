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

	public function create_poll($poll_information)
	{
		$this->load->helper('date');
		$poll_data = array(
						"title" => $poll_information['poll_title'],
						"description" => $poll_information['poll_description'],
						"created_at" => date("Y-m-d H:i:s"),
						"updated_at" => date("Y-m-d H:i:s")
					);

		$this->db->insert('polls', $poll_data);
		
		$poll_id = $this->db->insert_id();

		$choice_data = array(
							array(
								"poll_id" => $poll_id,
								"choice_text" => $poll_information['poll_choice1'],
								"created_at" => date("Y-m-d H:i:s"),
								"updated_at" => date("Y-m-d H:i:s")
							),
							array(
								"poll_id" => $poll_id,
								"choice_text" => $poll_information['poll_choice2'],
								"created_at" => date("Y-m-d H:i:s"),
								"updated_at" => date("Y-m-d H:i:s")							
							),
							array(
								"poll_id" => $poll_id,
								"choice_text" => $poll_information['poll_choice3'],
								"created_at" => date("Y-m-d H:i:s"),
								"updated_at" => date("Y-m-d H:i:s")
							),
							array(
								"poll_id" => $poll_id,
								"choice_text" => $poll_information['poll_choice1'],
								"created_at" => date("Y-m-d H:i:s"),
								"updated_at" => date("Y-m-d H:i:s")
							)
					   );

		return $this->db->insert_batch('choices', $choice_data);
	}
}