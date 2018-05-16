<?php

abstract class Model {

    // PDO object of access to the database
    private $bdd;

    // Execute an SQL query possibly parameterized
    protected function executeRequest($sql, $params = null) {
        if ($params == null) {
            $result = $this->getBdd()->query($sql);    // direct query
        }
        else {
            $result = $this->getBdd()->prepare($sql);  // prepared query
            $result->execute($params);
        }
        return $result;
    }

    // Returns a connection object to the DB by initiating the connection if needed
    private function getBdd() {
        if ($this->bdd == null) {
            // Création de la connexion
            $this->bdd = new PDO('mysql:host=localhost;dbname=jean_forteroche_blog;charset=utf8',
            'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }

}