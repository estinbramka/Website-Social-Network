function Resize_chat() {
    var Win_width = $(window).width();
    if (Win_width < 975)
    {
        $("#chat_box").hide();
    }
    else
    {
        $("#chat_box").show();
    }

    if (Win_width < 1230)
    {
        $("#chat_box").css("width", "258.3px");
    }
    else
    {
        $("#chat_box").css("width", "");
    }

    var chat_left = $("#chat_box").css("left");
    $("#main_layer").css("width", chat_left);
}

function Fetch_user() {
    $.ajax({
        url:"Includes/fetch_user.inc.php",
        method:"POST",
        success:function(data){
            $('#user_details').html(data);
        }
    })
}

function Update_last_activity() {
    $.ajax({
        url:"Includes/update_last_activity.inc.php",
        success:function()
        {

        }
    })
}

function Make_chat_dialog_box(to_user_id, to_user_firstname, to_user_lastname, gap)
{
    var content =   '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_firstname+' '+to_user_lastname+'" style="' + gap + '">';
    content +=          '<h6>You have chat with '+to_user_firstname+' '+to_user_lastname+'</h6>';
    content +=          '<span id="'+to_user_id+'" class="close_chat">Close</span>'
    content +=          '<div class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
    content +=          Fetch_user_chat_history(to_user_id);
    content +=          '</div>';
    content +=          '<div class="form-group">';
    content +=              '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
    content +=          '</div>';
    content +=          '<div class="form-group" align="right">';
    content +=              '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button>';
    content +=          '</div>';
    content +=      '</div>';
    return content;
}

function Start_chat()
{
    var to_user_id = $(this).data('touserid');
    var to_user_firstname = $(this).data('touserfirstname');
    var to_user_lastname = $(this).data('touserlastname');
    //alert("start chat: " + to_user_id +" "+ to_user_firstname +" "+ to_user_lastname);
    var total_element = $(".user_dialog").length;
    //alert(total_element);
    gap = 'right: calc(21% - 10px + '+total_element*360+'px);'
    message_box = Make_chat_dialog_box(to_user_id, to_user_firstname, to_user_lastname, gap);
    $("#user_message_box_details").append(message_box);
}

function Close_chat()
{
    var to_user_id = $(this).attr('id');
    //alert(to_user_id);
    $("#user_dialog_"+to_user_id).remove();
}

function Send_chat()
{
    var to_user_id = $(this).attr('id');
    var chat_message = $('#chat_message_'+to_user_id).val();
    //alert(to_user_id+": "+chat_message);
    $.ajax({
        url:"Includes/insert_chat.inc.php",
        method:"POST",
        data:{to_user_id:to_user_id, chat_message:chat_message},
        success:function(data)
        {
            $('#chat_message_'+to_user_id).val('');
            $('#chat_history_'+to_user_id).html(data);
        }
    })
}

function Fetch_user_chat_history(to_user_id)
{
    $.ajax({
        url:"Includes/fetch_user_chat_history.inc.php",
        method:"POST",
        data:{to_user_id:to_user_id},
        success:function(data){
            $('#chat_history_'+to_user_id).html(data);
        }
    })
}

function Update_chat_history_data()
{
    $('.chat_history').each(function(){
        var to_user_id = $(this).data('touserid');
        Fetch_user_chat_history(to_user_id);
    });
}

$(document).ready(function() {
    var chat_top = $("#navbarOffset").outerHeight(true);
    $("#chat_box").css("top", chat_top);
    Resize_chat();
    Fetch_user();
    setInterval(function(){
        Update_last_activity();
        Fetch_user();
        Update_chat_history_data();
    }, 5000);
    $(document).on('click', '.start_chat', Start_chat);
    $(document).on('click', '.close_chat', Close_chat);
    $(document).on('click', '.send_chat', Send_chat);
    //alert(chat_left);
});

$( window ).resize(Resize_chat);