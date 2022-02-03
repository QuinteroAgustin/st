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
        $sql = "SELECT * FROM post ORDER BY date DESC";
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

    /**
    * compte le nombre de posts actif
    * @param 
    * @return \Int
    */
    function count() {
        $sql = "SELECT count(*) as nb FROM post WHERE active=1";
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
    * Insert un message
    * @param Post
    * @return Int
    */
    function insert(Post $post) {
        $sql = "INSERT INTO post (title, sub_title, message, sub_message, img, position_img, active, id_user, date) VALUES (:title, :sub_title, :message, :sub_message, :img, :position_img, :active, :id_user, CURRENT_TIME)";
        $params = array(
            ":title" => $post->get_title(),
            ":sub_title" => $post->get_sub_title(),
            ":message" => $post->get_message(),
            ":sub_message" => $post->get_sub_message(),
            ":img" => $post->get_img(),
            ":position_img" => $post->get_position_img(),
            ":active" => $post->get_active(),
            ":id_user" => $post->get_id_user()
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
    * update une post
    * @param Post
    * @return Int
    */
    function update(Post $post) {
        $sql = "UPDATE post SET title=:title, sub_title=:sub_title, message=:message, sub_message=:sub_message, img=:img, position_img=:position_img, active=:active, id_user=:id_user, date=CURRENT_TIME WHERE id=:id";
        $params = array(
            ":id"=>$post->get_id(),
            ":title" => $post->get_title(),
            ":sub_title" => $post->get_sub_title(),
            ":message" => $post->get_message(),
            ":sub_message" => $post->get_sub_message(),
            ":img" => $post->get_img(),
            ":position_img" => $post->get_position_img(),
            ":active" => $post->get_active(),
            ":id_user" => $post->get_id_user()
        );
        try {
            $sth=$this->executer($sql, $params);
            $nb = $sth->rowCount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;
    } // function update()

    /**
    * supprime de post
    * @param id
    * @return Int
    */
    function delete($id) {
        $sql = "DELETE FROM post WHERE id=:id";
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