<?php

    class Reservation extends MY_Controller {

        protected $sControllerName = '';


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
         * prepare home view, admin or member

         */
        public function index () {
            $this->data['title'] = 'Reservation';
            $this->data['active_user_id']            = $this->ion_auth->user()->row()->id;
            parent::__renderAll($this->sControllerName,$this->data);
        }

        public function create_new_event () {
            $this->data['title'] = 'Reservation';
            $this->sControllerName = 'create_new_event';
            parent::__renderAll($this->sControllerName,$this->data);

        }
    }