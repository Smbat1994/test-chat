function getMessages() {
    let page = $("#page").val();

    $.ajax({
        url: "/message/index",
        type: "GET",
        data: {page: page},
        success: function (messages) {
            $(".msg_history").prepend(messages);
            $("#page").val(parseInt(page)+1);
        }
    })
}

$(".msg_history").scroll(function(){
    let scroll = $(this).scrollTop();
    if (scroll == 0) {
        getMessages();
    }
})


$(document).ready(function(){
    let msgHeight = $(".msg_history").height();
    $(".msg_history").animate({ scrollTop: msgHeight }, "slow");
    getMessages();
})