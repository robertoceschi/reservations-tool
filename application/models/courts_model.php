<?php
    class Courts_model extends CI_Model {



        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
        }

        /*function get_last_ten_entries()
        {
            $query = $this->db->get('entries', 10);
            return $query->result();
        }*/

        function insert_entry()
        {
            $data = 'Platz1';
            $this->db->insert('court', $data );
        }

        /*function update_entry()
        {
            $this->title   = $_POST['title'];
            $this->content = $_POST['content'];
            $this->date    = time();

            $this->db->update('entries', $this, array('id' => $_POST['id']));
        }
         */

        public function saveRecord($sTable, $aData) {


                $this->db->insert($sTable, $aData);
                $iItemId = $this->db->insert_id();

                return $iItemId;
        }
    }