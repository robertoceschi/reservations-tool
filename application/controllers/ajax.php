<?php

    class Ajax extends MY_Controller {

        //deactivate the user
        function deactivate ($id = NULL) {
            $deactivate = $this->ion_auth->deactivate($id);

            if ($deactivate) {
                $status = "success";
                $msg    = "User ist jetzt deaktiviert";



            //$group_ajax = 0;
            //$this->load->view('mitglieder_view', $id, $group_ajax);

            } else {
                $status = "error";
                $msg    = "Fehler";
            }
            echo json_encode(array('status' => $status, 'msg' => $msg));
        }


        //activate the user
        function activate ($id) {

            $activation = $this->ion_auth->activate($id);


            if ($activation) {
                $status = "success";
                $msg    = "User wurde aktiviert";



            } else {
                $status = "error";
                $msg    = "Fehler";
            }
            echo json_encode(array('status' => $status, 'msg' => $msg));
        }

        //delete  user
        function delete_user ($id) {

            $delete = $this->ion_auth->delete_user($id);


            if ($delete) {
                $status = "success";
                $msg    = "User wurde gelöscht!";



            } else {
                $status = "error";
                $msg    = "User konnte nicht gelöscht werden!";
            }
            echo json_encode(array('status' => $status, 'msg' => $msg));
        }

    }

