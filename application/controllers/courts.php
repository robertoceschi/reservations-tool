<?php

    class Courts extends MY_Controller {

        protected $sControllerName = '';

        protected $sTable = '';


        function __construct () {
            //Controller Name in Kleinbuchstaben
            $this->sControllerName = strtolower(__CLASS__);
            parent::__construct($this->sControllerName);
            $this->load->library('form_validation');
            $this->load->library('ion_auth');
            $this->load->library('session');
            $this->load->model('Courts_model');

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
            $permission_group    = $this->ion_auth->user()->row()->permission_group;
            $this->data['title'] = 'Courts';
            //set the flash data error message if there is one
            //$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $user = $this->ion_auth->user()->row();

            if ($this->ion_auth->logged_in() and $permission_group == 'admin') {
                $this->data['courts'] = $this->db->get('court')->result();
                //$this->data['courts'] = $this->Courts_model->join();


                parent::__renderAll($this->sControllerName, $this->data);
            } else {

                echo 'nicht eingeloggt oder nicht admin! Bitte einloggen';
            }


        }


        public function create_court () {

            // Leeres Formular ausgeben
            //--------------------------------------//
            $this->data['court_name']   = '';
            $this->data['court_status'] = '';
            $this->data['title']        = "Create Court";
            $data['saison_start']       = '';


            $permission_group    = $this->ion_auth->user()->row()->permission_group;
            $main_content        = 'create_court';
            $this->data['title'] = "Neuen Court erstellen";


            if (!$this->ion_auth->logged_in() || !$permission_group == 'admin') {
                redirect('auth/login', 'refresh');
            }

            if ($this->input->post()) {
                $data_court = array(
                    'category_id'  => $this->input->post('category_id', true),
                    'court_name'   => $this->input->post('court_name', true),
                    'court_status' => $this->input->post('court_status')
                );


                $data_saison = array(
                    'saison_start' => $this->input->post('saison_start'),
                    'saison_end'   => $this->input->post('saison_end'),
                    'court_id'     => ''

                );
                echo $this->input->post('court_id');

                $data_duration = array(

                    'slot_time1_start' => $this->input->post('slot_time1_start'),
                    'slot_time1_end'   => $this->input->post('slot_time1_end'),
                    'slot_time2_start' => $this->input->post('slot_time2_start'),
                    'slot_time2_end'   => $this->input->post('slot_time2_end'),
                    'weekday1_start'   => $this->input->post('weekday1_start'),
                    'weekday1_end'     => $this->input->post('weekday1_end'),
                    'weekday2_start'   => $this->input->post('weekday2_start'),
                    'weekday2_end'     => $this->input->post('weekday2_end'),


                );
                //$data_cat = array(
                //  'category_name'     => $this->input->post('category_name', true),
                //);
                $court_id = $this->Courts_model->saveRecord($sTable = 'court', $data_court, $data_saison);

                $data_saison['court_id'] = $court_id;

                $this->Courts_model->saveRecord($sTable = 'saison', $data_saison);
                $this->Courts_model->saveRecord($sTable = 'duration', $data_duration);
                //$this->Courts_model->saveRecord($sTable = 'category', $data_cat);
            }
            parent::__renderAll($main_content, $this->data);
        }


        public function edit_court () {

            // Leeres Formular ausgeben
            //--------------------------------------//
            $this->data['court_name']   = '';
            $this->data['court_status'] = '';
            $this->data['title']        = "Edit Court";
            $data['saison_start']       = '';


            $permission_group    = $this->ion_auth->user()->row()->permission_group;
            $main_content        = 'edit_court';
            $this->data['title'] = "Neuen Court erstellen";


            if (!$this->ion_auth->logged_in() || !$permission_group == 'admin') {
                redirect('auth/login', 'refresh');
            }

            if ($this->input->post()) {
                $data_court = array(
                    'category_id'  => $this->input->post('category_id', true),
                    'court_name'   => $this->input->post('court_name', true),
                    'court_status' => $this->input->post('court_status')
                );


                $data_saison = array(
                    'saison_start' => $this->input->post('saison_start'),
                    'saison_end'   => $this->input->post('saison_end'),
                    'court_id'     => $this->input->post('court_id')

                );
                echo $this->input->post('court_id');

                $data_duration = array(

                    'slot_time1_start' => $this->input->post('slot_time1_start'),
                    'slot_time1_end'   => $this->input->post('slot_time1_end'),
                    'slot_time2_start' => $this->input->post('slot_time2_start'),
                    'slot_time2_end'   => $this->input->post('slot_time2_end'),
                    'weekday1_start'   => $this->input->post('weekday1_start'),
                    'weekday1_end'     => $this->input->post('weekday1_end'),
                    'weekday2_start'   => $this->input->post('weekday2_start'),
                    'weekday2_end'     => $this->input->post('weekday2_end'),


                );
                //$data_cat = array(
                //  'category_name'     => $this->input->post('category_name', true),
                //);
                $this->Courts_model->saveRecord($sTable = 'court', $data_court, $data_saison);
                $this->Courts_model->saveRecord($sTable = 'saison', $data_saison);
                $this->Courts_model->saveRecord($sTable = 'duration', $data_duration);
                //$this->Courts_model->saveRecord($sTable = 'category', $data_cat);
            }
            parent::__renderAll($main_content, $this->data);

        }
    }

