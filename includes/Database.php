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

    // Executing SQL Query
    public function query($sql) {
        $result = $this->connection->query($sql);

        if (!$result) {
            die('Query fails : '.$sql);
        }

        return $result;
    }

    // Fetching list of data from the SQL query result
    public function fetch_array($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $result_array[] = $row;
            }

            return $result_array;
        }
    }

    // Fetching a single row of data from the SQL query
    public function fetch_row($result)
    {
        if ($result->num_rows > 0)
            return $result->fetch_assoc();
    }

    // Check proper format of the data
    public function escape_value($value) {
        return $this->connection->real_escape_string($value);
    }

    // Closes the connection with SQL
    public function close_connection() {
        $this->connection->close();
    }
}

$database = new Database();