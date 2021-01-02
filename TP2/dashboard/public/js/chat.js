$('#textMessage').keypress(function (e) {
    var key = e.which;
    if (key == 13)  // the enter key code
    {
        sendMessage()
    }
});

var selectedUserTo="";

function sendMessage() {
    var userFrom = $('#nameTo').data('from');
    var message=$('#textMessage').val()
    sendMessageDb(message.replace(/<[^>]*>/g, ""), userFrom, selectedUserTo)
    $('#textMessage').val(null);
}

/*Auxiliar function of selectChat(), update the name, image of the top bar and clean the chat*/
function changeChatConversation(image, username, name){
    $('.flex-grow-1 strong')[0].innerHTML = name;
    $('#topImageUser').attr('src', image)
    $('.chatMessage').remove()
}

/*When the user select another user that what to talk*/
function selectChat(e){
    $(".list-group-item-action").removeClass("bg-light-custom")
    $(e).addClass("bg-light-custom")
    var image = $(e).find("img").attr('src')
    var userTo = $(e).data('username')
    var name = $(e).find('.flex-grow-1')[0].innerText
    var userSession = $('#nameTo').data('from');

    selectedUserTo=userTo;//select the user that want to send a message
    $(e).find(".unseenMessages").remove()//remove the unseen message
    changeChatConversation(image, userTo, name)
    getMessagesDb(userSession, userTo)//ajax function
    initializeAutoUpdate(userSession, userTo)
    setMessagesToAlreadyRead(userSession, userTo)// ajax function
    getUnseenMessagesDb(userSession)
}
function getImage(user){
    if(user['image']){
        return "users/"+user['image'];
    }else{
        if(user['gender']==='f'){
            return "avatarGirl.png";
        }else{
            return "avatar.png";
        }
    }
}
/*Function that is called by ajax function -> getMessagesDb()*/
function updateConversation(jsonResponse, userSession){
    var userFromInfo = jsonResponse[0];
    var messages = jsonResponse[1];
    var userToInfo = jsonResponse[2];
    for(i=0; i<messages.length; i++){
        var person = (messages[i]['userfrom'] === userSession) ? "You" : userToInfo['name'];
        var leftRight = (messages[i]['userfrom'] === userSession) ? "chat-message-right" : "chat-message-left";
        var image =  (messages[i]['userfrom'] === userSession) ? userFromInfo : userToInfo;

        var messageString = "" +
            "<div class=\"chatMessage "+leftRight+" pb-4\" id='"+messages[i]['id']+"' >\n" +
            "     <div>\n" +
            "          <img src=\"public/img/"+getImage(image)+"\" class=\"rounded-circle mr-1\" alt=\"Chris Wood\" width=\"40\" height=\"40\" onerror=\"javascript:this.src='public/img/avatar.png'\">\n" +
            "     </div>" +
            "     <div>"+
            "         <div class=\"flex-shrink-1 bg-light rounded py-2 px-3 mr-3\">\n" +
            "             <div class=\"font-weight-bold mb-1\">"+person+"</div>\n" +
            "            "+messages[i]['message']+"\n" +
            "         </div>\n" +
            "           <div class=\"text-muted small text-nowrap mt-2\">"+messages[i]['messagedate']+"</div>\n" +
            "     </div>\n" +
            " </div>"
        $('.chat-messages').append(messageString)
    }
    scrollDown()
}

var myTime;
var myTime2;
function initializeAutoUpdate(userSession, userTo){
    clearInterval(myTime);//reset all the timers defined
    clearInterval(myTime2);//reset all the timers defined
    myTime = setInterval(function(){
        var messagesLength = $('.chatMessage').length;
        var idOfLastMessage = 0
        if(messagesLength>0){
            idOfLastMessage = $('.chatMessage')[messagesLength-1].id;
        }
        getNewMessagesDb(userSession, userTo, idOfLastMessage);
    }, 1000);
    myTime2 = setInterval(function(){
        getUnseenMessagesDb(userSession)//ajax function
    }, 2000);

}

/*Get Json messages object and set the variable "needToUpdate" */
function needToUpdateChange(value,userSession){
    if(!(value === undefined)  && value[1].length>0){
        updateConversation(value,userSession)
    }
}

function scrollDown(){
    /*scrolls down*/
    $('.chat-messages').animate({
        scrollTop: $('.chat-messages').get(0).scrollHeight
    }, 10);
}

function searchJson(user, jsonResponse){
    for(var i=0; i<jsonResponse.length; i++){
        if(jsonResponse[i]['userfrom'].localeCompare(user) == 0){
            return jsonResponse[i]['count'];
        }
    }
    return 0;
}

function unSeenMessagesWatch(jsonResponse){
    var users = $('.content');
    var max = users.length
    for(var i=0; i<max; i++){
       var count = searchJson(users[i].id,jsonResponse)
        if(count > 0){
            if(selectedUserTo.localeCompare(users[i].id)!=0){
                $("#"+users[i].id).find('.unseenMessages')[0].innerText=count
                $("#"+users[i].id).find('.unseenMessages').show()
            }
       }else{
           $("#"+users[i].id).find('.unseenMessages').hide()
       }
    }
}

