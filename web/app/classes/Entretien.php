<?php
class Entretien {
    private $id_type_entretien;
    private $id;
    private $nom;
    private $prix;

    // Constructeur
    public function __construct(array $tableau = null)
    {
        if ($tableau != null) {
            $this->fill($tableau);
        }
    }

    /**
     * Get the value of id_type_entretien
     */ 
    public function get_id_type_entretien()
    {
        return $this->id_type_entretien;
    }

    /**
     * Set the value of id_type_entretien
     *
     * @return  self
     */ 
    public function set_id_type_entretien($id_type_entretien)
    {
        $this->id_type_entretien = $id_type_entretien;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function set_id($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function get_nom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function set_nom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function get_prix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function set_prix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Hydrateur
     * Alimente les propriétés à partir d'un tableau
     * @param array $tableau
     */
    public function fill(array $tableau)
    {
        foreach ($tableau as $cle => $valeur) {
            $methode = 'set_' . $cle;
            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }
}