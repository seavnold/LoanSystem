<?php

require_once(__DIR__ . '/controller.php');

    class Dashboard extends Controller {

        public $active = "dashboard";

        public function __construct()
        {
            if(!isset($_SESSION['staff_auth_status'])) header("Location: login.php");
        }

        public function getData(): array {
            return $_SESSION['staff_data'];
        }

    }

?>