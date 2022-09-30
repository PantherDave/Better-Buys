<?php
define('HOST', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'better_buys');

class Database {
    private $connection;

    public function __construct() {
        $this->open_db_connection();
    }

    public function open_db_connection() {
        $this->connection = mysqli_connect(HOST, USER_NAME, PASSWORD, DB_NAME);

        if (mysqli_connect_error()) {
            die('Connection Error : '.mysqli_connect_error());
        }
    }
}