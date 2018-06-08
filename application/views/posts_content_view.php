<?php
// the content for private messages
// called from User controller -> posts_content()
// posts displayed as each row from the table posts
foreach ($posts_results as $row) {
    $remsec=$row['timestamp'];
    $now=time();
    $day_timestamp=date('d', $remsec);
    $month_timestamp=date('M', $remsec);
    $year_timestamp=date('Y', $remsec);
    if ($year_timestamp==date('Y', $now)) {
        $year_timestamp="";
    } else {
        $year_timestamp=" ".$year_timestamp;
    }
    if ($day_timestamp==date('d', $now)) {
        $day_timestamp="Today";
        $month_timestamp="";
    }
    if ($day_timestamp==date('d', $now)-1) {
        $day_timestamp="Yesterday";
        $month_timestamp="";
    }
    $time_timestamp=date('H:i A', $remsec);
    $convert_timestamp=$day_timestamp." ".$month_timestamp.$year_timestamp." at ".$time_timestamp;
    $name=$row['name'];
    $postUserId=$row['u_id'];
    $postid=$row['id'];
    $content=$row['content'];
    $picture_id=$row['picture_id'];
    if ($picture_id!=0) {
        if (strpos($picture_id, 'p') !== false) {
            //profile pic
            $picture_id=substr($picture_id, 0, -1);
            $sql ="SELECT * FROM profile_pic WHERE id='$picture_id'";
            $query = $this->db->query($sql);
            $query_array=$query->result_array();
            $pic_link=base_url()."uploads/".$query_array[0]['profile_pic_file_name'];
            $content=$query_array[0]['caption']."<br>"."<img src='".$pic_link."' width='100%'>";
            $convert_timestamp=$convert_timestamp."<br>| Added a new profile picture";
        } else {
            //timeline pic
            $sql ="SELECT * FROM pictures WHERE id='$picture_id'";
            $query = $this->db->query($sql);
            $query_array=$query->result_array();
            $pic_link=base_url()."uploads/".$query_array[0]['pic_file_name'];
            $content=$query_array[0]['image_caption']."<br>"."<img src='".$pic_link."' width='100%'>";
            $convert_timestamp=$convert_timestamp."<br>| Added a new picture";
        }
        //picture exists
      //check if picture belongs to profile or timeline by searching for p in pic id
    }
    // each post is displayed under 2 main divs
    // with first part [#postContainer{postid}]
    // and second part [#postContainer{postid}2]
    // each post has a post name [.namePost],
    // post time [.timePost]
    // content of post [#contentPost{postid}]
    // also side buttons div exist in the second part [.side_buttonsPost]
    // with a delete button that shows only if it's the current user's post [#deletePost{postid}]
    // as well as upvote and downvote buttons that have not been fully developed
    // TODO: implement upvote, downvote
    // Also each post has a hr [#postHr{postid}] that exist at the end of each post
    // get profile picture
    $select_profile_pic=$this->db->query("SELECT * FROM profile_pic WHERE set_profile_pic=1 AND u_id=$postUserId");
    $select_profile_pic_array=$select_profile_pic->result_array();
    $profile_pic_link_user=base_url()."uploads/".$select_profile_pic_array[0]['profile_pic_file_name'];
    //get votes total
    $select_votes=$this->db->query("SELECT * FROM votes WHERE post_id=$postid");
    $select_votes_array=$select_votes->result_array();
    $total_votes=0;
    if (empty($select_votes_array)) {
        $total_votes=0;
    } else {
        foreach ($select_votes_array as $key) {
            $total_votes=$total_votes+$key['val'];
        }
    }
    if ($total_votes<0) {
        $color='red';
    } elseif ($total_votes>0) {
        $color='green';
        $total_votes='+'.$total_votes;
    } else {
        $color='black';
    }
    echo "<div class='postContainerMain' id='postContainerMain".$postid."'><span id='postContainerTopSpan'>
    <div class='row' class='postContainerTop' style='border-bottom-color:#ccc' id='postContainer".$postid."'>
    <div class='col-lg-5'><table class='post_left_details'><tr><td rowspan='2'><button class='side_button' id='profileButtonOpen'><img src='".$profile_pic_link_user."' width='32px'></button></td>
    <td><span id='namePost".$postid."' class='namePost'>".$name."</span></td></tr><tr><td>
    <span id='namePost".$postid."' class='timePost'> ".$convert_timestamp."</span></td></tr></table>
    </div>

    <div class='col-lg-7 text-right side_buttonsPost'>
    <span id='side_buttonsPost".$postid."'>";
    if ($this->session->userdata('uid') == $postUserId) {
        echo "<button class='side_button'id='deletePost".$postid."'><img src='".base_url()."assets/images/remove.png'></button>";
    }
    echo "
    </span>
    </div>

    </div></span>";
    echo "<div class='row' id='postContainer".$postid."2'>
    <div class='col-lg-12 text-left contentPost' style='word-wrap:break-word;'>
    <span id='contentPost".$postid."'>".$content."</span>
    </div>
    <center><button class='side_button' id='".$postid."upvote_button'><img src='".base_url()."assets/images/new_up_arrow.png' width='20px'></button><button class='side_button'><span class='button_points' id='".$postid."total_votes' style='color:".$color."'>".$total_votes."</span></button>
    <button class='side_button' id='".$postid."downvote_button'><img src='".base_url()."assets/images/new_down_arrow.png' width='20px'></button></center>
    </div>
    </div><span id='breakPost".$postid."'><br><br></span>";
    // the following script that is formed for each post is used for the delete functionality
    // once the delete button is clicked for each post, an ajax post request is made to the [deletePost] method
    // of the controller [User_functions]
    // then the particular post that the user wants deleted fades out
    echo "<script>$(document).ready(function(){
          $('#deletePost".$postid."').click(function(){
            var r=confirm('Are you sure you want to delete this post?');
            if(r==true)
            {
              $('#notification_side_message').fadeIn();
          $.post('".site_url()."/User_functions/deletePost',{postid:'".$postid."'},function(response,status){
            $('#postContainer".$postid."').fadeOut();
            $('#postContainer".$postid."2').fadeOut();
            $('#postHr".$postid."').fadeOut();
            $('#postContainerMain".$postid."').fadeOut();
            $('#breakPost".$postid."').fadeOut();
          });
        }
        });

        $('#".$postid."upvote_button').click(function(){
        $.post('".site_url()."/votes/up_vote',{'data':".$postid."},function(response){
          var filtered_data=response;
          if(filtered_data>0)
          {
            var color='green';
            filtered_data='+'+filtered_data;
          }
          else if(filtered_data<0)
          {
            var color='red';
          }
          else {
            var color='black';
          }

          $('#".$postid."total_votes').html(filtered_data);
          $('#".$postid."total_votes').css('color',color);
        });
      });

        });

        </script>";
}
