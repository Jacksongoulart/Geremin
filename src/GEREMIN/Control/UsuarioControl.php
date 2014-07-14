<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\Control;

use GEREMIN\Model\Usuario,
	GEREMIN\DAO\Factory;

class UsuarioControl {

	private $dao;

	public function __construct(){
		$this->dao = Factory::getFactory(Factory::MongoDB)->getUsuarioDAO();
	}

	public function create($email, $senha, $nome, $cpf, $nivel){
		$usuario = $this->createObject($email, self::hash($senha), $nome, $cpf, $nivel);
		return $this->dao->create($usuario);
	}

	public function find($email){
		$usuario = self::createObject($email);
		return $this->dao->find($usuario);
	}

	public function remove($email){
		$this->dao->delete($email);
	} 

	public function findAll(){
		return $this->dao->findAll();
	}

	public function update($emailAntigo, $emailNovo, $senha, $nome, $cpf, $nivel){
		$usAnterior = $this->createObject($emailAntigo);
		$usAtual = $this->createObject($emailNovo, $senha, $nome, $cpf, $nivel);
		$dao->update($usAnterior, $usAtual);
	}

	public function createObject($email, $senha = null, $nome = null, $cpf = null, $nivel = null){
		$usuario = new Usuario();
		$usuario->setEmail($email);
		$usuario->setNome($nome);
		$usuario->setSenha($senha);
		$usuario->setCpf($cpf);
		$usuario->setNivel($nivel);
		return $usuario;
	}

	private function hash($senha){
		return hash('md5', $senha);
	}
}