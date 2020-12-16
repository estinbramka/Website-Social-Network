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

function Start_chat()
{
    var to_user_id = $(this).data('touserid');
    var to_user_firstname = $(this).data('touserfirstname');
    var to_user_lastname = $(this).data('touserlastname');
    alert("start chat: " + to_user_id +" "+ to_user_firstname +" "+ to_user_lastname);
}

$(document).ready(function() {
    var chat_top = $("#navbarOffset").outerHeight(true);
    $("#chat_box").css("top", chat_top);
    Resize_chat();
    Fetch_user();
    setInterval(function(){
        Update_last_activity();
        Fetch_user();
    }, 5000);
    $(document).on('click', '.start_chat', Start_chat);
    //alert(chat_left);
});

$( window ).resize(Resize_chat);