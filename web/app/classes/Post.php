<?php
class Post {
    private $id;
    private $title;
    private $sub_title;
    private $message;
    private $sub_message;
    private $img;
    private $position_img;
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
     * Get the value of title
     */ 
    public function get_title()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function set_title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of sub_title
     */ 
    public function get_sub_title()
    {
        return $this->sub_title;
    }

    /**
     * Set the value of sub_title
     *
     * @return  self
     */ 
    public function set_sub_title($sub_title)
    {
        $this->sub_title = $sub_title;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function get_message()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function set_message($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of sub_message
     */ 
    public function get_sub_message()
    {
        return $this->sub_message;
    }

    /**
     * Set the value of sub_message
     *
     * @return  self
     */ 
    public function set_sub_message($sub_message)
    {
        $this->sub_message = $sub_message;

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
     * Get the value of position_img
     */ 
    public function get_position_img()
    {
        return $this->position_img;
    }

    /**
     * Set the value of position_img
     *
     * @return  self
     */ 
    public function set_position_img($position_img)
    {
        $this->position_img = $position_img;

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