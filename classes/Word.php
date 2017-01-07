<?php

class Word {

    private $word;
    private $wordLength;

    public function __construct($library) {
        $this->word = $library[array_rand($library)];
        $this->wordLength = strlen($this->word);
    }

    public function getWord() {
        return $this->word;
    }

    public function getWordLength() {
        return $this->wordLength;
    }

    public function matchLetters($input, $word) {
        $this->word = $word;
        if ($input == null || strlen($input) > 1) {
            return 'invalid input';
        } else {
            $input = strtolower($input);
            $regex = '/' . $input . '/';
            if (preg_match($regex, $this->word)) {
                $lastPos = 0;
                $positions = [];
                while (($lastPos = strpos($this->word, $input, $lastPos))!== false) {
                    $positions[] = $lastPos;
                    $lastPos ++;
                }
                return $positions;
            } else {
                return 'no match';
            }
        }
    }
}