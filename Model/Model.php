<?php

abstract class Model {

    // PDO object of access to the database
    private $_db;

    // Execute an SQL query possibly parameterized
    protected function executeRequest($sql, $params = null) {
        if ($params == null) {
            $result = $this->getDb()->query($sql);    // direct query
        }
        else {
            $result = $this->getDb()->prepare($sql);  // prepared query
            $result->execute($params);
        }
        return $result;
    }

    // Returns a connection object to the DB by initiating the connection if needed
    private function getDb() {
        if ($this->_db == null) {
            // Création de la connexion
            $this->_db = new PDO('mysql:host=localhost;dbname=jean_forteroche_blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->_db;
    }
    
    // Return the id of the last line inserted in the database
    protected function lastId() {
        return $this->getDb()->lastInsertId();
    }

}