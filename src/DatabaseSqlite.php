<?php
namespace Mattsmithdev;

class DatabaseSqlite
{
    const PATH_TO_SQLITE_FILE = __DIR__ . '/../db/leaderboard.db';

    private $connection;

    public function getConnection()
    {
        return $this->connection;
    }

    public function __construct()
    {
        $dsn = 'sqlite:' . self::PATH_TO_SQLITE_FILE;
        try {
            $this->connection = new \PDO(
                $dsn
            );
        } catch (\Exception $e){
            print '<pre>';
            var_dump($e);
        }
    }

}
