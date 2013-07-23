<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

class Polls extends Main {

	public function index()
	{
		$this->load->model('Poll');
		$this->view_data['polls'] = $this->Poll->get_poll();
		$this->load->model('Choice');
		$this->view_data['choices'] = $this->Choice->get_choice();
		$this->load->view('poll_index', $this->view_data);
	}

	public function cast_vote()
	{
		$post_data = $this->input->post();

		if($post_data['form_action'] == "vote")
		{
			$this->load->model('Choice');
			$this->view_data['choices'] = $this->Choice->vote($post_data['choice']);
		}
	}
}

/* End of file polls.php */
/* Location: ./application/controllers/polls.php */