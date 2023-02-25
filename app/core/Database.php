<?php
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
}
