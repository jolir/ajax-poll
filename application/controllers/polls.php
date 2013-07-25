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

	public function poll_new()
	{
		$post_data = $this->input->post();

		if(isset($post_data['form_action']) && $post_data['form_action'] == "create_poll")
		{
			$this->load->model('Poll');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('poll_title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('poll_description', 'Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('poll_choice1', 'Poll 1', 'trim|required|xss_clean');
			$this->form_validation->set_rules('poll_choice2', 'Poll 2', 'trim|required|xss_clean');
			$this->form_validation->set_rules('poll_choice3', 'Poll 3', 'trim|required|xss_clean');
			$this->form_validation->set_rules('poll_choice4', 'Poll 4', 'trim|required|xss_clean');
			if($this->form_validation->run() === FALSE)
			{
				$data['status'] = FALSE;
				$data['errors'] = validation_errors();
			}
			else
			{
				$data['create_poll'] = $this->Poll->create_poll($post_data);

				if($data['create_poll'])
				{
					$data['status'] = TRUE;
					$data['message'] = "Successfully added a new Poll!";
				}
				else
				{
					$data['status'] = FALSE;
					$data['errors'] = "Error adding poll";
				}
			}
			echo json_encode($data);
		}
		else
			$this->load->view('poll_new');
	}

	public function cast_vote()
	{
		$post_data = $this->input->post();

		if($post_data['form_action'] == "vote")
		{
			$this->load->model('Choice');

			$data['vote'] = $this->Choice->vote($post_data['choice']);

			if($data['vote'])
			{
				$choices = $this->Choice->get_choice($post_data['poll_id']);
				$total = null;
				foreach($choices as $choice)
		        {
		        	$total += $choice['votes'];
				}

				$data['status'] = TRUE;
				$data['html'] = '';
				foreach($choices as $choice)
				{
					$percentage = ($choice['votes'] / $total) * 100;
					$percentage_formatted = number_format($percentage, 2, '.', '');
					$data['html'] .= 
						"<strong>".$choice['choice_text']."</strong><span class='pull-right'>". "<b>".$choice['votes']." votes / </b>".$percentage_formatted."%</span>
						<div class='progress progress-danger active'>
							<div class='bar' style='width: ".$percentage_formatted."%'></div>
						</div>";
				}
			}
			else
				$data['status'] = FALSE;

			echo json_encode($data);
		}
	}
}

/* End of file polls.php */
/* Location: ./application/controllers/polls.php */