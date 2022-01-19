<?php
/**
 * Classe DAO User
 * 
 * @author Agustin quintero
 */

 class PostDAO extends dao {
    /**
     * Constructeur
    */
    function __construct() {
        parent::__construct();
    }

    /**
    * Lecture d'un post par son ID
    * @param int ID du post
    * @return \Post
    */
    function find($id) {
        $sql = "SELECT * FROM post WHERE id= :id";
        try {
            $params = array(":id" => $id);
            $sth=$this->executer($sql,$params); 
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $post=null;
        if($row) {
            $post = new Post($row);
        }
        // Retourne l'objet métier
        return $post;
    } // function find()
  
    /**
    * Lecture de tous les posts
    * @return array
    */
    function findAll() {
        $sql = "SELECT * FROM post";
        try {
            $sth=$this->executer($sql); 
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $posts = array();
        foreach ($rows as $row) {
            $posts[] = new Post($row);
        }
        // Retourne un tableau d'objets
        return $posts;
    } // function findAll()
 }