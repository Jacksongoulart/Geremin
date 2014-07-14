<?php

namespace GEREMIN\DAO;

use GEREMIN\Model\Usuario;

interface IUsuarioDAO{
    
    public function create(Usuario $usuario);

    public function find(Usuario $usuario);

    public function findAll();

    public function update(Usuario $usuarioAnterior, Usuario $usuarioAtual);

    public function delete($email);
}

?>