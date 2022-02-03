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
        $sql = "SELECT * FROM message ORDER BY date DESC";
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
    * Lecture de tous les messages par page
    * @return array
    */
    function findAllPage($limit, $offset) {
        $sql = "SELECT * FROM message ORDER BY date DESC LIMIT :limit,:offset;";
        try {
            $sth=$this->pdo->prepare($sql);
            $sth->bindValue(':limit',$limit,PDO::PARAM_INT);
            $sth->bindValue(':offset',$offset,PDO::PARAM_INT);
            $sth->execute();
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
    } // function findAllPage()

    /**
    * Insert un message
    * @param Message
    * @return 
    */
    function insert(Message $message) {
        $sql = "INSERT INTO message (nom, prenom, email, tel, adresse, ville, cp, subject, message, imgs, date, active) VALUES (:nom, :prenom, :email, :tel, :adresse, :ville, :cp, :subject, :message, :imgs, CURRENT_TIME, :active)";
        $params = array(
            ":nom" => $message->get_nom(),
            ":prenom" => $message->get_prenom(),
            ":email" => $message->get_email(),
            ":tel" => $message->get_tel(),
            ":adresse" => $message->get_adresse(),
            ":ville" => $message->get_ville(),
            ":cp" => $message->get_cp(),
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

    /**
    * compte le nombre de messages non lu
    * @param 
    * @return Int
    */
    function count() {
        $sql = "SELECT count(*) as nb FROM message WHERE active=1";
        try {
            $sth=$this->executer($sql); 
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        
        // Retourne un entier
        return $row['nb'];
    } // function count()

    /**
    * Lecture des messages avec des critères
    * @param critere 
    * @return \Message
    */

    /**
    * compte le nombre de messages non lu
    * @param 
    * @return Int
    */
    function countTotal() {
        $sql = "SELECT count(*) as nb FROM message";
        try {
            $sth=$this->executer($sql); 
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        
        // Retourne un entier
        return $row['nb'];
    } // function countTotal()

    /**
    * Lecture des messages avec des critères
    * @param critere 
    * @return \Message
    */

    function recherche($recherche) {
        $sql = "SELECT * FROM message WHERE id LIKE :recherche OR nom LIKE :recherche OR prenom LIKE :recherche OR email LIKE :recherche OR tel LIKE :recherche OR adresse LIKE :recherche OR ville LIKE :recherche OR cp LIKE :recherche ORDER BY date DESC";
        try {
            $params = array(
                ":recherche" => "%".$recherche."%"
            );
            $sth=$this->executer($sql, $params); 
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
    } // function rechercher()

    /**
    * met me msg en lu
    * @param id
    * @return Int
    */
    function messageLu($id) {
        $sql = "UPDATE message SET active=0 WHERE id=:id";
        try {
            $params = array(
                ":id" => $id
            );
            $sth=$this->executer($sql, $params); 
            $nb = $sth->rowCount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        
        // Retourne un entier
        return $nb;
    } // function messageLu()

    /**
    * met le msg en non lu
    * @param id
    * @return Int
    */
    function messageNonLu($id) {
        $sql = "UPDATE message SET active=1 WHERE id=:id";
        try {
            $params = array(
                ":id" => $id
            );
            $sth=$this->executer($sql, $params); 
            $nb = $sth->rowCount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        
        // Retourne un entier
        return $nb;
    } // function messageNonLu()

    /**
    * supprime un message
    * @param id
    * @return Int
    */
    function delete($id) {
        $sql = "DELETE FROM message WHERE id=:id";
        try {
            $params = array(
                ":id" => $id
            );
            $sth=$this->executer($sql, $params); 
            $nb = $sth->rowCount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        
        // Retourne un entier
        return $nb;
    } // function delete()
 }