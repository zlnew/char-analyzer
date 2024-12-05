<?php

declare(strict_types=1);

namespace App\Models;

class CharMatch extends CharAnalysis
{
    public function analyze()
    {
        $inputOne = strtolower($this->input_one);
        $inputTwo = strtolower($this->input_two);

        $inputOneChars = array_unique(str_split($inputOne));
        $inputTwo = implode('', array_unique(str_split($inputTwo)));

        $totalInputOneChars = strlen($inputOne);

        $matches = 0;
        foreach ($inputOneChars as $char) {
            if (strpos($inputTwo, $char) !== false) {
                $matches++;
            }
        }

        $this->percentage = $this->calculateCharMatch($matches, $totalInputOneChars);
    }
}
