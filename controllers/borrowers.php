<?php

require_once(__DIR__ . '/controller.php');
require_once(__DIR__ . '/../models/borrower.php');

    class Borrower extends Controller {

        public $active = "borrowers";
        private $borrowerModel;

        public function __construct()
        {
            if(!isset($_SESSION['staff_auth_status'])) header("Location: login.php");
            $this->borrowerModel = new BorrowerModel();
        }

        public function getData(): array {
            $data = $this->borrowerModel->fetchData();
            return $data;
        }

        public function getDataById($id) {
            $data = $this->borrowerModel->fetchDataById($id);

            return $data['data'];
        }

        public function newBorrower(array $data): array {
            $fname = stripslashes(strip_tags($data['fname']));
            $mname = stripslashes(strip_tags($data['mname']));
            $lname = stripslashes(strip_tags($data['lname']));
            $contact = stripslashes(strip_tags($data['contact']));
            $email = stripslashes(strip_tags($data['email']));
            
            $errors = array();

            $borrowerExisted = $this->borrowerModel->fetchEmail($email);

            if (empty($fname)) {

                array_push($errors, 'First name is required!');

                $response = array(
                    'status' => false,
                    'errors' => $errors
                );

                return $response;
            }

            if (empty($mname)) {

                array_push($errors, 'Middle name is required!');

                $response = array(
                    'status' => false,
                    'errors' => $errors
                );

                return $response;
            }

            if (empty($lname)) {

                array_push($errors, 'Last name is required!');

                $response = array(
                    'status' => false,
                    'errors' => $errors
                );

                return $response;
            }

            if (empty($contact)) {

                array_push($errors, 'Contact number is required!');

                $response = array(
                    'status' => false,
                    'errors' => $errors
                );

                return $response;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                array_push($errors, 'Invalid Email');

                $response = array(
                    'status' => false,
                    'errors' => $errors
                );

                return $response;
            }

            if ($borrowerExisted['status']) {

                array_push($errors, 'Borrower already have data');

                $response = array(
                    'status' => false,
                    'errors' => $errors
                );

                return $response;
            }

            $borrowerRecord = $this->borrowerModel->addBorrower($data);

            if (!$borrowerRecord) {
                array_push($errors, 'There is something wrong in adding data');

                $response = array(
                    'status' => false,
                    'errors' => $errors
                );

                return $response;
            }

            $response = array(
                'status' => true,
                'message' => 'Borrower added!'
            );

            return $response;
        }

        public function updateBorrower(array $data) {

            $this->borrowerModel->updateBorrower($data);

            header("Location: borrowers.php");
        }

        public function removeBorrower($id) {
            $this->borrowerModel->removeBorrower($id);

            header("Location: borrowers.php");
        }

    }

?>