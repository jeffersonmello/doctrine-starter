<?php
namespace OmegaInc\Controllers;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

/**
 * Controller de Autenticação
 */
class AuthController {
    /**
     * Container
     * @var object s
     */
   protected $container;
   
   /**
    * Undocumented function
    * @param ContainerInterface $container
    */
   public function __construct($container) {
       $this->container = $container;
   }
   
   /**
    * Invokable Method
    * @param Request $request
    * @param Response $response
    * @param [type] $args
    * @return void
    */
   public function __invoke(Request $request, Response $response, $args) {
    $key = $this->container->get("secretkey");
    $token = array(
        "iss" => "omegainc.com.br",
        "usuario" => "omega",
        "github" => "omega"
    );
    $jwt = JWT::encode($token, $key);
    return $response->withJson(["auth-jwt" => $jwt], 200)
        ->withHeader('Content-type', 'application/json');   
   }
}