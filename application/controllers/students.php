<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller {

	public function index()
	{
		$user['login_errors'] = $this->session->flashdata('login_errors') ? $this->session->flashdata('login_errors') : FALSE;
		$user['registration_errors'] = $this->session->flashdata('registration_errors') ? $this->session->flashdata('registration_errors') : FALSE;

		$this->load->view('student_login_page', $user);
	}

	public function login()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		// Validation For Email field
		$this->form_validation->set_rules('email', 'Email', 'required');
		// Validation For Password field
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() != FALSE)
		{
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$this->load->model('Student_model');
			$user_info = $this->Student_model->fetch_user($email);

			if($user_info['password'] == $password)
			{
				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('user', $user_info);

				$this->load->view('login_view');
			}
			else
			{
				$this->session->set_flashdata('login_errors', "Email and Password did not match");
				redirect(base_url());
			}
		}
		else
		{
			$this->session->set_flashdata('login_errors', validation_errors());
			redirect(base_url());
		}

	}

	public function register()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		// Validation For First name field
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		// Validation For Last name field
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		// Validation For Email field
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		// Validation For Password field
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[confirm_password]');
		// Validation For Confirm Password field
		$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required');

		if ($this->form_validation->run() != FALSE)
		{
			$this->load->model('Student_model');
			$email = $this->input->post('email');

			$password = md5($this->input->post('password'));

			$new_user = array('first_name' => $this->input->post('first_name'),
						  'last_name' => $this->input->post('last_name'),
						  'email' => $email,
	   					  'password' => $password,
	   					  'created_at' => date("Y-m-d H:i:s")
						);

			$new_user_id = $this->Student_model->register($new_user);

			$this->session->set_userdata('logged_in', TRUE);
			$this->session->set_userdata('user', $new_user);
			$this->load->view('login_view');
		}
		else
		{
			$this->session->set_flashdata('registration_errors', validation_errors());
			redirect(base_url());
		}
	}

	public function log_off()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('logged_in');
		redirect(base_url());
	}

}
