<?php

class Database {
    private $username = "docker"; //domyślne dane z obrazu
    private $password = "docker";
    private $host = "db"; // nazwa serwisu docker compose
    private $database = "db";
    private $port = "5432"; // wewnętrzny port w sieci Docker


    public function connect()
    {
        try {
            $conn = new PDO(
                "pgsql:host=$this->host;port=$this->port;dbname=$this->database",
                $this->username,
                $this->password
            );

            // ustawieie trybu raportowania błędów
            // istotne przy debugowaniu

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }
        catch(PDOException $e) {
            die("Connection failed: ". $e->getMessage());
        }
    }
}