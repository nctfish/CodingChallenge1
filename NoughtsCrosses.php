<?php

class NoughtsCrosses
{

    public function calculate_winners($input)
    {
        $grid = new GameGrid;

        $grid->A1 = "X";
        $grid->A2 = "X";
        $grid->A3 = "X";
        $grid->B1 = "O";
        $grid->B2 = "X";
        $grid->B3 = "O";
        $grid->C1 = "O";
        $grid->C2 = "O";
        $grid->C3 = "O";

//        Note that this only works when there is only one winner on the grid.
//        Add functionality for handling draws and corrupt boards

        return $grid->solve();
    }


}