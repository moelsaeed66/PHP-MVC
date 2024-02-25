<?php

namespace core\database;

use PDOException;

class QueryBuilder
{
    public $pdo;
    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }
    public function insert($table , $paramerts)
    {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",  $table ,
            implode(',' , array_keys($paramerts)) ,
            ':'.implode(',:' , array_keys($paramerts))
        );
        try
        {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($paramerts);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function selectAll($table)
    {
        $sql=sprintf('select * from %s',$table);
        try {
            $statement=$this->pdo->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
    public function select($table,$id)
    {
        $sql=sprintf("select * from %s where  id=:id",$table,$id);
        try {
            $statement=$this->pdo->prepare($sql);
            $statement->execute(['id'=>$id]);
            return $statement->fetch(\PDO::FETCH_OBJ);
        }catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
    public function update($table,$set,$where,$params)
    {
        $sql=sprintf('update %s set %s where %s',$table,$set,$where);
        try {
            $statement=$this->pdo->prepare($sql);
            $statement->execute($params);
            return $statement->fetch(\PDO::FETCH_OBJ);
        }catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
    public function delete($table,$id)
    {
        $sql=sprintf("delete from %s where id= :id",
            $table,
            $id
        );
        try {
            $statement=$this->pdo->prepare($sql);
            $statement->execute(['id'=>$id]);

        }catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }


}