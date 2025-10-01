<?php

namespace App\Files;

class Upload{


    private $name;

    private $extension;

    private $type;

    private $tmpName;

    private $error;

    private $size;

    private $duplicates = 0;

    public function __construct($file)
    {

        $this->type = $file['type'];
        $this->tmpName = $file['tmp_name'];
        $this->error = $file['error'];
        $this->size = $file['size'];

        $info = pathinfo($file['name']);
        $this->name      = $info['filename'];
        $this->extension = $info['extension'];
    }
    //metodo responsavel por retornar o nome do arquivo com sua extenção
    public function getBasename(){
        $extension = strlen($this->extension) ? '.'.$this->extension : '';

        //valida duplicação
        $duplicates = $this->duplicates > 0 ? '-'.$this->duplicates : '';

        return $this->name.$duplicates.$extension;
    }

    private function getPossibleBasename($dir, $overwrite){

        //SOBRESCREVER ARQUIVO 
        if($overwrite) return $this->getBasename();
        //NÃO PODE SOBRESCREVER ARQUIVO 

        $basename = $this->getBasename();
        if(file_exists($dir.'/'.$basename)){
            return $basename;
        }
        //incrementar duplicações
        $this->duplicates++;

        return $this->getPossibleBasename($dir,$overwrite=true);
    }

    public function upload($dir, $nome) {
        //VERIFICAR ERRO
        if ($this->error !=0) return false; 
        if($nome != null){
            $extension = strlen($this->extension) ? '.' .$this->extension : '';
            $path = $dir.'/'.$nome.$extension;
        }else{
            $path = $dir.'/'.$this->getBasename();
        }

        //MOVE PARA A PASTA DE DESTINO 
        return move_uploaded_file($this->tmpName,$path);
    }
   
    }
