<?php

    class Mitglieder extends MY_Controller {

        protected $sControllerName = '';

        //protected $sTable           = '';


        function __construct () {
            //Controller Name in Kleinbuchstaben
            $this->sControllerName = strtolower(__CLASS__);
            parent::__construct($this->sControllerName);
            $this->load->library('form_validation');
            $this->load->library('ion_auth');
            $this->load->library('session');

        }


        /**
         * name:        index
         *
         * prepare setting view
         *
         *
         * @author      parobri.ch
         * @date        20120710
         */
        public function index () {
            $group            = $this->ion_auth->user()->row()->group;
            $this->data['title'] = "Mitglieder";
            //set the flash data error message if there is one
            //$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $user = $this->ion_auth->user()->row();
            //print_r($user) ;
            if ($this->ion_auth->logged_in() and $group == 'admin') {
                $this->data['users'] = $this->ion_auth->users()->result();
                foreach ($this->data['users'] as $k => $user) {
                    $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();

                }
                parent::__renderAll($this->sControllerName, $this->data);
            } else {
                //$this->data['user'] = $this->ion_auth->user($id)->row();
                //$user = $this->ion_auth->user();
                $this->data = '';


                parent::__renderAll($this->sControllerName, $this->data);
            }
            //parent::__renderAll($this->sControllerName, $this->data);
        }


        public function create_user () {
            $group = $this->ion_auth->user()->row()->group;
            //Name der view für den main_content wird an my_controller übergeben
            $main_content        = 'create_user';
            $this->data['title'] = "Create User";

            if (!$this->ion_auth->logged_in() || !$group == 'admin') {
                redirect('auth/login', 'refresh');

            }

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
                    'group'      => $this->input->post('group'),
                    //'active'      => $this->input->post('active'),
                );
            }

            if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
                //check to see if we are creating the user

                //redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());

                redirect("mitglieder/create_user", 'refresh');
                //echo 'sali';
            } else {
                //display the create user form
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

                //$this->load->view('create_user_view', $this->data);
                //$this->load->view('auth/create_user', $this->data);

                parent::__renderAll($main_content, $this->data);
            }
        }

        //edit a user
        function edit_user ($id) {
            $group            = $this->ion_auth->user()->row()->group;

            $main_content        = 'edit_user';
            $this->data['title'] = "Edit User";

            if (!$this->ion_auth->logged_in() || (!$group == 'admin' && !($this->ion_auth->user()->row()->id == $id))) {
                redirect('auth/login', 'refresh');
            }

            $user = $this->ion_auth->user($id)->row();


            //process the phone number
            if (isset($user->phone) && !empty($user->phone)) {
                $user->phone = explode('-', $user->phone);
            }

            //validate form input
            $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');

            // $this->form_validation->set_rules('phone1', 'First Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
            //$this->form_validation->set_rules('phone2', 'Second Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
            //$this->form_validation->set_rules('phone3', 'Third Part of Phone', 'required|xss_clean|min_length[4]|max_length[4]');
            $this->form_validation->set_rules('company', 'Company Name', 'required|xss_clean');


            if (isset($_POST) && !empty($_POST))
            ;{
                // do we have a valid request?
                //if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                //    show_error('This form post did not pass our security checks.');
                //}

                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name'),

                    'company'    => $this->input->post('company'),
                    'email'    => $this->input->post('email'),
                    'phone'      => $this->input->post('phone1') . '-' . $this->input->post('phone2') . '-' . $this->input->post('phone3'),
                    'group'      => $this->input->post('group'),
                    'active'      => $this->input->post('active'),
                );


                //update the password if it was posted
                if ($this->input->post('password')) {
                    $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                    $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');

                    $data['password'] = $this->input->post('password');
                }

                if ($this->form_validation->run() === TRUE) {
                    $this->ion_auth->update($user->id, $data);


                    //check to see if we are creating the user
                    //redirect them back to the admin page
                    $this->session->set_flashdata('message', "Der Eintrag wurde gespeichert!");

                    //redirect("settings/edit_user", 'refresh');
                    //$this->load->view('view_answer');
                    redirect(base_url() . 'mitglieder/edit_user' . '/' . $user->id);


                }
            }


            //display the edit user form
            //$this->data['csrf'] = $this->_get_csrf_nonce();  => nochmals genau anschauen!!!!!müsste eigentlich aktiv sein Problem=>  edit_user_view wird sonst nicht angezeigt

            //set the flash data error message if there is one

            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            //pass the user to the view
            $this->data['user'] = $user;

            $this->data['first_name']       = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name', $user->first_name),
            );
            $this->data['last_name']        = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name', $user->last_name),
            );
            $this->data['company']          = array(
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('company', $user->company),
            );
            $this->data['email']            = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email',  $user->email),
            );

            $this->data['phone1']           = array(
                'name'  => 'phone1',
                'id'    => 'phone1',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone1', $user->phone[0]),
            );
            $this->data['phone2']           = array(
                'name'  => 'phone2',
                'id'    => 'phone2',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone2', $user->phone[1]),
            );
            $this->data['phone3']           = array(
                'name'  => 'phone3',
                'id'    => 'phone3',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone3', $user->phone[2]),
            );
            $this->data['password']         = array(
                'name' => 'password',
                'id'   => 'password',
                'type' => 'password'
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id'   => 'password_confirm',
                'type' => 'password'
            );


            parent::__renderAll($main_content, $this->data);
            //$this->load->view('edit_user_view', $this->data);

        }

        //activate the user
        function activate ($id, $code = false) {
            $group = $this->ion_auth->user()->row()->group;
            if ($code !== false) {
                $activation = $this->ion_auth->activate($id, $code);
            } else if ($group == 'admin' ) {
                $activation = $this->ion_auth->activate($id);
            }

            if ($activation) {
                //redirect them to the auth page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("mitglieder", 'refresh');
            } else {
                //redirect them to the forgot password page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("auth/forgot_password", 'refresh');
            }
        }


        //deactivate the user
        function deactivate ($id = NULL) {
            $group     = $this->ion_auth->user()->row()->group;
            $main_content = 'deactivate_user';
            $id           = $this->config->item('use_mongodb', 'ion_auth') ? (string)$id : (int)$id;

            $this->load->library('form_validation');
            $this->form_validation->set_rules('confirm', 'confirmation', 'required');
            $this->form_validation->set_rules('id', 'user ID', 'required|alpha_numeric');

            if ($this->form_validation->run() == FALSE) {
                // insert csrf check
                //$this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['user'] = $this->ion_auth->user($id)->row();

                parent::__renderAll($main_content, $this->data);

            } else {
                // do we really want to deactivate?
                if ($this->input->post('confirm') == 'yes') {
                    // do we have a valid request?
                    //if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    //  show_error('This form post did not pass our security checks.');
                    // }

                    // do we have the right userlevel?
                    if ($this->ion_auth->logged_in() && $group == 'admin') {
                        $this->ion_auth->deactivate($id);
                    }
                }

                //redirect them back to the auth page
                redirect('mitglieder', 'refresh');
            }
        }

        function delete_user ($id) {

            $delete = $this->ion_auth->delete_user($id);


        }


        /*function user_profil() {
            $this->data['title'] = "User Profil";
            $this->sControllerName = 'user_profil';
            parent::__renderAll($this->sControllerName, $this->data);
        }  */


    }

