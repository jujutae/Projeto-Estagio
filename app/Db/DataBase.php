<?php

namespace App\Db;

use App\Entity\Vaga;
use \PDO;
use \PDOException;

class DataBase
{


    /**
     * host de conexao do banco de dados 
     * @var string
     */
    const HOST = 'localhost';


    /**
     * nome do banco de dados
     * @var string 
     */
    const NAME = 'wdev_vagas';


    /**
     * usuario do banco 
     * @var string 
     */

    const USER = 'root';

    /**
     * senha do banco de dados 
     *@var string 
     */
    const PASS = '';


    /**
     * nome da tabela manipulada
     * *@var string 
     */
    private $table;

    /**
     * instancia de conexao do banco de dados
     *@var PDO
     */
    private $connection;


    public function __construct($table = null)
    {

        $this->table = $table;
        $this->SetConnection();

    }

    /**
     * metodo responsavel por criar uma conexao com o banco de dados 
     */

    private function SetConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }

    }

    /**
     * metodo responsavel por executar queries dentro do banco de dados 
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        try {
            echo "<pre>";
            print_r($query);
            echo "</pre>";
            // exit;

            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());

        }
    }


    /**
     * metodo responsavel por inserir dados no banco 
     * @param array $values [ field => value]
     * @return  interger
     */
    public function insert($values)
    {

        //dados da query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //monta a query
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        //executa o insert
        $this->execute($query, array_values($values));

        //retorna o id inserido 
        return $this->connection->lastInsertId();
    }


    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        //dados da query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        //monta a query
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . '' . $order . '' . $limit;


        //executa a query
        return $this->execute($query);

    }

    public function update($where, $values)
    {
        $fields = array_keys($values);
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
        $this->execute($query, array_values($values));
        return true;
    }

    public function delete($where)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $this->execute($query);
        return true;
    }
}