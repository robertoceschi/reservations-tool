<?php
    // Database Connection and loading class calendar
    require_once APPPATH . 'includes/connection.php';
    require_once APPPATH . 'includes/calendar.php';


    class Ajax extends MY_Controller {


        function __construct () {
            //Controller Name in Kleinbuchstaben
            $this->sControllerName = strtolower(__CLASS__);
            parent::__construct($this->sControllerName);
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->model('Courts_model');



            //$this->load->library('pagination');


        }


        //deactivate the user
        function deactivate ($id = NULL) {
            $deactivate = $this->ion_auth->deactivate($id);

            if ($deactivate) {
                //$status = "success";
                //$msg    = "User ist jetzt deaktiviert";
                $return = array(
                    'status'  => 'success',
                    'message' => 'Der User wurde erfolgreich deaktiviert!'

                );
                echo json_encode($return);


                //$group_ajax = 0;
                //$this->load->view('mitglieder_view', $id, $group_ajax);

            } else {
                $return = array(

                    'status'  => 'error',
                    'message' => 'Der User konnte nicht deaktiviert werden!'

                );
                echo json_encode($return);
            }
            //echo json_encode(array('status' => $status, 'msg' => $msg));
        }


        //activate the user
        function activate ($id) {

            $activation = $this->ion_auth->activate($id);


            if ($activation) {
                //$status = "success";
                //$msg    = "User wurde aktiviert";
                $return = array(

                    'status'  => 'success',
                    'message' => 'Der User wurde erfolgreich aktiviert!'

                );
                echo json_encode($return);


            } else {
                $return = array(

                    'status'  => 'error',
                    'message' => 'Der User konnte nicht aktiviert werden!'

                );
                echo json_encode($return);
            }
        }

        //delete  user
        function delete_user ($id) {

            $delete = $this->ion_auth->delete_user($id);


            if ($delete) {

                $return = array(
                    'status'  => 'success',
                    'message' => 'Der User wurde erfolgreich gelöscht!'
                );
                echo json_encode($return);

            } else {
                $return = array(
                    'status'  => 'error',
                    'message' => 'Der User wurde nicht gelöscht!'
                );
                echo json_encode($return);
            }

        }

        //checken ob noch gebraucht wird!
        public function getdatabyajax () {
            $this->load->library('datatables');
            $this->datatables
                ->select('id, first_name,last_name, permission_group, active')
                ->from('users')
                ->edit_column('first_name', '$1', 'ucfirst(first_name)')
                ->edit_column('last_name', '$1', 'ucfirst(last_name)')
                ->add_column('delete', '<span style="cursor:pointer"  class="delete_user" id="$1" title="$2 $3"><i class="icon icon-trash"></i></span>', 'id,first_name, last_name')
                ->add_column('edit', '<a href=" ' . base_url() . 'mitglieder/edit_user/$1"><i class="icon icon-edit"></a>', 'id')->edit_column('id', '$1', 'id');
            // ->unset_column('id');

            echo $this->datatables->generate();
        }


        //check ob Court noch frei ist
        public function check_status_for_court ($hour_value) {
            $user_id = $this->ion_auth->user()->row()->id;
            json_decode($hour_value);
            //ein array wird erzeugt mit 2 werten=> start_time und day
            $aData = explode('_', $hour_value);
            //daten werden via model in die db geschrieben/ Das Resultat der DB-Abfrage wird wird in $aStatus gespeichert
            $aStatus = $this->Courts_model->check_status_for_court($aData);

            //falls $aStatus da ist und nicht leer ist => hol die user_id der Reservation
            if (isset($aStatus[0])) {
                $check_id = $aStatus[0]->user_id;
            }

            //falls $aStatus da ist und nicht leer ist und $check_id der $user_id entspricht
            if (isset($aStatus[0])and $check_id == $user_id) {
                $return = array(
                    'status'  => 'success',
                    'message' => 'Wollen Sie ihre Reservation löschen?'
                );
                echo json_encode($return);


            } elseif (isset($aStatus[0])and $check_id != $user_id) {
                $return = array(

                    'status'  => 'success',
                    'message' => 'Court besetzt!'

                );
                echo json_encode($return);

            } else {
                $return = array(

                    'status'  => 'error',
                    'message' => 'Court ist noch frei!'

                );
                echo json_encode($return);

            }
        }


        //neue Reservation tätigen
        public function set_status_for_court ($hour_value) {
            $user_id = $this->ion_auth->user()->row()->id;

            json_decode($hour_value);
            //ein array wird erzeugt mit 2 werten=> start_time und day
            $aData = explode('_', $hour_value);
            //daten werden via model in die db geschrieben
            $reservation = $this->Courts_model->set_status_for_court($aData, $user_id);

            if ($reservation) {
                $return = array(

                    'status'  => 'success',
                    'message' => 'Reservation vorgenommen'
                );
                echo json_encode($return);

            } else {
                $return = array(
                    'status'  => 'error',
                    'message' => 'Keine Reservation vorgenommen!'
                );
                echo json_encode($return);
            }
        }


        public function delete_court ($hour_value) {

            json_decode($hour_value);
            //ein array wird erzeugt mit 2 werten=> start_time und day
            $aData = explode('_', $hour_value);
            //daten werden via model in die db geschrieben
            $aDelete_crt = $this->Courts_model->delete_court($aData);

            if ($aDelete_crt) {
                $return = array(

                    'status'  => 'success',
                    'message' => 'Reservation gelöscht!'
                );
                echo json_encode($return);

            } else {
                $return = array(
                    'status'  => 'error',
                    'message' => 'Probleme beim löschen!'
                );
                echo json_encode($return);
            }


        }

        /*Kalender Methoden*/

        //Alle Terminde werden angezeigt
        public function cal_events () { // Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
            $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);

            echo $calendar->json_transform();
        }

        public function cal_update () {
            // Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
            $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);

            // Catch start, end and id from javascript
            $start = $_POST['start'];
            $end   = $_POST['end'];
            $id    = $_POST['id'];



            echo $calendar->update($start, $end, $id);

        }

        public function cal_save () {
            // Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
            $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);

            // Catch start, end and id from javascript
            $title       =  $_POST['title'];
            $description = $_POST['description'];
            $start_date  = $_POST['start_date'];
            $start_time  = $_POST['start_time'];
            $end_date    = $_POST['end_date'];
            $end_time    = $_POST['end_time'];
            $color       = $_POST['color'];
            $allDay      = $_POST['allDay'];
            $url         = $_POST['url'];
            $user_id      =$_POST['user_id'];


            echo $calendar->addEvent($title, $description, $start_date, $start_time, $end_date, $end_time, $color, $allDay, $url, $user_id);
        }


        public function cal_delete () {
            // Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
            $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);
            $is_admin = $this->ion_auth->user()->row()->permission_group;
            //$user_id = $this->ion_auth->user()->row()->id;

            if ($is_admin == 'admin') {
            $calendar->delete($_POST['id']);
            }   else {
                     $calendar->delete_reservation($_POST['id']);
            }
        }


        public function cal_edit_update () {
// Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
            $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);

            // Catch start, end and id from javascript
            $id                = $_POST['id'];
            $event_title       = $_POST['title_update'];
            $event_description = $_POST['description_update'];
            $active_user_id    = $this->ion_auth->user()->row()->id;

            if (isset($_POST['url_update'])) {
                $url = $_POST['url_update'];
            } else {
                $url = 'false';
            }

            $calendar->updates($id, $event_title, $event_description, $url,  $active_user_id);
        }



    }

