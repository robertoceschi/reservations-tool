<?php

    class Ajax extends MY_Controller {


        //deactivate the user
        function deactivate ($id = NULL) {
           $this->ion_auth->deactivate($id);

             //$return = $this->db->affected_rows();
             //echo $return;

            /*if ($return) {
                echo 'hat geklappt';

            }else {
                echo 'näd klappt';
            }

            /*if ($this->ion_auth->deactivate($id) == '0') {
                // The user was successfully removed from the table

                alert ('deaktiviert');
                $return = array(

                    'status'  => 'success',
                    'message' => 'The user has been deleted!'

                );

                echo json_encode($return);

                // print out a JSON encoded success message
            } else {
                // The delete failed

                $return = array(

                    'status'  => 'failed',
                    'message' => 'Failed to delete User ID #' . $this->input->post('id')

                );

                echo json_encode($return);
                // print out a JSON encoded error message


            }*/
        }


        //activate the user
        function activate ($id) {

                $activation = $this->ion_auth->activate($id);

            if ($activation) {
                echo 'aktivierung geklappt';
                //redirect them to the auth page
                //$this->session->set_flashdata('message', $this->ion_auth->messages());
                //redirect("mitglieder", 'refresh');
            } else {
                echo 'aktivierung nicht geklappt';
                //redirect them to the forgot password page
                //$this->session->set_flashdata('message', $this->ion_auth->errors());
                //redirect("auth/forgot_password", 'refresh');
            }
        }

    }

