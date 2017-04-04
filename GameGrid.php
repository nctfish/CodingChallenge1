<?php

class GameGrid
{
    public $A1;
    public $A2;
    public $A3;
    public $B1;
    public $B2;
    public $B3;
    public $C1;
    public $C2;
    public $C3;

    public function solve()
    {
        if ($this->A1 == $this->A2 && $this->A1 == $this->A3) { //
            return $this->A1;
        } elseif ($this->B1 == $this->B2 && $this->B1 == $this->B3) { //
            return $this->B1;
        } elseif ($this->C1 == $this->C2 && $this->C1 == $this->C3) { //
            return $this->C1;
        } elseif ($this->A1 == $this->B1 && $this->A1 == $this->C1) { //
            return $this->A1;
        } elseif ($this->A1 == $this->B2 && $this->A1 == $this->C3) { //
            return $this->A1;
        } elseif ($this->A2 == $this->B2 && $this->A2 == $this->C2) { //
            return $this->A2;
        } elseif ($this->A3 == $this->B3 && $this->A3 == $this->C3) { //
            return $this->A3;
        } elseif ($this->A3 == $this->B2 && $this->A3 == $this->C1) { //
            return $this->A3;
        } else {
            return 'draw';
        }
    }
}