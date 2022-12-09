<?php

require_once(__DIR__ . '/controller.php');
require_once(__DIR__ . '/../models/login.php');

    class Login extends Controller {

        public $active = 'login'; // highlight active link
        private $loginModel;

        public function __construct()
        {
            if (isset($_SESSION['staff_auth_status'])) header("Location: dashboard.php");
            $this->loginModel = new LoginModel();
        }

        public function login(array $data) {
            
            $email = stripslashes(strip_tags($data['email']));
            $password = stripslashes(strip_tags($data['password']));

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response = array(
                    'status' => false
                );

                return $response;
            }

            $emailRecord = $this->loginModel->fetchEmail($email);

            if ($emailRecord['status']) {

                if (password_verify($password, $emailRecord['data']['password'])) {

                    $_SESSION['staff_data'] = $emailRecord['data'];
                    $_SESSION['staff_auth_status'] = true;

                    header("Location: dashboard.php");

                } else {

                    $response = array(
                        'status' => false
                    );

                    return $response;

                }

            } else {

                $response = array(
                    'status' => false
                );

                return $response;

            }

        }

    }

?>