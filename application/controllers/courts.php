<?php

    class Courts extends MY_Controller {

        protected $sControllerName = '';

        //protected $sTable           = '';


        function __construct () {
            //Controller Name in Kleinbuchstaben
            $this->sControllerName = strtolower(__CLASS__);
            parent::__construct($this->sControllerName);
            $this->load->library('form_validation');
            $this->load->library('ion_auth');
            $this->load->library('session');
            //$this->load->library('pagination');


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
            $permission_group            = $this->ion_auth->user()->row()->permission_group;
            $this->data['title'] = 'Plätze';
            //set the flash data error message if there is one
            //$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $user = $this->ion_auth->user()->row();
            if ($this->ion_auth->logged_in() and $permission_group == 'admin') {





                //$this->data['users'] = $this->db->get('users')->result();
                //$this->data['users'] = $this->db->get('users', $config['per_page'], $this->uri->segment(3));

                //foreach ($this->data['users'] as $k => $user) {
                //  $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();

                //}
                parent::__renderAll($this->sControllerName, $this->data);
            } else {
                //$this->data['user'] = $this->ion_auth->user($id)->row();
                //$user = $this->ion_auth->user();
                $this->data = '';


                parent::__renderAll($this->sControllerName, $this->data);
            }
            //parent::__renderAll($this->sControllerName, $this->data);




        }


        public function create_court() {

            $permission_group = $this->ion_auth->user()->row()->permission_group;
            //Name der view für den main_content wird an my_controller übergeben
            $main_content        = 'create_court';
            $this->data['title'] = "Neuer Platz erstellen";

            if (!$this->ion_auth->logged_in() || !$permission_group == 'admin') {
                redirect('auth/login', 'refresh');

            }
             $new_court_name = strtolower($this->input->post('')) . ' ' . strtolower($this->input->post('last_name'));



            }




    }

