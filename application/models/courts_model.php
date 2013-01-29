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
            //calandarEvents[$stunde][$tag]

            $calendarEvents = array('8:00'  => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => 'besetzt',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
            ),
                                    '9:00'  => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => 'besetzt',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '10:00' => array('Mo' => 'besetzt',
                                                     'Di' => 'besetzt',
                                                     'Mi' => '',
                                                     'Do' => '',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '11:00' => array('Mo' => 'besetzt',
                                                     'Di' => '',
                                                     'Mi' => '',
                                                     'Do' => 'besetzt',
                                                     'Fr' => '',
                                                     'Sa' => '',
                                                     'So' => ''
                                    ),
                                    '12:00' => array('Mo' => 'besetzt',
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
        }



    }