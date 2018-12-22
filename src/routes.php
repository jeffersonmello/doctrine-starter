<?php

$app->group('/v1', function() {

    $this->group('/Categoria', function() {
        $this->get('', '\OmegaInc\Controllers\CategoriaController:GetAll');
        $this->post('', '\OmegaInc\Controllers\CategoriaController:Post');
        
        $this->get('/{id:[0-9]+}', '\OmegaInc\Controllers\CategoriaController:Get');
        $this->put('/{id:[0-9]+}', '\OmegaInc\Controllers\CategoriaController:Put');
        $this->delete('/{id:[0-9]+}', '\OmegaInc\Controllers\CategoriaController:Delete');
    });

    $this->group('/SubCategoria', function() {
        $this->get('', '\OmegaInc\Controllers\SubCategoriaController:GetAll');
        $this->post('', '\OmegaInc\Controllers\SubCategoriaController:Post');
        
        $this->get('/{id:[0-9]+}', '\OmegaInc\Controllers\SubCategoriaController:Get');
        $this->put('/{id:[0-9]+}', '\OmegaInc\Controllers\SubCategoriaController:Put');
        $this->delete('/{id:[0-9]+}', '\OmegaInc\Controllers\SubCategoriaController:Delete');
    });


    $this->group('/auth', function() {
        $this->get('', \OmegaInc\Controllers\AuthController::class);
    });
});