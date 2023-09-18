<?php

namespace crudRepositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use crudEntities\UserEntity;
use crud\Utils;

class UserRepository extends Utils
{
   private $mysqlConnect;
    
    public function __construct()
    {
        $this->abreConexao();

        if($this->mysqlConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }


    }

    public function getUser(string $user)
    {
        
        try{


            $sql = "SELECT * FROM usuarios
            WHERE usuario = ? LIMIT 1";
            $bind = [
                $user
            ];
            
            $execute = $this->conexao->execute($sql,$bind);
            $user = $execute->getAll();

            
                
        }
        catch(\Illuminate\Database\QueryException $ex){
             
           return false;
        
          }

          
        $userEntity = new UserEntity(); 


        if(!empty($user) || $user != NULL ){
            
            return $userEntity->load((object)$user[0]);

        }

        $userEntity->reset();

        return $userEntity;
    }



}