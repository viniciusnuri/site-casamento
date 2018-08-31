<?php

class DB extends PDO
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'site-casamento';

    #make a connection
    public function __construct()
    {
        parent::__construct($hostname,$dbname,$username,$password);

        try 
        { 
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
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
        $stmt = parent::prepare($query);

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