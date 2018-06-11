
//alert('hi');

$("#search_bar_input").focus(function() {
  $("#search_bar_input").animate({
    "width": "100%"
  }, 100);
  //$("#search_bar_input").css('width','100%');
});
$("#search_bar_input").focusout(function() {
  $("#search_bar_input").animate({
    "width": "40%"
  }, 100);
  //$("#search_bar_input").css('width','100%');
});
var height_header = $(".main").height();
$("#top_header_spacing").height(height_header + 15);

/*
$("#back_arrow_image").hide();
history.pushState({id: 'SOMEID'}, '', '');
$(window).bind('popstate', function(){
  window.location.href = window.location.href;
  });
  */




/*
myDropzone.on("addedfile", function(file) {
  caption = file.caption == undefined ? "" : file.caption;
  file._captionLabel = Dropzone.createElement("<p>Caption:</p>")
  file._captionBox = Dropzone.createElement("<textarea class='caption' id='"+file.filename+"' type='text' name='caption' class='dropzone_caption'>"+caption+"</textarea>")
  file.previewElement.appendChild(file._captionLabel);
  file.previewElement.appendChild(file._captionBox);
});
*/
//$('.image_caption_input').keypress(function(event){if(event.keyCode == 13){event.preventDefault();}});

function submit_profile_pic() {
  //var data;
  var current_data = {};
  var value_submit = $("#caption_submit_result").html();
  value_submit = value_submit.length ;
  //alert(value_submit);
  var i = 1;
  for (i = 1; i <= value_submit; i++) {
    current_data[i - 1] = $("#pic" + i).val();
  }
  $.post("http://localhost/vsocialci/index.php/user_functions/caption_profile_update", {
    'data_caption': current_data
  }, function(response) {
    //alert(value_submit);
    //alert("Uploaded1");
    $("#notification_pop_up").fadeOut();
    change_opacity(1);
    $.fn.retrieveContent(hostAddress+"/index.php/user/settings_actual",{data:'data'});
    $("#back_arrow_image").fadeIn();
    $("#notification_side_message").html('You changed your profile picture');
    show_notification_side();

  });
  //alert(current_data[0]+current_data[1]);
}
function submit_timeline_pic() {
  //var data;
  var current_data = {};
  var value_submit = $("#caption_submit_result_2").html();
  value_submit = value_submit.length ;
  //alert(value_submit);
  var i = 1;
  for (i = 1; i <= value_submit; i++) {
    current_data[i - 1] = $("#pic" + i).val();
  }
  $.post("http://localhost/vsocialci/index.php/user_functions/caption_image_update", {
    'data_caption': current_data
  }, function(response) {
    //alert(value_submit);
    $.fn.retrieveContent(hostAddress+"/index.php/user/posts",{data:'data'});
    $("#back_arrow_image").hide();
    $("#notification_side_message").html('You added a new picture to your timeline');
    show_notification_side();
  });
  //alert(current_data[0]+current_data[1]);
}

function go_to_bottom_message()
{
  $('#messages_show').animate({ scrollTop: '300000' }, 500);
}

var height_notification_pop_up = $(window).height();
$("#notification_pop_up").css("height", height_notification_pop_up - 200);
