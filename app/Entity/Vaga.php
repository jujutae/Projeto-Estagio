<?php

namespace App\Entity;

use \App\Db\DataBase;
use \PDO;

class Vaga{

    /**
     * Identificador unico da vaga
     * @var integer
     */
    public $id;
    

    /**
     * Tituloda da vaga
     * @var string
     */

     public $titulo;

     /**
      * descrição da vaga/string
      */
      public $descricao;

      /**
       * define se a vaga é ativa
       * @var string (s\n)
       */

      public $ativo;


      /**
       * data fa publicação da vaga 
       * @var string
       */

    public $data;


    /**
     * meotodo responsavel por cadastrar uma nova vaga no banco 
     */
   public function cadastrar(){
        //DEFINIR DATA 
        $this->data= date('Y-m-d H:i:s');

        //INSERIR A VAGA NO BANCO
        $obDatabase = new DataBase('vagas');
        $this->id = $obDatabase->insert([
                                            'titulo'    => $this->titulo,
                                            'descricao' => $this->descricao,
                                            'ativo'     => $this->ativo,
                                            'data'      => $this->data
                                        ]);
        //RETORNAR SUCESSO 
        return true;

    }

    public function atualizar(){
        return (new DataBase('vagas'))->update('id = '. $this->id,[
                                                                    'titulo'    => $this->titulo,
                                                                    'descricao' => $this->descricao,
                                                                    'ativo'     => $this->ativo,
                                                                    'data'      => $this->data
                                                                    ]);
    }


    public function excluir(){
    return (new DataBase('vagas'))->delete('id = '. $this->id);   
    }
/**
 * metodo responsavel por obter as vagas do banco de dados 
 * @param string $where
 * @param string $order
 * @param string $limit
 * @return array
 */


public static function getVagas($where= null, $order = null, $limit = null){
    return (new DataBase('vagas'))->select($where, $order, $limit)
                                  ->fetchAll(PDO::FETCH_CLASS, self::class);


    }

    public static function getVaga($id){
        return (new DataBase('vagas'))->select('id = '.$id)
                                      -> fetchObject(self::class);

    }

}

