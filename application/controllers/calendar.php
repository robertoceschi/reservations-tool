<?php

    class Calendar extends MY_Controller {

        protected $sControllerName = '';


        function __construct () {
            //Controller Name in Kleinbuchstaben

            $this->sControllerName = strtolower(__CLASS__);
            parent::__construct($this->sControllerName);
            //$this->load->library('My_Calendar');

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
            $this->data['title'] = 'Calendar';



            parent::__renderAll($this->sControllerName,$this->data);


        }

        public function create_new_event () {
            $this->data['title'] = 'Calendar';
            $this->sControllerName = 'create_new_event';



            parent::__renderAll($this->sControllerName,$this->data);


        }




    }