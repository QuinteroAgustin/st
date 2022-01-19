<?php
/**
 * Classe DAO User
 * 
 * @author Agustin quintero
 */

 class Card_employeeDAO extends dao {
    /**
     * Constructeur
    */
    function __construct() {
        parent::__construct();
    }

    /**
    * Lecture d'une carte employee par son ID
    * @param int ID de une card
    * @return \Card_employee
    */
    function find($id) {
        $sql = "SELECT * FROM card_employee WHERE id= :id";
        try {
            $params = array(":id" => $id);
            $sth=$this->executer($sql,$params); 
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $card_employee=null;
        if($row) {
            $card_employee = new Card_employee($row);
        }
        // Retourne l'objet métier
        return $card_employee;
    } // function find()
  
    /**
    * Lecture de tous les  cards
    * @return array
    */
    function findAll() {
        $sql = "SELECT * FROM card_employee";
        try {
            $sth=$this->executer($sql); 
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $card_employees = array();
        foreach ($rows as $row) {
            $card_employees[] = new Card_employee($row);
        }
        // Retourne un tableau d'objets
        return $card_employees;
    } // function findAll()
 }