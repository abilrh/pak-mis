<?php
class Database{
    private $host;
    private $database;
    private $username;
    private $password;
    private $connection;

public function __construct($host, $database, $username, $password){
    $this->host = $host;
    $this->database= $database;
    $this->username = $username;
    $this->password = $password;

    $this->connect();
    }
    
    private function connect(){
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error){
            die("Koneksi gagal: " . $this->connection->connect_error);
        }       
}
        public function getConnection(){
            return $this->connection;
        }
}
 //Gunakan Kelas Database Untuk Membuat Koneksi
 $database = new Database ("localhost","sekolah","root","");

 //Dapatkan Koneksi Dari Objek Database 
 $koneksi = $database->getConnection();

?>