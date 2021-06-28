<?php
class CRUD extends Conexion
{
    private $conexion;
    private $query;
    private $values;

    public function __construct()
    {
        parent::__construct();
        $this->conexion = $this->connect();
    }

    public function insert(string $query, array $values)
    {
        $this->query = $query;
        $this->values = $values;
        $insert = $this->conexion->prepare($this->query);
        $resInsert = $insert->execute($this->values);
        /*
        if ($resInsert === FALSE)
            $lastInsert = 0;
        else   
            $lastInsert = $this->conexion->lastInsertId();
        */
        return $resInsert;
    }

    public function select(string $query)
    {
        $this->query = $query;
        $result = $this->conexion->prepare($this->query);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectAll(string $query)
    {
        $this->query = $query;
        $result = $this->conexion->prepare($this->query);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update(string $query, array $values)
    {
        $this->query = $query;
        $this->values = $values;
        $update = $this->conexion->prepare($this->query);
        $resUpdate = $update->execute($values);
        return $resUpdate;
    }

    public function delete(string $query)
    {
        $this->query = $query;
        $result = $this->conexion->prepare($this->query);
        $result->execute();
        return $result;
    }
}