<?php
class Card_employee {
    private $id;
    private $nom_prenom;
    private $role;
    private $description;
    private $img;
    private $active;
    private $id_user;

    // Constructeur
    public function __construct(array $tableau = null)
    {
        if ($tableau != null) {
            $this->fill($tableau);
        }
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
     * Get the value of nom_prenom
     */ 
    public function get_nom_prenom()
    {
        return $this->nom_prenom;
    }

    /**
     * Set the value of nom_prenom
     *
     * @return  self
     */ 
    public function set_nom_prenom($nom_prenom)
    {
        $this->nom_prenom = $nom_prenom;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function get_role()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function set_role($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function get_description()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function set_description($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function get_img()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function set_img($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of active
     */ 
    public function get_active()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function set_active($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function get_id_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function set_id_user($id_user)
    {
        $this->id_user = $id_user;

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