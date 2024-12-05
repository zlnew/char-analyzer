<?php

declare(strict_types=1);

namespace App\Models;

class CharMatch extends CharAnalysis
{
    public function compare()
    {
        $charOne = strtolower($this->char_one);
        $charTwo = strtolower($this->char_two);

        $uniqueCharsOne = array_unique(str_split($charOne));
        $uniqueCharTwo = implode('', array_unique(str_split($charTwo)));

        $totalCharsOne = strlen($charOne);

        $matches = 0;
        foreach ($uniqueCharsOne as $char) {
            if (strpos($uniqueCharTwo, $char) !== false) {
                $matches++;
            }
        }

        $this->percentage = $this->calculateCharMatch($matches, $totalCharsOne);
    }
}
