<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\Model;

class Local {

	private $estado;
	private $cidade;
	private $universidade;
	private $faculdade;
	private $campus;
	private $bloco;
	private $sala;

	public function setEstado($estado) {
		$this->estado = $estado;
	}

	public function getEstado() {
		return $this->estado;
	}

	public function setCidade($cidade) {
		$this->cidade = $cidade;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function setUniversidade($universidade) {
		$this->universidade = $universidade;
	}

	public function getUniversidade() {
		return $this->universidade;
	}

	public function setFaculdade($faculdade) {
		$this->faculdade = $faculdade;
	}

	public function getFaculdade() {
		return $this->faculdade;
	}

	public function setCampus($campus) {
		$this->campus = $campus;
	}

	public function getCampus() {
		return $this->campus;
	}
	public function setBloco($bloco) {
		$this->bloco = $bloco;
	}

	public function getBloco() {
		return $this->bloco;
	}

	public function setSala($sala) {
		$this->sala = $sala;
	}

	public function getSala() {
		return $this->sala;
	}
}
?>