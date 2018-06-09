<?php
// the content for private messages
?>
<div class="row" id="settings_content">
  <div class="col-lg-3" id="messages_left_side">
    <div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-6">
    <?php

  echo "<h3>Your Friends</h3>";
  if ($friends_list==0) {
      echo "Add friends to get started.";
  } else {
      foreach ($friends_list as $key) {
          echo "<div class='name_div' id='name".$key['user_id']."'><img src='".base_url()."uploads/".$key['profile_pic_file_name']."' width='32px'>&nbsp;".$key['name']."</div>";
          echo "<script>$('#name".$key['user_id']."').click(function(){";
          echo "$('#submit_message_input').attr('enabled');
      $('#submit_message_input').removeAttr('disabled');
      $('#send_message_input').attr('enabled');
      $('#send_message_input').removeAttr('disabled');
      $.post('".site_url()."/messenger/retrieve_messages',{'friend_id':".$key['user_id']."},function(data){
        $('#messages_show').html(data);
        $('#friend_id_field').val(".$key['user_id'].");
      });
    });


    </script>";
      }
  }
  ?></div>
<div class="col-lg-3"></div>
</div>
</div>
    <div class="col-lg-6" id="messages_middle_side">
      <h3>Messages</h3>
      <div id="messages_show"><div id="message_result">Select a friend to start chatting</div></div>
      <div id="submit_message_container"><input type="text" id="submit_message_input" disabled><button id="send_message_input" disabled>Send</button>
      <br><input type="hidden" id="friend_id_field" value=""></div>
      <center><!--<button class="side_button" id="button_close"><img src="<?php echo base_url()?>assets/images/error.png"></button>--></center>
    </div>
    <div class="col-lg-3" id="messages_right_side"></div>
</div>

<!-- closes the messages content and opens up posts content as defined in scripts.js -->
<script>
$("#button_close").click(function(){
$.fn.openContent(4);
});
$("#submit_message_input").keydown(function(e){
  if(e.keyCode==13){
    //entered
    var message=$("#submit_message_input").val();
    if(message !="")
    {
    submit_message();
    }
    else {
      alert("Message is empty!");
    }
  }
});
$("#send_message_input").click(function(){
  submit_message();
});
function submit_message()
{
  $.post("<?php echo site_url().'/messenger/send_message'?>",{'friend_id':$("#friend_id_field").val(),'message_content':$("#submit_message_input").val()},function(data){
  $("#submit_message_input").val('');
  retrieve_messages_private();
  });
  $('#messages_show').animate({ scrollTop: $(document).height() }, 1200);

};

function retrieve_messages_private(){
$.post("<?php echo site_url().'/messenger/retrieve_messages'?>",{'friend_id':$("#friend_id_field").val()},function(data){
  $('#messages_show').html(data);
});
}

</script>
