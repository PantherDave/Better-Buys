<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;

// Including database
require_once("{$base_dir}includes{$ds}Database.php");

class Seller {
    private $table = 'sellers';

    public $id;
    public $name;
    public $password;
    public $image;
    public $address;
    public $descrition;

    public function __construct()
    {
        
    }

    // validiting if params exists or not
    public function validate_params($value) {
        return !empty($value);
    }

    // saving new data in our db
    public function register_seller() {
        global $database;

        $this->name = $this->clean($this->name);
        $this->password = $this->clean($this->password);
        $this->image = $this->clean($this->image);
        $this->address = $this->clean($this->address);
        $this->descrition = $this->clean($this->descrition);

        $sql = "INSERT INTO $this->table (name, password, image, address, description) VALUES (
            ".$database->escape_value($this->name).",
            ".$database->escape_value($this->password).",
            ".$database->escape_value($this->image).",
            ".$database->escape_value($this->address).",
            ".$database->escape_value($this->descrition)."
        )";

        $seller_saved = $database->query($sql);

        return $seller_saved;
    }

    public function clean($value) {
        return trim(htmlspecialchars(strip_tags($value)));
    }
}

$seller = new Seller();