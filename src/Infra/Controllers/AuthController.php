<?php

namespace crudController;


use crudRepositories\UserRepository;
use crudServices\UserService;
use crud\Response;
use crudMiddleware\Authenticate;

class AuthController extends Response
{
    private Response $response;

    public function __construct()

    {

        $this->response = new Response();
        
    }

    public function login($data) {

        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
        $response = $this->response->getStatusDescription();

        $defaultOutputDTO =  $userService->login((object)$data);

    
        if($defaultOutputDTO->getErrorCode() == 400 || $defaultOutputDTO->getErrorCode() == 401  ){
            
            $response = [
                "cod" => "HTTP/1.1 ". $defaultOutputDTO->getErrorCode().' '. $response[$defaultOutputDTO->getErrorCode()],
                "message"=>$defaultOutputDTO->getErrorMessage()
                
            ];

            return $response;
         
        }
  
        
        $response = [
            "cod" => "HTTP/1.1 200 Ok",
            "message"=>$defaultOutputDTO->getErrorMessage(),
            "JWT"=>$defaultOutputDTO->getData()
            
        ];

        return $response;

        
    }
}