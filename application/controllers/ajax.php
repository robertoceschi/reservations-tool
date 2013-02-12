<?php

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
                //$status = "success";
                //$msg    = "User wurde gelöscht!";
                $return = array(
                    'status'  => 'success',
                    'message' => 'Der User wurde erfolgreich gelöscht!'
                );
                echo json_encode($return);

            } else {
                //$status = "error";
                //$msg    = "User konnte nicht gelöscht werden!";

                $return = array(
                    'status'  => 'error',
                    'message' => 'Der User wurde nicht gelöscht!'
                );
                echo json_encode($return);
            }
            //echo json_encode(array('status' => $status, 'msg' => $msg));
        }

        //checken ob noch gebraucht wird!
        public function getdatabyajax () {
            $this->load->library('datatables');
            $this->datatables
                ->select('id, first_name,last_name, permission_group, active')
                ->from('users')
                ->edit_column('last_name', '$1', 'ucfirst(last_name)')
                ->add_column('delete', '<a title="Mitglied löschen?" class="tip-bottom" class="delete_user" href=" ' . base_url() . 'mitglieder/delete_user/$1" ><i class="icon icon-trash"></i></a>', 'id')

                ->add_column('edit', '<a href=" ' . base_url() . 'mitglieder/edit_user/$1"><i class="icon icon-edit"></a>', 'id')
                ->unset_column('id');
            echo $this->datatables->generate();


        }





        //check ob Court noch frei ist
        public function check_status_for_court($hour_value){
            $user_id = $this->ion_auth->user()->row()->id;
            json_decode($hour_value) ;
            //ein array wird erzeugt mit 2 werten=> start_time und day
            $aData = explode('_', $hour_value);
            //daten werden via model in die db geschrieben/ Das Resultat der DB-Abfrage wird wird in $aStatus gespeichert
            $aStatus = $this->Courts_model->check_status_for_court($aData);

            //falls $aStatus da ist und nicht leer ist => hol die user_id der Reservation
            if (isset($aStatus[0])) {
                $check_id = $aStatus[0]->user_id;
            }

            //falls $aStatus da ist und nicht leer ist und $check_id der $user_id entspricht
            if (isset($aStatus[0])and $check_id == $user_id )  {
                $return = array(
                    'status'  => 'success',
                    'message' => 'Wollen Sie ihre Reservation löschen?'
                );
                echo json_encode($return);


            } elseif(isset($aStatus[0])and $check_id != $user_id) {
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

            json_decode($hour_value) ;
            //ein array wird erzeugt mit 2 werten=> start_time und day
            $aData = explode('_', $hour_value);
            //daten werden via model in die db geschrieben
            $reservation = $this->Courts_model->set_status_for_court($aData,$user_id);

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

            json_decode($hour_value) ;
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




    }

