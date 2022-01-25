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

    /**
    * Insert un message
    * @param Message
    * @return 
    */
    function insert(Message $message) {
        $sql = "INSERT INTO message (nom, email, subject, message, imgs, date, active) VALUES (:nom, :email, :subject, :message, :imgs, CURRENT_TIME, :active)";
        $params = array(
            ":nom" => $message->get_nom(),
            ":email" => $message->get_email(),
            ":subject" => $message->get_subject(),
            ":message" => $message->get_message(),
            ":imgs" => $message->get_imgs(),
            ":active" => 1
        );
        try {
            $sth=$this->executer($sql, $params); 
            $nb = $sth->rowCount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;
    } // function insert()
 }