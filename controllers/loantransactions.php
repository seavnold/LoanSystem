<?php

require_once(__DIR__ . '/controller.php');
require_once(__DIR__ . '/../models/loantransaction.php');

    class LoanTransaction extends Controller {

        public $active = "loan transactions";
        private $loanTransactionModel;

        public function __construct()
        {
            if(!isset($_SESSION['staff_auth_status'])) header("Location: login.php");
            $this->loanTransactionModel = new LoanTransactionModel();
        }

        public function getData(): array {
            $data = $this->loanTransactionModel->fetchData();
            return $data;
        }

    }

?>