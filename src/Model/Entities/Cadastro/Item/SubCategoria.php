<?php
    namespace OmegaInc\Model\Entities\Cadastro\Item;
    
    use OmegaInc\Model\Abs\Base;

/**
 * @Entity 
 * @Table(name="cad_subcategoria")
 **/
class SubCategoria extends Base {    
    /**
     * @var string
     * @Column(type="string", name="subdescricao") 
     */
    public $subdescricao;

    /**
     * @ManyToOne(targetEntity="Categoria")
     * @JoinColumn(name="guid_categoria", referencedColumnName="guid")
     */
    public $categoria;


    public function getSubDescricao(){
        return $this->subdescricao;
    }   

    public function setSubDescricao($value){
        if (!$value && !is_string($value)) {
            throw new \InvalidArgumentException("Subdescricao is required", 400);
        }
        $this->subdescricao = $value;
        return $this;  
    }   
}
