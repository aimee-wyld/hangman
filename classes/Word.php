<?php

class Word {
    private $library = ['doctor', 'quixotic', 'grease', 'enchanted', 'thundering', 'plant', 'caring', 'mysterious',
        'embarrass', 'cause', 'chivalrous', 'brick', 'ordinary', 'daffy', 'dazzling', 'hate', 'oval', 'add', 'rural',
        'disillusioned', 'hellish', 'nondescript', 'wealth', 'realise', 'legs', 'rule', 'interfere', 'malicious',
        'thirsty', 'uttermost', 'plants', 'rapid', 'care', 'hurry', 'develop', 'tendency', 'puny', 'sturdy', 'unwieldy',
        'weary', 'elite', 'furry', 'lock', 'sparkling', 'lackadaisical', 'carriage', 'basketball', 'pocket', 'tongue',
        'curve', 'teeny-tiny', 'wonder', 'wrestle', 'turn', 'short', 'awesome', 'snotty', 'yummy', 'button', 'humorous',
        'shock', 'secret', 'statement', 'onerous', 'unaccountable', 'skinny', 'amazing', 'nappy', 'judicious', 'toad',
        'laughable', 'hard', 'regret', 'jog', 'suit', 'business', 'pies', 'wave', 'raspy', 'dog', 'buzz', 'need', 'man',
        'route', 'zippy', 'sour', 'flat', 'scarce', 'committee', 'abstracted', 'cure', 'money', 'innate', 'pets', 'machine',
        'cattle', 'comfortable', 'tidy', 'spark', 'wooden', 'trip'];
    private $word;
    private $wordLength;

    public function __construct() {
        $this->word = $this->library[array_rand($this->library)];
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