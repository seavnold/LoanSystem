<?php

require_once(__DIR__ . '/controller.php');

    class Logout extends Controller {

        public function __construct()
        {
            session_destroy();
            header("Location: /LoanSystem/page/staff/login.php");
        }

    }

?>