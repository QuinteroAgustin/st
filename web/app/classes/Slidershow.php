<?php
class Slidershow {
    private $id;
    private $img;
    private $active;
    private $display;
    private $text;
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
     * Get the value of display
     */ 
    public function get_display()
    {
        return $this->display;
    }

    /**
     * Set the value of display
     *
     * @return  self
     */ 
    public function set_display($display)
    {
        $this->display = $display;

        return $this;
    }

    /**
     * Get the value of text
     */ 
    public function get_text()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function set_text($text)
    {
        $this->text = $text;

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