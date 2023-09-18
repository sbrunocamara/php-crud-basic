<?php

namespace crudRepositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use crudEntities\UserEntity;
use crud\Utils;

class PersonRepository extends Utils
{
   private $mysqlConnect;
    
    public function __construct()
    {

        $this->abreConexao();

        if($this->mysqlConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }


    }

    public function create($person)
    {

        try{

            $nome = $person['nome'];
            $email = $person['email'];
            $telefone = $person['telefone'];
            $data = $person['data_nascimento'];


            $sql = "INSERT INTO pessoa (nome, email, telefone,data_nascimento)
            VALUES ('$nome', $email,'$telefone','$data')";
            
            $execute = $this->conexao->execute($sql);

            if($execute){
                return true;
            }

           return false; 
                
        }
        catch(\Illuminate\Database\QueryException $ex){
             
           return false;
        
          }

          
    }

    public function update($person){

        try{

            $id = $person['id'];
            $nome = $person['nome'];
            $email = $person['email'];
            $telefone = $person['telefone'];
            $data = $person['data_nascimento'];


            $sql = "UPDATE pessoa SET 
            nome = '$nome', email = '$email', telefone = '$telefone', data_nascimento = '$data'
            WHERE id = $id";
            
            $execute = $this->conexao->execute($sql);


            if($execute){
                return true;
            }

            return false;
                
        }
        catch(\Illuminate\Database\QueryException $ex){
             
           return false;
        
          }


    }

    public function getPerson($token){

        
        try{


            $sql = "SELECT * FROM pessoa";
            
            $execute = $this->conexao->execute($sql);
            $person = $execute->getAll();

            if($execute){
                return  $person;
            }

            return false;
                
        }
        catch(\Illuminate\Database\QueryException $ex){
             
           return false;
        
          }

    }


}