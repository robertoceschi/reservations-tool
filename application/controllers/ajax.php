<?php

    class Ajax extends MY_Controller {

        //deactivate the user
        function deactivate ($id = NULL) {
            $deactivate = $this->ion_auth->deactivate($id);

            if ($deactivate) {
                $status = "success";
                $msg    = "User ist jetzt deaktiviert";
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

    }

