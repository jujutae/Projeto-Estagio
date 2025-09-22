<?php

namespace App\Entity;

use \App\Db\DataBase;
use \PDO;

class Inscricao
{
    public $id;
    public $aluno;
    public $vaga;
    public $data_inscricao;
    public $status;

    // Cadastrar uma inscricao
    public function cadastrar()
    {
        $this->data_inscricao = date('Y-m-d H:i:s');
        $dataBase = new DataBase('inscricao');

        $this->id = $dataBase->insert([
            'id_aluno' => $this->aluno,
            'id_vaga'  => $this->vaga,
            'status' => $this->status,
            'data_inscricao'  => $this->data_inscricao

        ]);

        return true;
    }

    public function atualizar()
    {
        return (new DataBase('inscricao'))->update('id = ' . $this->id, [
             'id_aluno' => $this->aluno->id,
            'id_vaga'  => $this->vaga->id,
            'status' => $this->status,
            'data_inscricao'  => $this->data_inscricao

        ]);
    }


    public function excluir()
    {
        return (new DataBase('canditatura'))->delete('id = ' . $this->id);
    }

    // Buscar inscricaos de um aluno
    public static function getInscricao($id)
    {

        $inscricao = (new DataBase('inscricaos')) ->select('id = ' . $id)->fetchObject(self::class);
            if($inscricao){
                $inscricao->aluno = Aluno::getAluno($inscricao->id_aluno);
                $inscricao->vaga= Vaga::getVaga($inscricao->id_vaga);
            }
        
            return $inscricao;
    }
    public static function getInscricaos($where= null, $order=null, $limit=null){
        $inscricoes = (new DataBase('inscricao'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
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
    public static function getQuantidadeInscricaos($where = null)
    {
        return (new DataBase('inscricao'))->select($where, null, null, 'COUNT(*) as qtd')
            ->fetchObject()
            ->qtd;
    }
 
    public static function getInscricaoPorAluno($aluno){
                $inscricao = (new DataBase('inscricao')) ->select('id_aluno  = ' . $aluno)->fetchObject(self::class);
            if($inscricao){
                $inscricao->aluno = Aluno::getAluno($inscricao->id_aluno);
                $inscricao->vaga= Vaga::getVaga($inscricao->id_vaga);
            }
        
            return $inscricao;
    }
}
