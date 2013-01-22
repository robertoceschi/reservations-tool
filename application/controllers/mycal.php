<?php
    class Mycal extends CI_Controller {

        function display($year = null, $month = null ) {

            if (!$year) {
                $year = date('Y');
            }
            if (!$month) {
                $month = date('m');
            }

            $this->load->model('Mycal_model');

            if ($day = $this->input->post('day')) {
                $this->Mycal_model->add_calendar_data(
                    "$year-$month-$day",
                    $this->input->post('data')
                );
            }

            $this->load->model('Mycal_model');
            $data['calendar'] = $this->Mycal_model->generate($year,$month);
            $this->load->view('mycal_view', $data);


        }

    }
