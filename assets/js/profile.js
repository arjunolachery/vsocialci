$(document).ready(function(){
//alert(document.location.origin);
var hostAddress=document.location.origin+'/vsocialci';
//alert(hostAddress);
var searchFirst=0;
$("#searchContent").hide();
$("#circleChangeContent").hide();
$("#settingsContent").hide();
$("#postsContent").hide();
$("#circleChangeContent").hide();


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

$.fn.searchBarActive=function(e)
{
  if($("#searchBar").val()=="" && e.keyCode==8){
    $.fn.openContent(4);
  }
  else {
  $.fn.openContent(1);
  }
};

$.fn.openContent=function(a){
  switch(a)
  {
    case 1:
    $.fn.retrieveContent(hostAddress+"/index.php/user/searchresult",{searchInputData:$("#searchBar").val()});
    break;
    case 2:
    $.fn.retrieveContent(hostAddress+"/index.php/user/settings",{data:'data'});
    break;
    case 3:
    $("#circleChangeContent").fadeIn();
    break;
    case 4:
    $.fn.retrieveContent(hostAddress+"/index.php/user/posts",{data:'data'});
    break;
    case 5:
    $.fn.retrieveContent(hostAddress+"/index.php/user/welcomeMessage",{data:'data'});
    break;
    case 6:
    $.fn.retrieveContent(hostAddress+"/index.php/user/messages",{data:'data'});
    break;
    case 7:
    $.fn.retrieveContent(hostAddress+"/index.php/user/notifications",{data:'data'});
    break;
    case 8:
    $.fn.retrieveContent(hostAddress+"/index.php/user/friendRequests",{data:'data'});
    break;
    default:
    break;
  }
};
$.fn.openContent(5);
});
