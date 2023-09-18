<?php

namespace crudEntities;

class UserEntity
{
    private int $id;
    private string $usuario;
    private $senha;
    private $status;

    public function reset()
    {
        $this->id = 0;
        $this->usuario = '';
        $this->senha = '';
        $this->status = '';
       
    }

    public function load(object $user):self
    {
        $this->reset();
       
        if($user->id > 0){
            $this->setId($user->id)
                ->setUsuario($user->usuario)
                ->setSenha($user->senha)
                ->setStatus($user->status);

        }


        return $this;
       
    }


    /**
     * 
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id=$id;

        return $this;
    }

    /**
     *
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     *
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario=$usuario;

        return $this;
    }

    /**
     *
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * S
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha=$senha;

        return $this;
    }


    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


}