<?php
namespace crud;

class Usuario extends Utils {

    private ?int $id;
    private ?string $usuario;
    private ?int $gateway;
    

    public function getId(){
        return $this->id;
    }

    public function getusuario(){
        return $this->usuario;
    }


    public function getGateway(){
        return $this->gateway;
    }

    public function __construct() {
        $this->abreConexao();
    }

    public function listar() {
        $query = "SELECT id, usuario FROM usuarios";

        $rs = $this->conexao->Execute($query);

        if(!$rs) {
            return false;
        }

        return $rs->getAll();
    }
 
    public function validaUsuario($usuario, $senha){

        $sql = "SELECT * FROM usuarios"
            . " WHERE usuario = '" . $usuario . "'"
            . "   AND senha = '" . sha1($senha) . "'"
            . "   AND ativo = 1 LIMIT 1";
            

        $rs = $this->conexao->Execute($sql);

        if($rs && $rs->recordCount() > 0){
            while($row = $rs->fetchRow()){
                return $row['id'];
            }
        } else {
            return false;
        }
    }

    public function login(string $usuario, string $senha) :bool {
        $sql = "SELECT * FROM usuarios
            WHERE usuario = ? AND ativo = ? LIMIT 1";
            $bind = [
                $usuario,
                1
            ];
            

        $rs = $this->conexao->Execute($sql,$bind);

       

        
        if(!$rs && $rs->recordCount() <= 0){
    
            return false;
        }

     
        
        $row = $rs->fetchRow();



        if($row['senha']!=sha1($senha)){
            return false;
        }
        $this->carregaObjeto($row);
        return true;
        
          
    }

    private function carregaObjeto(array $row=[]){

        $this->id= $row['id'] ?? null;
        $this->usuario = $row['usuario'] ?? null;
        $this->gateway = $row['gateway_id'] ?? null;

       
    

    }
    
}
