<?php

namespace crudRepositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use crudEntities\UserEntity;
use crud\Utils;

class TokenRepository extends Utils
{
   private $mysqlConnect;
    
    public function __construct()
    {

        $this->abreConexao();

        if($this->mysqlConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }


    }

    public function newToken(string $user)
    {
        
        $baseToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9';
        $token = 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IlJvZHJpZ28iLCJyb2xlIjoiYWRtaW4ifQ';
        $auth = 'rmMJkjnu3T9oS_HrYf0N9utUcsE_-tBunVv8ks6-beU';

        $date = date("Y-m-d H:i:s");
        $expires = date("Y-m-d H:i:s", strtotime("+12 hours $date"));

        try{

            $token = str_shuffle($baseToken).'.'.str_shuffle($token).'.'.str_shuffle($auth);

            $sql = "INSERT INTO auth_token (token, user, expires_in,created_in)
            VALUES ('$token', $user,'$expires','$date')";
            
            $execute = $this->conexao->execute($sql);

            
            if($execute){
                return $token;
            }

           
                
        }
        catch(\Illuminate\Database\QueryException $ex){
             
           return false;
        
          }

          
    }


    public function getToken($token){

        
        try{


            $sql = "SELECT * FROM auth_token
            WHERE token = ? LIMIT 1";
            $bind = [
                $token
            ];
            
            $execute = $this->conexao->execute($sql,$bind);
            $token = $execute->getAll();

            if($execute){
                return $token;
            }

            return false;
                
        }
        catch(\Illuminate\Database\QueryException $ex){
             
           return false;
        
          }

    }


}