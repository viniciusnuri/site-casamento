<?php

class DB extends PDO
{
    private $hostname = 'kahenuri.com.br';
    private $username = 'vinicius_db_user';
    private $password = 'd9wtg3oueym4';
    private $dbname = 'vinicius_db_casamento';
    private $connection;

    #make a connection
    public function __construct()
    {
        try 
        { 
            $this->connection = new PDO("mysql:host={$this->hostname};dbname={$this->dbname}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }
        catch (PDOException $e) 
        {
            die($e->getMessage());
        }
    }

    #get the number of rows in a result
    public function num_rows($query)
    {
        # create a prepared statement
        $stmt = $this->connection->prepare($query);

        if($stmt) 
        {
            # execute query 
            $stmt->execute();

            return $stmt->rowCount();
        } 
        else
        {
            return self::get_error();
        }
    }
    public function getAll($query)
    {
        # create a prepared statement
        $stmt = $this->connection->prepare($query);

        if($stmt) 
        {
            # execute query 
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        else
        {
            return self::get_error();
        }
    }

    public function insert($query, $params = [])
    {
        # create a prepared statement
        $stmt = $this->connection->prepare($query);

        if($stmt) 
        {
            # execute query 
            return $stmt->execute($params);
        } 
        else
        {
            return self::get_error();
        }
    }

    #display error
    public function get_error() 
    {
        $this->connection->errorInfo();
    }

    # closes the database connection when object is destroyed.
    public function __destruct()
    {
        $this->connection = null;
    }
}