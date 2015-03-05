<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 04.03.15
 * Time: 8:58
 */

class PDOConfig
    extends PDO {

    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;

    public function __construct(){
        $this->engine = 'mysql';
        $this->host = 'localhost';
        $this->database = 'library';
        $this->user = 'root';
        $this->pass = '';
        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
        parent::__construct( $dns, $this->user, $this->pass );
    }
} 