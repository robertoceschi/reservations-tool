<?php
    class Courts_model extends CI_Model {



        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
        }




        public function saveRecord($sTable, $aData) {
            $this->db->insert($sTable, $aData);

                //$iItemId = $this->db->insert_id();

                //return $iItemId;
        }
    }