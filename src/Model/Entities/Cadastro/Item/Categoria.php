<?php
    namespace OmegaInc\Model\Entities\Cadastro\Item;
    
    use OmegaInc\Model\Abs\Base;

/**
 * @Entity 
 * @Table(name="cad_categoria")
 **/
class Categoria extends Base {    
    /**
     * @var string
     * @Column(type="string") 
     */
    public $descricao;


    public function getDescricao(){
        return $this->descricao;
    }   

    public function setDescricao($value){
        if (!$value && !is_string($value)) {
            throw new \InvalidArgumentException("Descricao is required", 400);
        }
        $this->descricao = $value;
        return $this;  
    }   
}
