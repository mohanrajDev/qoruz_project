$(document).ready(function(){
    var question = 1;
    $('[data-question]').hide();
    $('[type=submit]').hide();
    $('[data-question='+ question + ']').show();

    $('[type=radio]').change(function(){   

        if(question === 5) {
            $('[type=submit]').show();
        } else {
            $('[data-question='+ question + ']').hide();
            question ++;
            $('[data-question='+ question + ']').show();
        }
        
    });

    // Request URL
    var timer_url = $('#test_timer').data('url');
    var test_store_url = $('#quiz_form').attr('action');

    timer();

    // Live Timer
    var interval = setInterval(function() {
        timer();
    }, 1000);

    // Timeout and auto form submit
    function timeout() {
        clearInterval(interval);
        $.post(test_store_url, $('#quiz_form').serialize());
    }

    // Check Timer
   function timer() {
        $.getJSON(timer_url, function( data ) {
            $('#test_timer').text(data.time);
            
            if (data.timeout) {
                timeout();
                window.location = '/';
            }
        });
    }

});