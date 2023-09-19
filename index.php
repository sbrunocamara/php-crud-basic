<?php

use crudController\AuthController;
use crudMiddleware\Authenticate;
use crudRepositories\PersonRepository;

ini_set('display_errors', 'Off');

require_once __DIR__ . '\vendor\autoload.php';

header("Access-Control-Allow-Origin:*");
header("Content-Type: *");
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header("Access-Control-Max-Age: 3600");
header('Access-Control-Allow-Credentials: true ');
header('Access-Control-Allow-Headers: *');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

$requestMethod = $_SERVER["REQUEST_METHOD"];

$endpoint = end($uri);
switch( $endpoint) {
    case 'login':
        $auth = new AuthController();
        $input = (array) json_decode(file_get_contents('php://input'), true);
        $login = $auth->login( $input);

        $data = json_encode(["message"=>$login['message'],"token"=>$login['JWT'][0]]);
        echo ($data);
        break;
      
    case 'echo':
        $input = (array) json_decode(file_get_contents('php://input'), true);
        echo json_encode( $input);
        break;

        case 'create':
            $input = (array) json_decode(file_get_contents('php://input'), true);
            $auth = new Authenticate();
            $tokenCheck = $auth->checkToken($input['access_token']);

            if(!$tokenCheck){
                $data = json_encode(["message"=>'Não autorizado']);
                echo ($data);
            }

            $personRepository = new PersonRepository();
            $newPerson = $personRepository->create($input);

            if($newPerson){
                $data = json_encode(["message"=>'Sucesso ao inserir dados']);
                echo ($data);
                break;
            }


            $data = json_encode(["message"=>'Erro ao incluir dados']);
            echo ($data);
            break;

            case 'update':
                $input = (array) json_decode(file_get_contents('php://input'), true);
                $auth = new Authenticate();
                $tokenCheck = $auth->checkToken($input['access_token']);
    
                if(!$tokenCheck){
                    $data = json_encode(["message"=>'Não autorizado']);
                    echo ($data);
                }
    
                $personRepository = new PersonRepository();
                $newPerson = $personRepository->update($input);
    
                if($newPerson){
                    $data = json_encode(["message"=>'Sucesso ao atualizar dados']);
                    echo ($data);
                    break;
                }
    
    
                $data = json_encode(["message"=>'Erro ao atualizar dados']);
                echo ($data);
                break;

                case 'get':
                    $input = (array) json_decode(file_get_contents('php://input'), true);
                    $auth = new Authenticate();
                    $tokenCheck = $auth->checkToken($input['access_token']);
        
                    if(!$tokenCheck){
                        $data = json_encode(["message"=>'Não autorizado']);
                        echo ($data);
                    }
        
                    $personRepository = new PersonRepository();
                    $getPerson = $personRepository->getPerson($input);
        
                    if($getPerson){
                        $data = json_encode(["message"=>'Sucesso ao obter lista de pessoas',"data"=>$getPerson]);
                        echo ($data);
                        break;
                    }
        
        
                    $data = json_encode(["message"=>'Erro ao obter lista de pessoas']);
                    echo ($data);
                    break;
    
    default:
        header('HTTP/1.1 404 Not Found');
        echo json_encode( array('mensagem'=>'Rota inexistente'));
        break;
}



