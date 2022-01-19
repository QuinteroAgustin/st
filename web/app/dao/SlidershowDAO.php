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
 }