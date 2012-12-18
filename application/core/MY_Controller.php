<?php  !defined('BASEPATH') and exit('No direct script access allowed');


    class MY_Controller extends CI_Controller {

        public function __construct () {
            parent::__construct();
            if (!$this->ion_auth->logged_in()) {
                redirect('auth/login', 'refresh');

            }

            //
            //$this->output->enable_profiler(TRUE);
        }


        /**
         * name:        renderAll
         *
         * renders and loads views
         *
         * @param       string  $template       controller name
         * @param       array   $data           some data
         *
         * @author      parobri.ch
         * @date        20120710
         */


        public function __renderAll ($main_content, $data) {
            //echo $site_name;
            $this->load->view('template/header');
            $this->load->view('template/heading');
            $this->load->view('template/nav');
            $this->load->view('template/sidebar',$data);
            $this->load->view($main_content .  '_view', $data);
            $this->load->view('template/footer');
        }


    }


/* End of file adminpage_controller.php */
/* Location: ./buchverwaltung/application/controllers/redaktion/adminpage_controller.php */