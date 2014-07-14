<?php

namespace GEREMIN\DAO;

use GEREMIN\Model\Grupo;

interface IGrupoDAO{

    public function create(Grupo $grupo);

    public function find(Grupo $grupo);

    public function findAll();

    public function update(Grupo $grupoAnterior, Grupo $grupoAtual);

    public function delete(Grupo $minicurso);
}

?>