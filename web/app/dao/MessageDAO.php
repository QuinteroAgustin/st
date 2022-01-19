<?php
/**
 * Classe DAO User
 * 
 * @author Agustin quintero
 */

 class MessageDAO extends dao {
    /**
     * Constructeur
    */
    function __construct() {
        parent::__construct();
    }

    /**
    * Lecture d'un message par son ID
    * @param int ID du message
    * @return \Message
    */
    function find($id) {
        $sql = "SELECT * FROM message WHERE id= :id";
        try {
            $params = array(":id" => $id);
            $sth=$this->executer($sql,$params); 
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $message=null;
        if($row) {
            $message = new Message($row);
        }
        // Retourne l'objet métier
        return $message;
    } // function find()
  
    /**
    * Lecture de tous les messages
    * @return array
    */
    function findAll() {
        $sql = "SELECT * FROM message";
        try {
            $sth=$this->executer($sql); 
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $messages = array();
        foreach ($rows as $row) {
            $messages[] = new Message($row);
        }
        // Retourne un tableau d'objets
        return $messages;
    } // function findAll()
 }