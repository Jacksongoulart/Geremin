<?php

namespace GEREMIN\Control;
use GEREMIN\Control\MinicursoControl,
	GEREMIN\Control\UsuarioControl,
	GEREMIN\Control\GrupoControl,
	\Slim\Slim;

require_once __DIR__.'/../Autoloader.php';

class ControlFactory{

	private static $minCtrl;
	private static $usCtrl;

	public function getMinCtrl(){
		if(!isset(self::$minCtrl))
			self::$minCtrl = new MinicursoControl();
		return self::$minCtrl;
	}

	public function getUserCtrl(){
		if(!isset(self::$usCtrl))
			self::$usCtrl = new UsuarioControl();
		return self::$usCtrl;
	}
}

class Router extends Slim{

	private static $factory;

	public function __construct(){
		parent::__construct();
		if(!isset(self::$factory))
			self::$factory = new ControlFactory();
		$this->addUserRoutes(self::$factory);
		$this->addMinicursoRoutes(self::$factory);
	}

	public function addUserRoutes($factory){
		//getAllUsers
		$this->get('/users', function () use ($factory) {
			echo json_encode($factory->getUserCtrl()->findAll());
		});

		//getUserById
		$this->get('/users/:id', function ($id) use ($factory) {
			$user = $factory->getUserCtrl()->find($id);
			if (!is_null($user['_id']))
				echo json_encode($user);
			else
				echo '{"error": true}';
		});

		//addUser
		$this->post('/users', function() use ($app, $factory) {
			try{
				$request = $app->request()->getBody();
				$us = json_decode($request);
				// $usCtrl->create("jacksongoulart@comp.ufu.br", "123", "Jackson", "123", 1);
				$factory->getUserCtrl()->create($us->usEmail, "123", "123", "123", "");
				// $usCtrl->create($us->email, $us->senha, $us->usNome, $us->cpf, "");
				echo json_encode($us);
			}
			catch(Exception $e){
				echo "aa";
				throw new Exception($e);
			}
		});

		//deleteUser
		$this->delete('/users/:id', function($id) use ($factory) {
			$factory->getUserCtrl()->remove($id);
		});
	}

	public function addMinicursoRoutes($factory){
		//getAllMinicursos
		$this->get('/minicursos', function () use ($factory){
			echo json_encode($factory->getMinCtrl()->findAll());
		});

		//getMinicursoById
		$this->get('/minicursos/:id', function ($id) use ($factory){
			echo json_encode($factory->getMinCtrl()->find($id));
		});

		//searchMinicurso
		$this->get('/minicursos/search/:nome', function ($nome) use ($factory){
			echo json_encode($factory->getMinCtrl()->search($nome));
		});

		//addMinicurso
		$this->post('/minicursos', function() use ($factory){
			$request = Slim::getInstance()->request();
			$min = json_decode($request->getBody());
			$minCreated = $factory->getMinCtrl()->create($min->nome, $min->periodo, $min->descricao, $min->qtdAulas, 
							$min->responsaveis, $min->dataInicio, $min->dataFim);
			echo $minCreated;
		});
	}
}

$app = new Router();
$app->run();

?>
