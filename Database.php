<?php

class Database
{
    private $pdo;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=codingchallenge1", 'root', '');
    }

    public function storeGame(GameGrid $gameGrid, $winner)
    {
        $params = [
            serialize($gameGrid),
            $winner
        ];
        $statement = $this->pdo->prepare("INSERT INTO Games (game, winner, created_at) VALUES (?, ?, NOW())");
        $statement->execute($params);
    }

    public function getResultsStats()
    {
        $statement = $this->pdo->prepare("SELECT winner, count(*) as `count` FROM Games GROUP BY winner");
        $statement->execute();

        return $statement->fetchAll();
    }
}
