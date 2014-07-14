<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */
namespace GEREMIN\Control;

use GEREMIN\Model\Minicurso,
	GEREMIN\DAO\Factory;

class MinicursoControl {

	private $dao;

	public function __construct(){
		$this->dao = Factory::getFactory(Factory::MongoDB)->getMinicursoDAO();
	}

	public function create($nome, $periodo, $descricao, $qtdAulas, $responsaveis, $dataInicio, $dataFim){
		$minicurso = $this->createObject($nome, $periodo, $descricao, $qtdAulas, $responsaveis, $dataInicio, $dataFim);
		return $this->dao->create($minicurso);
	}

	public function find($id){
		return $this->dao->find($id);
	}

	public function search($nome){
		return $this->dao->findLike($nome);
	}

	public function findAll(){
		return $this->dao->findAll();
	}

	public function update($nomeAntigo, $nomeNovo, $periodo, $descricao, $qtdAulas = null, $responsaveis = null, $dataInicio = null, $dataFim = null, $certificado = null, $participantes = null){
		$minAnterior = $this->createObject($nomeAntigo);
		$minAtual = $this->createObject($nomeNovo, $periodo, $descricao, $qtdAulas, $responsaveis, $dataInicio, $dataFim, $certificado, $participantes);
		return $this->dao->update($minAnterior, $minAtual);
	}

	public function createObject($nome, $periodo = null, $descricao = null, $qtdAulas = null, $responsaveis = null, $dataInicio = null, $dataFim = null, $certificado = null, $participantes = null){
		$minicurso = new Minicurso();
		$minicurso->setNome($nome);
		if(!is_null($descricao))
			$minicurso->setDescricao($descricao);
		if(!is_null($periodo))
			$minicurso->setPeriodo($periodo);
		if(!is_null($qtdAulas))
			$minicurso->setQtdAulas($qtdAulas);
		if(!is_null($responsaveis))
			$minicurso->setResponsaveis($responsaveis);
		if(!is_null($dataInicio))
			$minicurso->setDataInicio($dataInicio);
		if(!is_null($dataFim))
			$minicurso->setDataFim($dataFim);
		if(!is_null($certificado))
			$minicurso->setCertificado($certificado);
		return $minicurso;
	}

}