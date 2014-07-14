<?php

namespace GEREMIN\DAO;

use GEREMIN\Model\Minicurso;

interface IMinicursoDAO{

    public function create(Minicurso $minicurso);

    public function find($id);

    public function findAll();

    public function update(Minicurso $minicursoAnterior, Minicurso $minicursoAtual);

    public function delete(Minicurso $minicurso);

}

?>