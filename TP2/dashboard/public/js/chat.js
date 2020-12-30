$('#textMessage').keypress(function (e) {
    var key = e.which;
    if (key == 13)  // the enter key code
    {
        sendMessage()
    }
});

function sendMessage() {
    var dt = new Date();
    var time = ('0'  + dt.getHours()).slice(-2) + ":" + ('0'  + dt.getMinutes()).slice(-2) + ":" + ('0' + dt.getSeconds()).slice(-2);
    var userFrom = $('#nameTo').data('from');
    var userTo = $('#nameTo').data('to');
    var image =$('#nameTo').data('image');
    var message=$('#textMessage').val()
    if(sendMessageDb(message, userFrom, userTo)){
        var messageString = "" +
            "<div class=\"chat-message-right pb-4\">\n" +
            "     <div>\n" +
            "          <img src=\"public/img/"+image+"\" class=\"rounded-circle mr-1\" alt=\"Chris Wood\" width=\"40\" height=\"40\" onerror=\"javascript:this.src='public/img/avatar.png'\">\n" +
            "           <div class=\"text-muted small text-nowrap mt-2\">"+time+"</div>\n" +
            "     </div>\n" +
            "     <div class=\"flex-shrink-1 bg-light rounded py-2 px-3 mr-3\">\n" +
            "         <div class=\"font-weight-bold mb-1\">You</div>\n" +
            "            "+message+"\n" +
            "     </div>\n" +
            " </div>"
        $('.chat-messages').append(messageString)
        $('#textMessage').val(null);
    }


}