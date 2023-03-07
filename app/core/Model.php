<?php

/**
 * Model trait
 */
trait Model
{
    use Database;
    protected $limit  = 10;
    protected $offset = 0;
    protected $orderType = 'DESC';
    protected $orderColum = 'id';
    public function findAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY $this->orderColum $this->orderType  LIMIT $this->limit OFFSET $this->offset ";
        return $this->query($query);
    }
    public function where($data, $dataNot = [])
    {
        $query = "SELECT * FROM $this->table WHERE ";
        $keys = array_keys($data);
        $keys_not = array_keys($dataNot);
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }
        $query = trim($query, " && ");
        $query .= "ORDER BY $this->orderColum $this->orderType LIMIT $this->limit OFFSET $this->offset ";
        $data = array_merge($data, $dataNot);
        return $this->query($query, $data);
    }
    public function first($data, $dataNot = [])
    {
        $query = "SELECT * FROM $this->table WHERE ";
        $keys = array_keys($data);
        $keys_not = array_keys($dataNot);
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }
        $query = trim($query, " && ");
        $query .= " LIMIT $this->limit OFFSET $this->offset ";
        $data = array_merge($data, $dataNot);
        $result = $this->query($query, $data);
        if ($result)
            return $result[0];
        return false;
    }
    public function insert($data)
    {
        /** Remove unwanted data */
        if (empty($this->allowedColums)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowColums)) {
                    unset($data[$key]);
                }
            }
        }
        
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(' , ', $keys) . ") VALUES (:" . implode(' , :', $keys) . ") ";
        $this->query($query, $data);
        return false;
    }
    public function update($id, $data, $id_colum = 'id')
    {
        /** Remove unwanted data */
        if (empty($this->allowedColums)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowColums)) {
                    unset($data[$key]);
                }
            }
        }

        $query = "UPDATE $this->table SET  ";
        $keys = array_keys($data);
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . ", ";
        }
        $query = trim($query, ", ");
        $query .= " WHERE $id_colum =:$id_colum ";
        $data[$id_colum] = $id;
        $this->query($query, $data);
        return false;
    }
    public function delete($id, $id_colum = 'id')
    {
        $data[$id_colum] = $id;
        $query = "DELETE FROM $this->table WHERE $id_colum =:$id_colum ";
        $this->query($query, $data);
        return false;
    }
}
