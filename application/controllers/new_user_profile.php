<?php

    class New_user_profile extends CI_Controller {

        protected $sControllerName = '';


        function __construct () {
            //Controller Name in Kleinbuchstaben
            $this->sControllerName = strtolower(__CLASS__);
            parent::__construct($this->sControllerName);
            $this->load->library('form_validation');
            //$this->load->library('ion_auth');
            //$this->load->library('session');


        }

        /**
         * name:        index
         *
         * prepare home view, admin or member
         *
         *
         * @author      parobri.ch
         * @date        20120710
         */
        public function index () {
            $this->data['first_name'] = '';
            $this->data['last_name']  = '';
            $this->data['email']      = '';
            $this->data['company']    = '';
            $this->data['phone1']     = '';


            $this->data['title']   = "User Profil";
            $this->load->view('new_user_profile_view', $this->data);


        }

        public function create_new_profile () {


            //$group = $this->ion_auth->user()->row()->group;
            //Name der view für den main_content wird an my_controller übergeben
            //$main_content        = 'create_new_user_profil';
            //$this->data['title'] = "Create New User Profil";


            //validate form input
            $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
            //$this->form_validation->set_rules('phone1', 'First Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
            //$this->form_validation->set_rules('phone2', 'Second Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
            //$this->form_validation->set_rules('phone3', 'Third Part of Phone', 'required|xss_clean|min_length[4]|max_length[4]');
            $this->form_validation->set_rules('company', 'Company Name', 'required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');


            if ($this->form_validation->run() == true) {
                $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
                $email    = $this->input->post('email');
                $password = $this->input->post('password');

                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name'),
                    'company'    => $this->input->post('company'),
                    'phone'      => $this->input->post('phone1') . '-' . $this->input->post('phone2') . '-' . $this->input->post('phone3'),
                    'group'      => 'members',

                );
            }

            if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
                //check to see if we are creating the user

                //redirect them back to the admin page
                //user create status wird erstellt für messages
                $this->session->set_flashdata('user_create', true);
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth/login", 'refresh');
            } else {
                //display the create user form

                //user create status wird erstellt für messages
                $this->session->set_flashdata('user_create', false);
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

                $this->data['first_name']       = array(
                    'name'  => 'first_name',
                    'id'    => 'first_name',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('first_name'),
                );
                $this->data['last_name']        = array(
                    'name'  => 'last_name',
                    'id'    => 'last_name',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('last_name'),
                );
                $this->data['email']            = array(
                    'name'  => 'email',
                    'id'    => 'email',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('email'),
                );
                $this->data['company']          = array(
                    'name'  => 'company',
                    'id'    => 'company',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('company'),
                );
                $this->data['phone1']           = array(
                    'name'  => 'phone1',
                    'id'    => 'phone1',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('phone1'),
                );
                $this->data['phone2']           = array(
                    'name'  => 'phone2',
                    'id'    => 'phone2',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('phone2'),
                );
                $this->data['phone3']           = array(
                    'name'  => 'phone3',
                    'id'    => 'phone3',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('phone3'),
                );
                $this->data['password']         = array(
                    'name'  => 'password',
                    'id'    => 'password',
                    'type'  => 'password',
                    'value' => $this->form_validation->set_value('password'),
                );
                $this->data['password_confirm'] = array(
                    'name'  => 'password_confirm',
                    'id'    => 'password_confirm',
                    'type'  => 'password',
                    'value' => $this->form_validation->set_value('password_confirm'),
                );

                //neuer Benutzer wurde erstellt


                //parent::__renderAll($main_content, $this->data);
                $this->load->view('new_user_profile_view', $this->data);
            }
        }


    }
