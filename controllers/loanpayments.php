<?php

require_once(__DIR__ . '/controller.php');
require_once(__DIR__ . '/../models/loanpayment.php');

    class LoanPayment extends Controller {

        public $active = "loan payments";
        private $loanPaymentModel; 

        public function __construct()
        {
            if(!isset($_SESSION['staff_auth_status'])) header("Location: login.php");
            $this->loanPaymentModel = new LoanPaymentModel();
        }

        public function getData(): array {
            $data = $this->loanPaymentModel->fetchData();
            return $data;
        }

    }

?>