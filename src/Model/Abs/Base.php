<?php
namespace OmegaInc\Model\Abs;

/** @MappedSuperclass */
abstract class Base
{
     /**
     * @var int
     * @Id @Column(type="integer") 
     * @GeneratedValue
     */
    public $guid;

    /**
     * @var string
     * @Column(type="string") 
     */
    public $EEGUID;

    /**
     * @var boolean
     * @Column(type="boolean") 
     */
    public $Importado;

    /**
     * @var boolean
     * @Column(type="datetime") 
     */
    public $DataCriacao;

    /**
     * @var boolean
     * @Column(type="datetime") 
     */
    public $DataAlteracao;

    public function getId(){
        return $this->guid;
    }

    public function getEEGUID(){
        return $this->EEGUID;
    }

    public function getImportado(){
        return $this->Importado;
    }

    public function getDataCriacao(){
        return $this->DataCriacao;
    }

    public function getDataAlteracao(){
        return $this->DataAlteracao;
    }

    public function setDataCriacao(){        
        $this->DataAlteracao = new \DateTime("now");
    }

    public function setDataAlteracao(){        
        $this->DataAlteracao = new \DateTime("now");
    }

    public function setEEGUID($value){
        $this->EEGUID = $value;
        return $this;
    }

    public function setImportado($value){
        $this->Importado = $value;
        return $this;
    }

}
