$(function() {
    
    var deathToll = 0
    var winTally = 10

    $.post('Word.php', {request: 'getWord'}, function (data) {

        var word = jQuery.parseJSON(data)
        var answer = word.word
        var i = 0
        var winTally = word.len

        while (i < word.len) {
            $('#word-output').prepend('<input type="text" disabled class="letter-output text">')
            i++
        }

        $('#submit').click(function() {

            var letter = $('.letter-input').val()

            $.post('Word.php', {request: 'matchLetters', letter: letter, word: answer }, function (data) {

                var response = jQuery.parseJSON(data)

                if (typeof response === 'string') {
                    $('#guess-output').append(letter + '  ')
                    deathToll ++
                    $('#hang-pic').html(deathToll)
                } else {
                    $.each(response, function (key, value) {
                        $('.letter-output').eq(value).attr("value", letter)
                        winTally --
                    })
                }

                $('.letter-input').val('')

                if (winTally == 0) {
                    $('.modal-header h4').html("You win! The word was '" + answer + "'!")
                    $('#endModal').modal()
                }

                if (deathToll == 12) {
                    $('.modal-header h4').html("You lose! The word was '" + answer + "'!")
                    $('#endModal').modal()
                }

                $('#modalClose').click(function() {
                    window.location.replace('http://monkeypants/playing/hangman/')
                })
            })
        })
    })
})

