<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Candidatura
{
    public $id;
    public $id_aluno;
    public $id_vaga;
    public $data_incricao;
    public $status;

    // Cadastrar uma candidatura
    public function cadastrar()
    {
        date_default_timezone_get('America/Sao_Paulo');
        $this->data_incricao = date('Y-m-d H:i:s');
        $Database = new Database('candidaturas');

        $this->id = $Database->insert([
            'id_aluno' => $this->id_aluno,
            'id_vaga'  => $this->id_vaga,
            'status' => $this->status,
            'data_incricao'  => $this->data_incricao

        ]);

        return true;
    }

    public function atualizar()
    {
        return (new DataBase('candidatura'))->update('id = ' . $this->id, [
             'id_aluno' => $this->id_aluno->id,
            'id_vaga'  => $this->id_vaga->id,
            'status' => $this->status,
            'data_incricao'  => $this->data_incricao

        ]);
    }


    public function excluir()
    {
        return (new DataBase('canditatura'))->delete('id = ' . $this->id);
    }

    // Buscar candidaturas de um aluno
    public static function getCandidatura($id)
    {

        $inscricao = (new Database('candidaturas')) ->select('id = ' . $id)->fetchObject(self::class);
            if($inscricao){
                $inscricao->aluno = Aluno::getAluno($inscricao->id_aluno);
                $inscricao->vaga= Vaga::getVaga($inscricao->id_vaga);
            }
        
            return $inscricao;
    }
    public static function getCandidaturas($where= null, $order=null, $limit=null){
        $inscricoes = (new Database('inscricao'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        $array = [];

            if(count($inscricoes) != 0){
                foreach($inscricoes as $inscricao){
                    $inscricao->aluno = Aluno::getAluno($inscricao->id_aluno);
                    $inscricao->vaga = Vaga::getVaga($inscricao->id_vaga);
                    $array[] = $inscricao;
                }
            }
            return $array;
    }
    public static function getQuantidadeCandidaturas($where = null)
    {
        return (new Database('candidatura'))->select($where, null, null, 'COUNT(*) as qtd')
            ->fetchObject()
            ->qtd;
    }
}
