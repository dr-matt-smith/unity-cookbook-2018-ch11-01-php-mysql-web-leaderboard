<?php
namespace Mattsmithdev;

class Database
{
	private $dbLocation = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data/leadboard.sqlite3';
	private $dbDriver = 'sqlite';
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO($this->dbDriver . ':' . $this->dbLocation);
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function createTableProducts()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS products (
                            id INTEGER PRIMARY KEY,
                            description TEXT,
                            quantity INTEGER)';

        $this->pdo->exec($sql);
    }

    public function createTablePlayer()
    {

    $sql = '
                CREATE TABLE player (
                  id INTEGER PRIMARY KEY,
                  username varchar(25) NOT NULL,
                  score INTEGER NOT NULL
                  )
            ';

        $this->pdo->exec($sql);

    }


    public function insertProduct($description, $quantity)
    {
        //Prepare INSERT statement to SQLite3 file db
        $sql = 'INSERT INTO products (description, quantity)
                  VALUES (:description, :quantity)';
        $stmt = $this->pdo->prepare($sql);

        //Bind parameters to statement variables
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':quantity',$quantity);

        //Execute statement
        $stmt->execute();
    }


    public function insertPlayer($username, $score)
    {
        //Prepare INSERT statement to SQLite3 file db
        $sql = 'INSERT INTO player (username, score)
                  VALUES (:username, :score)';
        $stmt = $this->pdo->prepare($sql);

        //Bind parameters to statement variables
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':score',$score);

        //Execute statement
        $stmt->execute();
    }



    public function getAllProducts()
    {
        $sql = 'SELECT * FROM products';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $products = $stmt->fetchAll(\PDO::FETCH_CLASS, 'Mattsmithdev\\Product');
        return $products;
    }

    public function getAllPlayers()
    {
        $sql = 'SELECT * FROM player';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $products = $stmt->fetchAll(\PDO::FETCH_CLASS, 'Mattsmithdev\\Player');
        return $products;
    }

    public function dropTableProducts()
    {
        //Drop table messages from file db
        $this->pdo->exec('DROP TABLE products');
    }

    public function dropTablePlayer()
    {
        //Drop table messages from file db
        $this->pdo->exec('DROP TABLE player');
    }
}
