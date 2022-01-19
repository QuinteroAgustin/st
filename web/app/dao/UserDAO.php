<?php
/**
 * Classe DAO User
 * 
 * @author Agustin quintero
 */

 class UserDAO extends dao {
    /**
     * Constructeur
    */
    function __construct() {
        parent::__construct();
    }

    /**
    * Lecture d'un user par son ID
    * @param int ID de l'utilisateur
    * @return \User
    */
    function find($id) {
        $sql = "SELECT * FROM user WHERE id= :id";
        try {
            $params = array(":id" => $id);
            $sth=$this->executer($sql,$params); 
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $user=null;
        if($row) {
            $user = new User($row);
        }
        // Retourne l'objet métier
        return $user;
    } // function find()
  
    /**
    * Lecture de tous les users
    * @return array
    */
    function findAll() {
        $sql = "SELECT * FROM user";
        try {
            $sth=$this->executer($sql); 
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $users = array();
        foreach ($rows as $row) {
            $users[] = new User($row);
        }
        // Retourne un tableau d'objets
        return $users;
    } // function findAll()
 }