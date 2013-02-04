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

            return $this->db->insert_id();

        }




    /*$this->db->join('foreigntable ft' , 'ft.id = maintable.foreign_table_id') */


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


        public function get_events_for_week ($weeknr = '') {

            $days     = array('mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun');
            $hours    = array('08:00:00', '09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', '21:00:00');
            $court_id = '1';

            $calendarEvents = array();
            foreach ($hours as $hour) {
                foreach ($days as $day) {
                    $calendarEvents[$hour][$day] = $this->get_status_for_court($day, $hour, $court_id);
                }
            }
            return $calendarEvents;
        }

        public function get_status_for_court ($day, $hour, $court_id) {
            $this->db->select('*');
            $this->db->from('reservation');
            $this->db->where('reservation.day', $day);
            $this->db->where('reservation.start_time', $hour);
            $query  = $this->db->get();
            $result = $query->result();

            if ($result == null) {
                return '';
            } else {
                return 'besetzt';
            }
            return '';
        }

        //check ob Court schon besetzt ist oder nicht
        public function check_status_for_court ($aHour_day) {
            $data = array(
                'start_time' => $aHour_day[0] ,
                'day' => $aHour_day[1] ,
            );
            $this->db->select('*');
            $this->db->from('reservation');
            $this->db->where('reservation.start_time', $data['start_time']);
            $this->db->where('reservation.day', $data['day']);
            $query  = $this->db->get();

            $result = $query->result();


            //Falls Zeit-Slot schon vergeben wird true zurückgegeben / falls kein Eintrag vorhanden wird false zurückgegeben

            return $result;
        }




        //neue Reservation wird in die DB geschrieben
        public function set_status_for_court($aHour_day) {
            //array-werte werden ausgelesen und in die db geschrieben
            $data = array(
                'start_time' => $aHour_day[0] ,
                'day' => $aHour_day[1] ,
            );
            $reservation = $this->db->insert('reservation', $data);

            return  $reservation;

        }










    }