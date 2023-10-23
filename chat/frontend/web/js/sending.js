$(document).ready(function () {
    $(document).on("click", ".not-correct-send", function () {
        let id = $(this).data('id');
        $.ajax({
            url: '/message/update',
            type: 'POST',
            data: {id: id},
            success: function () {
                location.reload()
            }
        })
    });

    function sendMessage(){
        let message = $('.message').val().trim();
        if (message == '' || message == " ") {
            alertMessage('You cannot send an empty message', 'error');
        } else {
             $.ajax({
                url: '/message/create',
                type: 'POST',
                data: {message: message},
                success: function () {
                    location.reload()
                }
            })
        }
    }
    $('.send').click(function(){
        sendMessage();
    })
    $('.message').keydown(function(event){
        if (event.keyCode == 13) {
            sendMessage();
        }
    })


    function alertMessage(message, type) {
        let className = 'alert-info';

        if (type == 'error') {
            className = 'alert-danger';
        } else if (type == 'success') {
            className = 'alert-success';
        }

        $('.alert-js').css('display', 'block');
        $('.alert-js').find('.alert').addClass(className);

        $('.alert-js-message').text(message);
        
        setTimeout(function() {
            $('.alert-js').css('display', 'none');
            $('.alert-js-message').text('');
        },5000)
    }
});