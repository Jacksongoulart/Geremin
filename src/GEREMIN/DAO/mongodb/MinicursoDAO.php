<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\DAO\mongodb;

use GEREMIN\DAO\IMinicursoDAO,
	GEREMIN\Model\Minicurso,
    GEREMIN\Model\Usuario;

class MinicursoDAO implements IMinicursoDAO{

	private $pdo;

	public function __construct(){
		try{
			$this->pdo = Connection::Instance()->get();
			$this->pdo->setCollection('minicurso');
		}
		catch(MongoException $ex){
			throw new Exception("Erro de conexão: ".$ex->getMessage());
		}
	}

	public function create(Minicurso $minicurso){
		return $this->pdo->insert(self::createArray($minicurso));
	}

    public function find($id){
		$minicurso = $this->pdo->get('_id_', $id, TRUE);
        $minicurso['_id'] = $minicurso['_id']->{'$id'};
        return $minicurso;
    }

    public function findLike($value){
        return $this->pdo->getLike('nome', $value);
    }

    public function findAll(){
		$minicursos = $this->pdo->getAll();
        foreach($minicursos as $key => $value)
            $minicursos[$key]['_id'] = $minicursos[$key]['_id']->{'$id'};
        return $minicursos;
    }

    public function update(Minicurso $minAnterior, Minicurso $minAtual){
    	return $this->pdo->update(self::createArray($minAnterior), self::createArray($minAtual));
    }

    public function delete(Minicurso $minicurso){
    	$this->pdo->remove(self::createArray($minicurso), TRUE);
    }

    // public function newParticipante(Usuario $usuario){
    //     $this->pdo->insert(UsuarioDAO::usuarioArray($usuario));
    // }

    private static function createObject($minicurso){
        $min = new Minicurso();
        $min->setNome($minicurso['nome']);
        $min->setPeriodo($minicurso['periodo']);
        $min->setDescricao($minicurso['descricao']);
        $min->setQtdAulas($minicurso['qtdAulas']);
        $min->setDataInicio($minicurso['dataInicio']);
        $min->setDataFim($minicurso['dataFim']);
        return $min;
    }

    private static function createArray(Minicurso $minicurso){
    	$min = array();
        $min['nome'] = $minicurso->getNome();
        if(!is_null($minicurso->getDescricao()))
            $min['descricao'] = $minicurso->getDescricao();
        if(!is_null($minicurso->getResponsaveis()))
            $min['responsaveis'] = $minicurso->getResponsaveis();
        if(!is_null($minicurso->getPeriodo()))
            $min['periodo'] = $minicurso->getPeriodo();
        if(!is_null($minicurso->getQtdAulas()))
            $min['qtdAulas'] = $minicurso->getQtdAulas();
        if(!is_null($minicurso->getDataInicio()))
            $min['dataInicio'] = $minicurso->getDataInicio();
        if(!is_null($minicurso->getDataFim()))
            $min['dataFim'] = $minicurso->getDataFim();
        return $min;
    }
}

?>