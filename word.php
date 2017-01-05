<?php
require 'classes/Word.php';

$my_word = new Word();
$response = [];

switch($_POST['request']) {
    case null:
        $response['data'] = 'empty';
        break;
    case 'getWord':
        $response['data']['word'] = $my_word->getWord();
        $response['data']['len'] = $my_word->getWordLength();
        break;
    case 'matchLetters':
        $response['data'] = $my_word->matchLetters($_POST['letter'], $_POST['word']);
        break;
}
$response = json_encode($response['data']);
echo $response;