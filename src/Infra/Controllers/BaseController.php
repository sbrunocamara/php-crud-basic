<?php

declare(strict_types=1);

namespace crudController;

use crudAdapters\Container;
use crudAdapters\Response as HttpResponse;
use crudAdapters\Response;


class BaseController {
    private HttpResponse $response;    
    
    public function __construct()
    {          
        $this->response = Container::getInstance()->get(Response::class);
    }   
    
    public function sendJsonResponse($data, string $message='', int $status=200)
    {       
        $dados = $this->getDefaultResponse($data, $message, true);

        return $this->response->json($dados)->setStatus($status)->send();
    }

    public function sendError($message, int $status= 404, array $data = [])
    {       
        $retorno = $this->getDefaultResponse($data,$message, false);

        return $this->response->json($retorno)->setStatus($status)->send();
    }



    private function getDefaultResponse($data, string $message, bool $success):array 
    {
        $retorno = [
            'success' => $success,
            'message' => $message ?? ''
        ];

        if(!empty($data) || is_array($data)){
            $retorno['data'] = $data;
        }

        return $retorno;
    }
}