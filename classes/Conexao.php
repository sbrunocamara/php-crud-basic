<?php

namespace crud;

class Conexao {

    public static $instance;
    public $conexao = NULL;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Conexao();
            $conexao = ADONewConnection(BD_TIPO_CONEXAO);
            if ($conexao->Connect(BD_HOST, BD_USR, BD_PASS, BD_BANCO_DE_DADOS)) {
                $conexao->debug = false;
                $conexao->SetFetchMode(ADODB_FETCH_ASSOC);
                $conexao->setCharset('utf8');
                self::$instance->conexao = $conexao;
            }
        } else {
            if (is_a(self::$instance->conexao, '__PHP_Incomplete_Class')) {
                $conexao = ADONewConnection(BD_TIPO_CONEXAO);
                if ($conexao->Connect(BD_HOST, BD_USR, BD_PASS, BD_BANCO_DE_DADOS)) {
                    $conexao->debug = false;
                    $conexao->SetFetchMode(ADODB_FETCH_ASSOC);
                    $conexao->setCharset('utf8');
                    self::$instance->conexao = $conexao;
                }
            }
        }
        return self::$instance;
    }

    public function getConexao() {
        return $this->conexao;
    }

}
