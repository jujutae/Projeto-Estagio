<?php

namespace App\Entity;

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

    
}

