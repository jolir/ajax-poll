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
					$data['html'] .= "<strong>".$choice['choice_text']."</strong><span class='pull-right'>". $percentage_formatted."%</span>
					<div class='progress progress-danger active'>
						<div class='bar' style='width: ".$percentage_formatted."%'></div>
					</div>";
					
				}
				echo json_encode($data);
			}
			
		}
	}

}

/* End of file polls.php */
/* Location: ./application/controllers/polls.php */