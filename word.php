<?php
require 'classes/Word.php';

$library = ['doctor', 'quixotic', 'grease', 'enchanted', 'thundering', 'plant', 'caring', 'mysterious',
    'embarrass', 'cause', 'chivalrous', 'brick', 'ordinary', 'daffy', 'dazzling', 'hate', 'oval', 'add', 'rural',
    'disillusioned', 'hellish', 'nondescript', 'wealth', 'realise', 'legs', 'rule', 'interfere', 'malicious',
    'thirsty', 'uttermost', 'plants', 'rapid', 'care', 'hurry', 'develop', 'tendency', 'puny', 'sturdy', 'unwieldy',
    'weary', 'elite', 'furry', 'lock', 'sparkling', 'lackadaisical', 'carriage', 'basketball', 'pocket', 'tongue',
    'curve', 'teeny-tiny', 'wonder', 'wrestle', 'turn', 'short', 'awesome', 'snotty', 'yummy', 'button', 'humorous',
    'shock', 'secret', 'statement', 'onerous', 'unaccountable', 'skinny', 'amazing', 'nappy', 'judicious', 'toad',
    'laughable', 'hard', 'regret', 'jog', 'suit', 'business', 'pies', 'wave', 'raspy', 'dog', 'buzz', 'need', 'man',
    'route', 'zippy', 'sour', 'flat', 'scarce', 'committee', 'abstracted', 'cure', 'money', 'innate', 'pets', 'machine',
    'cattle', 'comfortable', 'tidy', 'spark', 'wooden', 'trip'];

$my_word = new Word($library);
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