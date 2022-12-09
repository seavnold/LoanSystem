<?php

    class Db { 

        protected $dbname = "dbloansystem";
        protected $dbhost = "localhost";
        protected $dbuser = "root";
        protected $dbpass = "";
        protected $dbhandler, $dbstmt;

        public function __construct()
        {
            $dsn = "mysql:host=" . $this->dbhost . ';dbname=' . $this->dbname;

            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try {
                
                $this->dbhandler = new PDO($dsn, $this->dbuser, $this->dbpass, $options);

            } catch (Exception $e) {
                
                var_dump('Couldn\'t establish a database connection, due to the following reasons: ' . $e->getMessage());

            }
        }

        public function query($query) {
            $this->dbstmt = $this->dbhandler->prepare($query);
        }

        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch(true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                    break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                    break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                    break;
                    default:
                        $type = PDO::PARAM_STR;
                    break;
                }
            }

            $this->dbstmt->bindValue($param, $value, $type);
        }

        public function execute($data = null) {
            $this->dbstmt->execute($data);
            return true;
        }

        public function fetch() {
            $this->execute();
            return $this->dbstmt->fetch(PDO::FETCH_ASSOC);
        }

        public function fetchAll() {
            $this->execute();
            return $this->dbstmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>