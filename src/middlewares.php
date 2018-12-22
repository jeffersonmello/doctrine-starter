<?php 
use Psr7Middlewares\Middleware\TrailingSlash;

$app->add(new TrailingSlash(false));

$app->add(new \Tuupola\Middleware\HttpBasicAuthentication([
    "users" => [
        "root" => "toor"
    ],
    "path" => ["/v1/auth"],
]));


$app->add(new \Tuupola\Middleware\JwtAuthentication([
    "regexp" => "/(.*)/", //Regex para encontrar o Token nos Headers - Livre
    "header" => "X-Token", //O Header que vai conter o token
    "path" => "/", //Vamos cobrir toda a API a partir do /
    "ignore" => ["/v1/auth"], //Vamos adicionar a exceção de cobertura a rota /auth
    "realm" => "Protected", 
    "secret" => $container['secretkey'] //Nosso secretkey criado 
]));