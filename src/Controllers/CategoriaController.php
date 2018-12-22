<?php
namespace OmegaInc\Controllers;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use OmegaInc\Model\Entities\Cadastro\Item\Categoria;


class CategoriaController {
    private $container;

    public function __construct($container) {
        $this->container = $container;
    }
    

    public function GetAll($request, $response, $args) {
        $entityManager = $this->container->get('em');
        $repository = $entityManager->getRepository('OmegaInc\Model\Entities\Cadastro\Item\Categoria');

        $entities = $repository->findAll();
        $return = $response->withJson($entities, 200)
            ->withHeader('Content-type', 'application/json');
        return $return;        
    }
    

    public function Post($request, $response, $args) {
        $params = (object) $request->getParams();

        $entityManager = $this->container->get('em');

        $entity = (new Categoria())->setDescricao($params->descricao)
        ->setEEGUID($params->eeguid)
        ->setImportado($params->importado)
        ->setDataCriacao()
        ->setDataAlteracao();

        $logger = $this->container->get('logger');
        $logger->info('Categoria Created!', $entity->getValues());

        $entityManager->persist($entity);
        $entityManager->flush();
        $return = $response->withJson($entity, 201)
            ->withHeader('Content-type', 'application/json');
        return $return;       
    }

    public function Get($request, $response, $args) {
        $id = (int) $args['id'];
        $entityManager = $this->container->get('em');
        $repository = $entityManager->getRepository('OmegaInc\Model\Entities\Cadastro\Item\Categoria');

        if (!$entity) {
            $logger = $this->container->get('logger');
            $logger->warning("Categoria {$id} Not Found");
            throw new \Exception("Categoria not Found", 404);
        }    
        $return = $response->withJson($entity, 200)
            ->withHeader('Content-type', 'application/json');
        return $return;   
    }

    public function Put($request, $response, $args) {
        $id = (int) $args['id'];

        $entityManager = $this->container->get('em');
        $repository = $entityManager->getRepository('OmegaInc\Model\Entities\Cadastro\Item\Categoria');
        $entity = $repository->find($id);   

        if (!$entity) {
            $logger = $this->container->get('logger');
            $logger->warning("Categoria {$id} Not Found");
            throw new \Exception("Categoria not Found", 404);
        }  

        $entity->setDescricao($request->getParam('descricao'))    
        ->setDataAlteracao();

        $entityManager->persist($entity);
        $entityManager->flush();        
        
        $return = $response->withJson($entity, 200)
            ->withHeader('Content-type', 'application/json');
        return $return;       
    }


    public function Delete($request, $response, $args) {
        $id = (int) $args['id'];

        $entityManager = $this->container->get('em');
        $repository = $entityManager->getRepository('OmegaInc\Model\Entities\Cadastro\Item\Categoria');
        $entity = $booksRepository->find($id);   

        if (!$entity) {
            $logger = $this->container->get('logger');
            $logger->warning("Categoria {$id} Not Found");
            throw new \Exception("Categoria not Found", 404);
        }  

        $entityManager->remove($entity);
        $entityManager->flush(); 
        $return = $response->withJson(['msg' => "Deletando a Entidade {$id}"], 204)
            ->withHeader('Content-type', 'application/json');
        return $return;    
    }
    
}