<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Candidatura
{
    public $id;
    public $id_aluno;
    public $id_vaga;
    public $data;

    // Cadastrar uma candidatura
    public function cadastrar()
    {
        $obDatabase = new Database('candidaturas');

        $this->id = $obDatabase->insert([
            'id_aluno' => $this->id_aluno,
            'id_vaga'  => $this->id_vaga
        ]);

        return true;
    }

    // Buscar candidaturas de um aluno
    public static function getCandidaturasPorAluno($id_aluno)
    {
        return (new Database('candidaturas'))
            ->select('id_aluno = ' . (int)$id_aluno)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
