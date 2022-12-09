<?php

require_once(__DIR__ . '/db.php');

    class LoanTransactionModel extends Db {

        public function fetchData() {
            $this->query("SELECT * FROM `tblloantransaction`");
            
            $data = $this->fetchAll();

            if (!empty($data)) {
                $response = array(
                    'status' => true,
                    'data' => $data
                );

                return $response;
            }

            if (empty($data)) {
                $response = array(
                    'status' => false,
                    'data' => $data
                );

                return $response;
            }
        }
    }

?>