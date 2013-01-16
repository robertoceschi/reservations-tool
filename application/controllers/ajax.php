<?php

    class Ajax extends MY_Controller {

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

        //datatables_ajax
        public function getdatabyajax () {
            $this->load->library('datatables');
            $this->datatables
                ->select('id, first_name,last_name, group, active')
                ->from('users') ->where('goup = "admin" ')
            ->edit_column('last_name', '$1', 'ucfirst(last_name)')
                ->add_column('delete', '<a href=" ' . base_url() . 'mitglieder/delete_user/$1"><i class="icon icon-trash"></i></a>', 'id')
                ->add_column('edit', '<a href=" ' . base_url() . 'mitglieder/edit_user/$1"><i class="icon icon-edit"></a>', 'id')
                ->unset_column('id');





            echo $this->datatables->generate();


        }


    }

