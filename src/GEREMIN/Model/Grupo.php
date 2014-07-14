<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\Model;

class Grupo {

	private $nome;
	private $local;
	private $tutor;
	private $integrantes;

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setLocal($local) {
		$this->local = $local;
	}

	public function getLocal() {
		return $this->local;
	}

	public function setTutor($tutor) {
		$this->tutor = $tutor;
	}

	public function getTutor() {
		return $this->tutor;
	}

	public function setIntegrantes($integrantes) {
		$this->integrantes = $integrantes;
	}

	public function getIntegrantes() {
		return $this->integrantes;
	}
}

?>