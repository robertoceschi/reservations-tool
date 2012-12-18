<?php

    class Home extends MY_Controller {

        protected $sControllerName = '';

        //protected $sTable           = '';


        /*function __construct () {
            //Controller Name in Kleinbuchstaben
            $this->sControllerName = strtolower(__CLASS__);
            //parent::__construct($this->sControllerName);
            //$this->load->model('site/Home_model');
        }  */


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


            //$data = '';

            //$this->load->view('home_view', $data);
            //parent::__renderAll($this->sControllerName, $data);


        }

        public function admin () {
            $this->data['title'] = "Home";
            $this->sControllerName = 'home_admin';
            parent::__renderAll($this->sControllerName, $this->data);

        }

        public function member () {
            $this->data['title'] = "Home";
            $this->sControllerName = 'home_member';
            parent::__renderAll($this->sControllerName, $this->data);

        }
    }

