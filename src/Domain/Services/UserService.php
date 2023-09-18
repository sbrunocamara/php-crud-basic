<?php

namespace crudServices;

use crud\UserEntity;
use crudApplication\DefaultOutputDTO;
use crudMiddleware\Authenticate;
use crudRepositories\UserRepository;

class UserService
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(object $data): DefaultOutputDTO
    {


        if (empty($data->usuario)) {
            return new DefaultOutputDTO([], '400', 'Usuario não informado');
        }


        if (empty($data->senha)) {
            return new DefaultOutputDTO([], '400', 'Senha não informada');
        }
        
    
        $user = $this->userRepository->getUser($data->usuario);

       
        if (!$user){
            
            return new DefaultOutputDTO([], '401', "Usuário ou senha inválidos");  
        }


        if($user->getStatus() == 0){

            return new DefaultOutputDTO([], '400', "Usuário bloqueado");  
        }
 

        if ($user->getId() >= 1) {

            $dataBaseAuth = $this->Auth($user, $data);
   
        }


        if($dataBaseAuth === true){
            $authenticate = new Authenticate($this->userRepository);
            $token =  $authenticate->generateToken($user->getId());

                        
            return new DefaultOutputDTO([$token], '200', "Usuário validado com sucesso");
        }

        return new DefaultOutputDTO([], '401', "Usuário ou senha inválidos");

    }

    //Does try the authentication in SAC Database
    public function Auth($user, $data)
    {

        
        if ($user->getSenha() != sha1($data->senha)) {
                  
         return false;

        }

        return true;
        
    }


   
}