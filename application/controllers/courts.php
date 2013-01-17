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
            $this->load->model('Courts_model');
            $this->sTable = 'court';
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

                parent::__renderAll($this->sControllerName, $this->data);
            } else {

                $this->data = '';


                parent::__renderAll($this->sControllerName, $this->data);
            }




        }


        public function create_court() {

            // Leeres Formular ausgeben
            //--------------------------------------//
            $data['court_name']      = '';

            $permission_group = $this->ion_auth->user()->row()->permission_group;
            //Name der view für den main_content wird an my_controller übergeben
            $main_content        = 'create_court';
            $this->data['title'] = "Neuen Court erstellen";

            if (!$this->ion_auth->logged_in() || !$permission_group == 'admin') {
                redirect('auth/login', 'refresh');
            }
            $aData = array('court_name'       => $this->input->post('court_name', true));

            if ($this->Courts_model->saveRecord($this->sTable, $aData)) {
                // Eintrag wird bestätigt
                $last_id = mysql_insert_id();


            }
            else {
                echo 'fehler';
            }

            parent::__renderAll($main_content, $aData);
            }





    }

