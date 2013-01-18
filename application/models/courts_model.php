<?php
    class Courts_model extends CI_Model {



        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
        }


        //Daten werden in die DB geschriben

        public function saveRecord($sTable, $aData) {
            $this->db->insert($sTable, $aData);
        }

        public function join () {
            $this->db->select('*');
            $this->db->from('category');
            $this->db->join('court', 'category.category_id = court.category_id');
            $query = $this->db->get();
            print_r($this->db->get());

        }




        /**
         * name:        getRow
         *
         * get associative array with data from one Record
         *
         * @param       string  $sTable     database table name
         * @param       string  $sFields    fieldnames, comma separated
         * @param       array   $aWhere     data for WHERE-Clause, key =
         *                                  fieldname, value = search string
         * @return      array
         *
         * @author      Roger Klein - rklein [at] klik-info [dot] ch
         * @date        20111209
         *
         **/
        public function getRow($sTable,
                               $sFields,
                               $aWhere) {
            $this->db->select($sFields, false);
            $this->db->or_where($aWhere);
            return $this->db->get($sTable)->row_array();
        }



    }