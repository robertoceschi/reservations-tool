<?php
    class Reservation extends MY_Controller {
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



        public function index(){
            //function display($year = null, $month = null ) {




            $main_content        = 'reservation';
            $this->data['title'] = 'Reservation';
            $user_id = $this->ion_auth->user()->row()->id;
            $weeknr = '';
            //check ob court frei oder besetzt / resultat wird in 'calenderEvents' geschrieben
            $this->data['calendarEvents']=$this->Courts_model->get_events_for_week($weeknr ,$user_id);

            $this->data['year']  = date("Y");
            $this->data['week'] =  date("W");
            $this->data['month']=  date("F");

            function week_date ($year, $week) {
                $from = date("d", strtotime("{$year}-W{$week}-1")); //Returns the date of monday in week
                $to   = date("d-F", strtotime("{$year}-W{$week}-7")); //Returns the date of sunday in week
                return "Woche {$week} / {$from}. - {$to}";
            }
            $this->data['week_date'] =  week_date(date("Y"), date("W"));



            //Courtname wird geholt für drop-down menue
            $result       = $this->db->get('court')->result();
            foreach ($result as $val) {
                $arr[$val->court_id] = $val->court_name;
            }
            $this->data['court'] = $arr;



            //Daten werden an die view übergeben
            parent::__renderAll($main_content, $this->data);
        }


        //neue Reservation eintragen
        public function set_status_for_court() {
            //daten werden via model in die db geschrieben


        }









    }
