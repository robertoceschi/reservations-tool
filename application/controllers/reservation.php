<?php
    class Reservation extends MY_Controller {

        function __construct () {
            //Controller Name in Kleinbuchstaben
            $this->sControllerName = strtolower(__CLASS__);
            parent::__construct($this->sControllerName);
            $this->load->library('form_validation');
            $this->load->library('ion_auth');
            $this->load->library('session');

            //$this->load->library('pagination');


        }



        public function index($year = null, $month = null){
        //function display($year = null, $month = null ) {
            $main_content        = 'reservation';

            if (!$year) {
                $year = date('Y');
            }
            if (!$month) {
                $month = date('m');
            }

            $this->load->model('Cal_model');

            if ($day = $this->input->post('day')) {
                $this->Cal_model->add_calendar_data(
                    "$year-$month-$day",
                    $this->input->post('data')
                );
            }

            $this->load->model('Cal_model');
            $data['calendar'] = $this->Cal_model->generate($year,$month);
            //$this->load->view($main_content, $data);
            parent::__renderAll($main_content, $data);


        }



    }
