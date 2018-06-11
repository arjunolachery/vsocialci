$(document).ready(function(){
$("#notification_pop_up").hide();
//alert(document.location.origin);
var hostAddress=document.location.origin+'/vsocialci';
//alert(hostAddress);
var searchFirst=0;
$("#load_wait_image").hide();
$("#search_content").hide();
$("#circleChangeContent").hide();
$("#settings_content").hide();
$("#postsContent").hide();
$("#circleChangeContent").hide();
$("#search_content_show").hide();
$("#settings_content_show").hide();
$("#settings_content_actual_show").hide();

$("#settingsButtonOpen").click(function(){
  $.fn.openContent(2);
});

$("#messagesButtonOpen").click(function(){
  $.fn.openContent(6);
});

$("#notificationsButtonOpen").click(function(){
  $.fn.openContent(7);
});

$("#friendRequestsButtonOpen").click(function(){
  $.fn.openContent(8);
});

$("#back_arrow_image").click(function(){
  $.fn.openContent(10);
});

$("#searchBar").keyup(function(e){
  searchBarActive(e);
});

$("#searchBar").focusin(function(){
  searchBarActive(e);
});

$.fn.retrieveContent=function(a,b)
{
  $.post(a,b,
  function(response,status){ // Required Callback Function
  $("#mainContent").hide();
  $("#mainContent").html(response);
  $("#mainContent").fadeIn();
  });
};

$.fn.retrieve_content_search=function(a,b)
{
  $.post(a,b,
  function(response,status){ // Required Callback Function
  //$("#search_content_show").hide();
  $("#search_content_show").html(response);
  //$("#search_content_show").fadeIn();
  });
};

$.fn.retrieve_content_settings=function(a,b)
{
  $.post(a,b,
  function(response,status){ // Required Callback Function
  $("#settings_content_show").html(response);
  });
};

var select_search_result=0;
var e;
function searchBarActive(e)
{
//$.fn.searchBarActive=function(e)
//{
  e=window.event || e;
  if($("#search_bar_input").val()=="" && e.keyCode==8){
    $("#search_content_show").hide();
  }
  else {
    if(e.keyCode == 40)
    {
      //down
      //alert(document.cookie);
      var allcookies = document.cookie;
      cookiearray = allcookies.split(';');
      value = cookiearray[0].split('=')[1];
      //alert(value);
      select_search_result++;
      if(select_search_result>value-1)
      {
        select_search_result=value-1;
      }
    }
    if(e.keyCode == 38)
    {
      //alert('up');
      select_search_result--;
      //alert( $.cookie("search_results_amount") );
      if(select_search_result<0)
      {
        select_search_result=0;
      }
    }
  $.fn.openContent(1);
  }
};

$.fn.openContent=function(a){
  update_amount_friends();
  switch(a)
  {
    case 1:
    $.fn.retrieve_content_search(hostAddress+"/index.php/user/search_result",{search_data:$("#search_bar_input").val(),selector_search:select_search_result});
    $("#search_content_show").show();
    break;
    case 2:
    $.fn.retrieve_content_settings(hostAddress+"/index.php/user/settings",{data:'data'});
    $("#settings_content_show").show();
    break;
    case 3:
    $("#circleChangeContent").fadeIn();
    break;
    case 4:
    var email=$("#user_email").val();
    $.fn.retrieveContent(hostAddress+"/index.php/user/profile_specific",{'data':email});
    break;
    case 5:
    $.fn.retrieveContent(hostAddress+"/index.php/user/welcome_message",{data:'data'});
    break;
    case 6:
    $.fn.retrieveContent(hostAddress+"/index.php/user/messages",{data:'data'});
    $("#back_arrow_image").fadeIn();
    break;
    case 7:
    $.fn.retrieveContent(hostAddress+"/index.php/user/notifications",{data:'data'});
    $("#back_arrow_image").fadeIn();
    break;
    case 8:
    $.fn.retrieveContent(hostAddress+"/index.php/user/friend_requests",{data:'data'});
    $("#back_arrow_image").fadeIn();
    break;
    case 9:
    $.fn.retrieveContent(hostAddress+"/index.php/user/settings_actual",{data:'data'});
    $("#back_arrow_image").fadeIn();
    break;
    case 10:
    $.fn.retrieveContent(hostAddress+"/index.php/user/posts",{data:'data'});
    $("#back_arrow_image").hide();
    break;
    case 11:
    window.location = hostAddress+"/index.php/user/logout";
    break;
    default:
    break;
  }
};
var welcome_screen_value=$("#welcome_screen_value").val();
if(welcome_screen_value==1)
{
$.fn.openContent(5);
}
else {
$.fn.openContent(4);
}
//get location of settings to place
var left_postion_settings=$("#settingsButtonOpen").offset().left;
var right_position_settings=$(window).width()-left_postion_settings;
var size_button_settings=$("#settings_container").width();
//alert($(body).width());
$("#settings_content_show").css('right',right_position_settings-size_button_settings);

$("#search_bar_input").focus(function(){
  $("#search_bar_input").animate({"width":"100%"}, 100);
  //$("#search_bar_input").css('width','100%');
});
$("#search_bar_input").focusout(function(){
  $("#search_bar_input").animate({"width":"40%"}, 100);
  //$("#search_bar_input").css('width','100%');
});
var height_header=$(".main").height();
$("#top_header_spacing").height(height_header+15);

/*
$("#back_arrow_image").hide();
history.pushState({id: 'SOMEID'}, '', '');
$(window).bind('popstate', function(){
  window.location.href = window.location.href;
  });
  */

  function update_amount_friends(){
    $.post(hostAddress+"/index.php/friend/get_amount_friends",function(response){
    $("#friendRequestsAmount").html(response);
    if(response==0)
    {
      $(".friend_requests_amount_sup").hide();
    }
  });
  }


/*
myDropzone.on("addedfile", function(file) {
  caption = file.caption == undefined ? "" : file.caption;
  file._captionLabel = Dropzone.createElement("<p>Caption:</p>")
  file._captionBox = Dropzone.createElement("<textarea class='caption' id='"+file.filename+"' type='text' name='caption' class='dropzone_caption'>"+caption+"</textarea>")
  file.previewElement.appendChild(file._captionLabel);
  file.previewElement.appendChild(file._captionBox);
});
*/


});
