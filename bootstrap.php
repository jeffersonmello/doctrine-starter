<?php
require './vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


//TODO: Configuração para Logs
$configs = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

//Conexão com banco de dados
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'omegain1_admin',
    'password' => 'c3df32ea11',
    'dbname'   => 'omegain1_doctt2',
);

$isDevMode = true;

//Diretório das entidades
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Model"), $isDevMode);

$entityManager = EntityManager::create($conn, $config);
$container = new \Slim\Container($configs);


require_once  './src/containers.php';

$app = new \Slim\App($container);

require_once  './src/middlewares.php';