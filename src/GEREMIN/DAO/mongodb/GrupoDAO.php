<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\DAO\mongodb;

use GEREMIN\DAO\IGrupoDAO,
    GEREMIN\Model\Grupo;

class GrupoDAO implements IGrupoDAO{

    private $pdo;

    public function __construct(){
        try{
            $this->pdo = Connection::Instance()->get();
            $this->pdo->setCollection('grupo');
        }
        catch(MongoException $ex){
            throw new Exception("Erro de conexão: ".$ex->getMessage());
        }
    }

    public function create(Grupo $grupo){
        $this->pdo->insert(self::createArray($grupo));
    }

    public function find(Grupo $grupo){
        return self::createObject($this->pdo->get('nome', $grupo->getNome(), TRUE));
    }

    public function findAll(){
        return $this->pdo->getAll();
    }

    public function update(Grupo $grupoAnterior, Grupo $grupoAtual){
        return $this->pdo->update(self::createArray($grupoAnterior), self::createArray($grupoAtual));
    }

    public function delete(Grupo $grupo){
        $this->pdo->delete('nome', $grupo->getNome(), $grupo->getLocal());
    }

    private static function createArray(Grupo $grupo){
        $group = array();
        $group['nome'] = $grupo->getNome();
        if(!is_null($grupo->getLocal()))
            $group['local'] = $grupo->getLocal();
        if(!is_null($grupo->getTutor()))
            $group['tutor'] = $grupo->getTutor();
        if(!is_null($grupo->getIntegrantes()))
            $group['integrantes'] = $grupo->getIntegrantes();
        return $group;
    }

    private static function createObject($grupo){
        $group = new Grupo();
        $group->setNome($grupo['nome']);
        $group->setLocal($grupo['local']);
        $group->setTutor($grupo['tutor']);
        $group->setIntegrantes($grupo['integrantes']);
        return $group;
    }
} 
?>