<?php

require_once(__DIR__ . '/db.php');

    class BorrowerModel extends Db {

        public function fetchData() {
            $this->query("SELECT * FROM `tblborrower`");
            
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

        public function fetchDataById($id): array {

            $this->query("SELECT * FROM `tblborrower` WHERE `BorrowerID` = :id");
            $this->bind('id', $id);
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

        public function fetchEmail(string $email): array {

            $this->query("SELECT * FROM `tblborrower` WHERE `EmailAddress` = :email");
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

        public function addBorrower(array $data) {

            $borrowerData = array(
                'fname' => $data["fname"],
                'mname' => $data["mname"],
                'lname' => $data["lname"],
                'contact' => $data["contact"],
                'email' => $data["email"],
                'birthdate' => $data["birthdate"], 
            );

            $this->query("INSERT INTO `tblborrower` (Fname, Mname, Lname, ContactNumber, EmailAddress, Birthdate) VALUES (:fname, :mname, :lname, :contact, :email, :birthdate)");
            $result = $this->execute($borrowerData);

            return $result;
        }

        public function updateBorrower(array $data) {

            $payload = array(
                'fname' => $data["fname"],
                'mname' => $data["mname"],
                'lname' => $data["lname"],
                'contact' => $data["contact"],
                'email' => $data["email"],
                'birthdate' => $data["birthdate"],
                'borrowerID' => $data["id"],
            );

            $this->query("UPDATE `tblborrower` SET Fname = :fname, Mname = :mname, Lname = :lname, ContactNumber = :contact, EmailAddress = :email, Birthdate = :birthdate WHERE BorrowerID = :borrowerID");

            $result = $this->execute($payload);

            return $result;
        }

        public function removeBorrower($id) {
            $this->query("DELETE FROM `tblborrower` WHERE BorrowerID = :borrowerID");
            $this->bind("borrowerID", $id);

            $result = $this->execute();

            return $result;
        }
    }

?>