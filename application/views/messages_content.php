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
      echo "<script>value_main=0;</script>";
      foreach ($friends_list as $key) {
          # code...
          //count number of messages that are later than the given time
          $key['time_checked_on'];
          $uid=$this->session->userdata('uid');
          $user_id_value=$key['user_id'];
          $time_checked_on=$key['time_checked_on'];
          //$select_messages_query=$this->db->query("SELECT * FROM messages WHERE ((u_id=$uid AND friend_id=$user_id_value) OR (u_id=$user_id_value AND friend_id=$uid)) AND time_message>$time_checked_on");
          $select_messages_query=$this->db->query("SELECT * FROM messages WHERE friend_id=$uid AND u_id=$user_id_value AND time_message>$time_checked_on");
          //$select_messages_query=$this->db->query("SELECT * FROM messages WHERE u_id=$uid AND friend_id=$key['user_id']");
          $select_messages_query_array=$select_messages_query->result_array();
          $new_messages=sizeof($select_messages_query_array);
          echo "<div class='name_div' id='name".$key['user_id']."'><img src='".base_url()."uploads/".$key['profile_pic_file_name']."' width='32px'>&nbsp;".$key['name']."&nbsp;&nbsp;&nbsp;";
          if ($new_messages>0) {
              echo "<span class='messages_new' id='message_new".$user_id_value."'>";
              echo $new_messages;
              echo "</span>";
          }
          echo "</div>";
          echo "<script>$('#name".$key['user_id']."').click(function(){";
          echo "$('#submit_message_input').attr('enabled');
          $('#message_new".$user_id_value."').hide();
      $('#submit_message_input').removeAttr('disabled');
      $('#send_message_input').attr('enabled');
      $('#send_message_input').removeAttr('disabled');
      $.post('".site_url()."/friend/notification_message_time_update',{friend_id:".$user_id_value."});
      value_main=".$key['user_id'].";
      setTimeout(function(){
      go_to_bottom_message();
    },300);
    });
    </script>";
      }
      echo "<script>
      function repeat_me_main()
      {
        if(value_main!=0)
        {
          $.post('".site_url()."/messenger/retrieve_messages',{'friend_id':value_main},function(data){
            $('#messages_show').html(data);
            $('#friend_id_field').val(value_main);
          });
        }
      }
      var myTimer = setInterval(repeat_me_main, 100);
      </script>";
      echo "<script>
      function repeat_me(value1)
      {
        $.post('".site_url()."/messenger/retrieve_messages',{'friend_id':value1},function(data){
          $('#messages_show').html(data);
          $('#friend_id_field').val(value1);
        });
      }
      </script>";
  }
  ?></div>
        <div class="col-lg-3"></div>
      </div>
    </div>
    <div class="col-lg-6" id="messages_middle_side">
      <h3>Messages</h3>
      <div id="messages_show">
        <div id="message_result">Select a friend to start chatting</div>
      </div>
      <div id="submit_message_container"><input type="text" id="submit_message_input" disabled><button id="send_message_input" disabled>Send</button>
        <br><input type="hidden" id="friend_id_field" value=""></div>
      <center>
        <!--<button class="side_button" id="button_close"><img src="<?php echo base_url()?>assets/images/error.png"></button>--></center>
    </div>
    <div class="col-lg-3" id="messages_right_side"></div>
  </div>

  <!-- closes the messages content and opens up posts content as defined in scripts.js -->
  <script>
    $("#button_close").click(function() {
      $.fn.openContent(4);
    });
    $("#submit_message_input").keydown(function(e) {
      if (e.keyCode == 13) {
        //entered
        submit_message();
        go_to_bottom_message();
      }
    });
    $("#send_message_input").click(function() {
      submit_message();
      go_to_bottom_message();
    });

    function submit_message() {
      var message = $("#submit_message_input").val();
      if (message != "") {
        $.post("<?php echo site_url().'/messenger/send_message'?>", {
          'friend_id': $("#friend_id_field").val(),
          'message_content': $("#submit_message_input").val()
        }, function(data) {
          $("#submit_message_input").val('');
          retrieve_messages_private();
        });
      } else {
        alert("Message is empty!");
      }

    }
    //$('#messages_show').animate({ scrollTop: $(document).height() }, 1200);

    function retrieve_messages_private() {
      $.post("<?php echo site_url().'/messenger/retrieve_messages'?>", {
        'friend_id': $("#friend_id_field").val()
      }, function(data) {
        $('#messages_show').html(data);
      });
    }
  </script>
