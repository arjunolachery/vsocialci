$(document).ready(function(){
//alert(document.location.origin);
var hostAddress=document.location.origin+'/vsocialci';
//alert(hostAddress);
var searchFirst=0;
$("#search_content").hide();
$("#circleChangeContent").hide();
$("#settings_content").hide();
$("#postsContent").hide();
$("#circleChangeContent").hide();
$("#search_content_show").hide();


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

$("#searchBar").keyup(function(e){
  $.fn.searchBarActive(e);
});

$("#searchBar").focusin(function(){
  $.fn.searchBarActive();
});

$.fn.retrieveContent=function(a,b)
{
  $.post(a,b,
  function(response,status){ // Required Callback Function
  $("#mainContent").html(response);
  });
};

$.fn.retrieve_content_search=function(a,b)
{
  $.post(a,b,
  function(response,status){ // Required Callback Function
  $("#search_content_show").html(response);
  });
};

var select_search_result=0;
$.fn.searchBarActive=function(e)
{
  if($("#searchBar").val()=="" && e.keyCode==8){
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
  switch(a)
  {
    case 1:
    $.fn.retrieve_content_search(hostAddress+"/index.php/user/search_result",{search_data:$("#searchBar").val(),selector_search:select_search_result});
    $("#search_content_show").fadeIn();
    break;
    case 2:
    $.fn.retrieveContent(hostAddress+"/index.php/user/settings",{data:'data'});
    break;
    case 3:
    $("#circleChangeContent").fadeIn();
    break;
    case 4:
    var email=$("#user_email").html();
    $.fn.retrieveContent(hostAddress+"/index.php/user/profile_specific",{data:email});
    break;
    case 6:
    $.fn.retrieveContent(hostAddress+"/index.php/user/messages",{data:'data'});
    break;
    case 7:
    $.fn.retrieveContent(hostAddress+"/index.php/user/notifications",{data:'data'});
    break;
    case 8:
    $.fn.retrieveContent(hostAddress+"/index.php/user/friend_requests",{data:'data'});
    break;
    default:
    break;
  }
};
$.fn.openContent(4);

});
