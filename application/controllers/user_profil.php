<?php

    class User_profil extends MY_Controller {

        protected $sControllerName = '';

        /**
         * name:        index
         *
         * prepare home view, admin or member
         *
         *
         * @author      parobri.ch
         * @date        20120710
         */
        public function index () {


            $this->data['title'] = "User Profil";
            $this->sControllerName = 'user_profil';
            parent::__renderAll($this->sControllerName, $this->data);


        }


    }
