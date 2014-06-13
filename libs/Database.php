<?php

class Database extends PDO {

    function __construct($DB_TYPE, $HOST, $DATABSE, $USERNAME, $PASSWORD) {
        parent::__construct("$DB_TYPE:host=$HOST;dbname=$DATABSE", "$USERNAME", "$PASSWORD");
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function insert($table, $data) {
        $fields = implode('`, `', array_keys($data));
        $placeholders = ':' . implode(", :", array_keys($data));
        $sql = $this->prepare("INSERT INTO $table (`$fields`) VALUES ($placeholders)");

        foreach ($data as $key => $value) {
            $sql->bindValue(":$key", $value);
        }

        $sql->execute();
    }

    public function update($query, $data) {

        $sql = $this->prepare($query);

        foreach ($data as $key => $value) {
            $sql->bindValue(":$key", $value);
        }

        $sql->execute();
    }

    public function delete($table, $where,$data, $limit = 1) {
        $sql = $this->prepare("DELETE FROM $table WHERE $where LIMIT $limit");
        foreach ($data as $key => $value) {
            $sql->bindValue(":$key", $value);
        }
        $sql->execute();
    }

    public function select($query, $data = array(), $mode = PDO::FETCH_ASSOC) {
        $sql = $this->prepare($query);
        foreach ($data as $key => $value) {
            $sql->bindValue(":$key", $value);
        }

        $sql->execute();
        return $sql->fetchAll($mode);
    }
    
    public function count($query, $data = array(), $mode = PDO::FETCH_NUM){
        $sql = $this->prepare($query);
        foreach ($data as $key => $value) {
            $sql->bindValue(":$key", $value);
        }
        $sql->execute();
        $rows = $sql->fetch($mode);
        return $rows[0];
    }
    
    public function run($query, $data = array(), $mode = PDO::FETCH_ASSOC) {
        $sql = $this->prepare($query);
        foreach ($data as $key => $value) {
            $sql->bindValue(":$key", $value);
        }

        $sql->execute();
    }
}
