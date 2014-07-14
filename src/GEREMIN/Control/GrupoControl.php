<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */
namespace GEREMIN\Control;

use GEREMIN\Model\Grupo,
	GEREMIN\DAO\Factory;

class GrupoControl {

	private $dao;

	public function __construct(){
		$this->dao = Factory::getFactory(Factory::MongoDB)->getGrupoDAO();
	}

	public function create($nome, $local, $tutor){
		$grupo = $this->createObject($nome, $local, $tutor);
		return $this->dao->create($grupo);
	}

	public function find($nome){
		$grupo = self::createObject($nome);
		return $this->dao->find($grupo);
	}

	public function findAll(){
		return $this->dao->findAll();
	}

	public function update($nomeAntigo, $nomeNovo, $local, $tutor, $integrantes){
		$grupoAnterior = $this->createObject($nomeAntigo);
		$grupoAtual = $this->createObject($nomeNovo, $local, $tutor, $integrantes);
		$this->dao->update($grupoAnterior, $grupoAtual);
	}

	public function createObject($nome, $local = null, $tutor = null, $integrantes = null){
		$grupo = new Grupo();
		$grupo->setNome($nome);
		$grupo->setLocal($local);
		$grupo->setTutor($tutor);
		$grupo->setIntegrantes($integrantes);
		return $grupo;
	}
}