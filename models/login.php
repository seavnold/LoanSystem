<?php

require_once(__DIR__ . '/db.php');

    class LoginModel extends Db {

        public function fetchEmail(string $email): array {

            $this->query("SELECT * FROM `tblstaff` WHERE `EmailAdd` = :email");
            $this->bind('email', $email);
            $this->execute();

            $data = $this->fetch();

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