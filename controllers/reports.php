<?php

require_once(__DIR__ . '/controller.php');
require_once(__DIR__ . '/../models/report.php');

    class Report extends Controller {

        public $active = "reports";
        private $reportModel;

        public function __construct()
        {
            if(!isset($_SESSION['staff_auth_status'])) header("Location: login.php");
            $this->reportModel = new ReportModel();
        }

        public function getData(): array {
            $data = $this->reportModel->fetchData();
            return $data;
        }

    }

?>