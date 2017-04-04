<?php

class NoughtsCrosses
{
    private $Xwins = 0;
    private $Owins = 0;
    private $draw = 0;

    private $database;

    /**
     * NoughtsCrosses constructor.
     */
    public function __construct()
    {
        $this->database = new Database;
    }

    public function calculate_winners($input)
    {
        $stringData = '';

        while ($line = fgets($input)) {

            $stringData .= $line;
        }

        preg_match_all('/(...\n...\n...)/', $stringData, $matchedGames);

        foreach ($matchedGames[0] as $matchedGame) {
            preg_match_all('/(.)/', $matchedGame, $gameMove);

            $grid = new GameGrid();

            $grid->A1 = $gameMove[0][0];
            $grid->A2 = $gameMove[0][1];
            $grid->A3 = $gameMove[0][2];
            $grid->B1 = $gameMove[0][3];
            $grid->B2 = $gameMove[0][4];
            $grid->B3 = $gameMove[0][5];
            $grid->C1 = $gameMove[0][6];
            $grid->C2 = $gameMove[0][7];
            $grid->C3 = $gameMove[0][8];

            $this->database->storeGame($grid, $grid->solve());

            switch ($grid->solve()) {

                case "X":
                    $this->Xwins++;
                    break;

                case "O":
                    $this->Owins++;
                    break;

                case "draw":
                    $this->draw++;
                    break;
            }
        }
    }

    public function get_results()
    {
        return "X wins: " . $this->Xwins . PHP_EOL . "O wins: " . $this->Owins . PHP_EOL . "Draw: " . $this->draw . PHP_EOL;
    }

    public function get_aggregate_results()
    {
        $results = $this->database->getResultsStats();
        $resultString = '';

        foreach ($results as $result) {
            $resultString .= $result['winner'] . " wins: " . $result['count'] . PHP_EOL;
        }

        return $resultString;
    }
}