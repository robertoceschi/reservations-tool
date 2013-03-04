<?php
    // Database Connection and loading class calendar für Reservationen (connection muss noch angepasst werden an CI:DB
    require_once APPPATH . 'includes/connection.php';
    require_once APPPATH . 'includes/calendar.php';


    class Ajax extends MY_Controller {

        function __construct () {
            //Controller Name in Kleinbuchstaben
            $this->sControllerName = strtolower(__CLASS__);
            parent::__construct($this->sControllerName);
            $this->load->library('form_validation');
            $this->load->library('session');
        }


        //deactivate the user
        function deactivate ($id = NULL) {
            $deactivate = $this->ion_auth->deactivate($id);
            if ($deactivate) {

                $return = array(
                    'status'  => 'success',
                    'message' => 'Der User wurde erfolgreich deaktiviert!'
                );
                echo json_encode($return);


            } else {
                $return = array(

                    'status'  => 'error',
                    'message' => 'Der User konnte nicht deaktiviert werden!'
                );
                echo json_encode($return);
            }
        }


        //activate the user
        function activate ($id) {
            $activation = $this->ion_auth->activate($id);

            if ($activation) {
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

        //Datatables (Mitglieder) Methoden
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


        //Kalender Methoden

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
            $title        = $_POST['title'];
            $description  = $_POST['description'];
            $start_date   = $_POST['start_date'];
            $start_time   = $_POST['start_time'];
            $end_date     = $_POST['end_date'];
            $end_time     = $_POST['end_time'];
            $color        = $_POST['color'];
            $allDay       = $_POST['allDay'];
            $url          = $_POST['url'];
            $user_id      = $_POST['user_id'];
            $court_closed = $_POST['court_closed'];


            echo $calendar->addEvent($title, $description, $start_date, $start_time, $end_date, $end_time, $color, $allDay, $url, $user_id, $court_closed);
        }


        public function cal_delete () {
            // Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
            $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);
            $calendar->delete($_POST['id']);

        }

        public function delete_reservation () {
            // Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
            $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);
            //$is_admin = $this->ion_auth->user()->row()->permission_group;
            //$user_id = $this->ion_auth->user()->row()->id;


            $calendar->delete_reservation($_POST['id']);

        }

        public function cal_edit_update () {
// Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
            $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);

            // Catch start, end and id from javascript
            $id             = $_POST['id'];
            $active_user_id = $this->ion_auth->user()->row()->id;

            $calendar->updates($id, $active_user_id);
        }


    }

