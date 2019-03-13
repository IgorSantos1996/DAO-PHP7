<?php
    class SQL extends PDO{ // herda de PDO
        private $conn; // conexão a partir do construtor
        public function __construct(){
            $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7","root",""); // cria a conexão
        }
        public function query($rawQuery, $params = array())
        {
            // recebe uma query sql e tbm um array
            $stmt = $this->conn->prepare($rawQuery);
            $this->setParams($stmt, $params);
            $stmt->execute();
            return $stmt;
        }

        public function select($rawQuery, $params = array()):array
        {
            $stmt = $this->query($rawQuery, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        private function setParams($statement, $parameters = array())
        {
            foreach ($parameters as $key => $value)
            {
                $this->setParam($key, $value);
            }
        }

        private function setParam($statement, $key, $value)
        {
            $statement->bindParam($key, $value);
        }
            }
?>