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


        //neue Reservation wird in die DB geschrieben
        public function set_status_for_court($date, $start_time, $end_time,	$user_id = 1,	$court_id = 1) {

            $this->db->insert('reservation');



        }





        /*public function get_events_for_week ($weeknr = '') {
            //calandarEvents[$stunde][$tag]

            $calendarEvents = array('8:00'  => array('Mo' => '',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
            ),
                                    '9:00'  => array('Mo' => '',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '10:00' => array('Mo' => '',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '11:00' => array('Mo' => '',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '12:00' => array('Mo' => '',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => 'besetzt',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '13:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => 'besetzt',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '14:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '15:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => 'besetzt',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '16:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '17:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '18:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '19:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '20:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '21:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''

                                    ),
                                    '22:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''

                                    ),
                                    '23:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''

                                    ),
                                    '00:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''

                                    ),
            );
            return $calendarEvents;
        } */



    }