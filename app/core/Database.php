<?php
defined('ROOTPATH') or exit('<h1 style="margin-top:20px;text-align:center">Access Denied!</h1>');
/**
 * Database trait
 */
trait Database
{
    private function connect()
    {
        $string = 'mysql:hostname=' . DBHOST . ';dbname=' . DBNAME;
        return $conn   = new PDO($string, DBUSER, DBPASS);
    }
    public function query($query, $data = [])
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $check = $stmt->execute($data);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }
    public function getRow($query, $data = [])
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $check = $stmt->execute($data);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result[0];
            }
        }
        return false;
    }
}
