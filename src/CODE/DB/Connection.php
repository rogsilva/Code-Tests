<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 21/10/14
 * Time: 20:01
 */

namespace CODE\DB;


class Connection {

    protected $data;

    public function __construct()
    {
        try {
            $pdo = new \PDO("sqlite:database.db");
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->data = $pdo;

        } catch (PDOException $ex) {
            die(
                "Message : " . $ex->getMessage()
            );
        }
    }


    public function get()
    {
        return $this->data;
    }
} 