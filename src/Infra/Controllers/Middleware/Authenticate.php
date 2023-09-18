<?php

namespace crudMiddleware;

use crud\UserEntity;
use crudApplication\DefaultOutputDTO;
use crudRepositories\TokenRepository;
use crudRepositories\UserRepository;
use DateTime;

class Authenticate
{


    public function __construct()
    {
        

    }

    public function generateToken($user)
    {

        $tokenRepository =  new TokenRepository();
        $newToken = $tokenRepository->newToken($user);

        return $newToken;
       

    }

    //Does try the authentication in SAC Database
    public function checkToken($token)
    {

        $tokenRepository =  new TokenRepository();
        $tokenCheck =  $tokenRepository->getToken($token);

        if(!$tokenCheck){
            return false;
        }

        $now = new DateTime( date("Y-m-d H:i:s"));
        $expires = new DateTime($tokenCheck[0]['expires_in']);

       
        return($now<$expires);



   
}

}