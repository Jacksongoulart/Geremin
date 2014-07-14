<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\DAO\mongodb;

use GEREMIN\DAO\IUsuarioDAO,
	GEREMIN\Model\Usuario;

class UsuarioDAO implements IUsuarioDAO{

	private $pdo;

	public function __construct(){
		try{
			$this->pdo = Connection::Instance()->get();
			$this->pdo->setCollection('usuario');
		}
		catch(MongoException $ex){
			throw new Exception("Erro de conexão: ".$ex->getMessage());
		}
	}

	public function create(Usuario $usuario){
		$this->pdo->insert(self::createArray($usuario));
	}

    public function find(Usuario $usuario){
		return ($this->pdo->get('_id', $usuario->getEmail(), TRUE));
    }

    public function findAll(){
		return $this->pdo->getAll();
    }

    public function update(Usuario $usAnterior, Usuario $usAtual){
    	return $this->pdo->update(self::createArray($usAnterior), self::createArray($usAtual));
    }

    public function delete($email){
    	$this->pdo->delete('_id', $email);
    }

    private static function createArray(Usuario $usuario){
        $user = array();
        $user['_id'] = $usuario->getEmail();
        if(!is_null($usuario->getNome()))
            $user['nome'] = $usuario->getNome();
        if(!is_null($usuario->getSenha()))
            $user['senha'] = $usuario->getSenha();
        if(!is_null($usuario->getNivel()))
            $user['nivel'] = $usuario->getNivel();
        if(!is_null($usuario->getCpf()))
            $user['cpf'] = $usuario->getCpf();
        return $user;
    }

    private static function createObject($usuario){
        $user = new Usuario();
        $user->setNome($usuario['nome']);
        $user->setEmail($usuario['_id']);
        $user->setSenha($usuario['senha']);
        $user->setNivel($usuario['nivel']);
        $user->setCpf($usuario['cpf']);
        return $user;
    }

    private static function hash($senha){
        return hash('md5',$senha);
    }
}

?>