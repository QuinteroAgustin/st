<?php
/**
 * Classe DAO User
 * 
 * @author Agustin quintero
 */

 class SlidershowDAO extends dao {
    /**
     * Constructeur
    */
    function __construct() {
        parent::__construct();
    }

    /**
    * Lecture d'un slidershow par son ID
    * @param int ID du slidershow
    * @return \Slidershow
    */
    function find($id) {
        $sql = "SELECT * FROM slidershow WHERE id= :id";
        try {
            $params = array(":id" => $id);
            $sth=$this->executer($sql,$params); 
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $slidershow=null;
        if($row) {
            $slidershow = new Slidershow($row);
        }
        // Retourne l'objet métier
        return $slidershow;
    } // function find()
  
    /**
    * Lecture de tous les slidershows
    * @return array
    */
    function findAll() {
        $sql = "SELECT * FROM slidershow";
        try {
            $sth=$this->executer($sql); 
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $slidershows = array();
        foreach ($rows as $row) {
            $slidershows[] = new Slidershow($row);
        }
        // Retourne un tableau d'objets
        return $slidershows;
    } // function findAll()

    /**
    * compte le nb de message actif
    * @param 
    * @return Int
    */
    function count() {
        $sql = "SELECT count(*) as nb FROM slidershow WHERE active=1";
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
    * Insert une photo
    * @param Slidershow
    * @return Int
    */
    function insert(Slidershow $img) {
        $sql = "INSERT INTO slidershow (img, active, display, text, id_user) VALUES (:img, :active, :display, :text, :id_user)";
        $params = array(
            ":img" => $img->get_img(),
            ":active" => $img->get_active(),
            ":display" => $img->get_display(),
            ":text" => $img->get_text(),
            ":id_user" => $img->get_id_user()
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
    * update une photo
    * @param Slidershow
    * @return Int
    */
    function update(Slidershow $img) {
        $sql = "UPDATE slidershow SET img=:img, active=:active, display=:display, text=:text, id_user=:id_user WHERE id=:id";
        $params = array(
            ":id"=>$img->get_id(),
            ":img" => $img->get_img(),
            ":active" => $img->get_active(),
            ":display" => $img->get_display(),
            ":text" => $img->get_text(),
            ":id_user" => $img->get_id_user()
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
    * supprime un slidershow
    * @param id
    * @return Int
    */
    function delete($id) {
        $sql = "DELETE FROM slidershow WHERE id=:id";
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