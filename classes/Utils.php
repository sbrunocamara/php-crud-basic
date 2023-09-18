<?php

namespace crud;

class Utils {

    var $conexao = NULL;

    
    function abreConexao() {
        $objConexao = Conexao::getInstance();
        $this->conexao = $objConexao->getConexao();
        if($this->conexao == NULL){
            return false;
        }else{
            return true;
        }
    }


    function getAll($query)
    {
        $conexao = $this->abreConexao();
        if($conexao){
            return $this->conexao->getAll($query);
        }else{
            return false;
        }
    }

    function Execute($query,$bind)
    {
        $conexao = $this->abreConexao();
        
        if($conexao){
            return $this->conexao->Execute($query,$bind);
        }else{
            return false;
        }
    }
    


    
}
