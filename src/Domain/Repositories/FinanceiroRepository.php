<?php

namespace crudRepositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use crudEntities\UserEntity;
use crud\Utils;

ini_set('display_errors', 'Off');

class FinanceiroRepository extends Utils
{
   private $mysqlConnect;
    
    public function __construct()
    {

        $this->abreConexao();

        if($this->mysqlConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }


    }

    public function create($titulo)
    {

        try{


            $pessoa_id = $titulo['pessoa_id'];
            $data_vencimento = $titulo['data_vencimento'];
            $data_pagamento = $titulo['data_pagamento'];
            $valor_devido = $titulo['valor_devido'];



            $sql = "INSERT INTO financeiro (pessoa_id, data_vencimento, data_pagamento,valor_devido)
            VALUES ('$pessoa_id', ' $data_vencimento',' $data_pagamento','$valor_devido')";
            
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

    public function delete($titulo)
    {

        try{

            $id = $titulo['id'];


            $sql = "DELETE FROM financeiro WHERE id = $id;";
            
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

    public function update($titulo){

        try{

            $id = $titulo['id'];
            $pessoa_id = $titulo['pessoa_id'];
            $data_vencimento = $titulo['data_vencimento'];
            $data_pagamento = $titulo['data_pagamento'];
            $valor_devido = $titulo['valor_devido'];



            $sql = "UPDATE financeiro SET 
            pessoa_id = '$pessoa_id', data_vencimento = '$data_vencimento', data_pagamento = '$data_pagamento', valor_devido = '$valor_devido'
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

    public function getTittle($token){

        
        try{


            $sql = "SELECT * FROM `financeiro` LEFT JOIN pessoa ON financeiro.pessoa_id = pessoa.id";
            
            $execute = $this->conexao->execute($sql);
            $titulo = $execute->getAll();

            if($execute){
                return   $titulo;
            }

            return false;
                
        }
        catch(\Illuminate\Database\QueryException $ex){
             
           return false;
        
          }

    }


}