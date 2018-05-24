<?php
// the content for private messages
// called from User controller -> posts_content()
// posts displayed as each row from the table posts
foreach ($posts_results as $row) {
    $remsec=time()-$row['timestamp'];
    $name=$row['name'];
    $postUserId=$row['u_id'];
    $postid=$row['id'];
    $content=$row['content'];
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
    echo "<div class='row' id='postContainer".$postid."'>
    <div class='col-lg-5 text-center'>
    <span id='namePost".$postid."' class='namePost'>".$name."</span>
    <span>&nbsp;&nbsp;</span>
    <span id='namePost".$postid."' class='timePost'> ".$remsec." seconds ago</span>
    </div>
    </div>";
    echo "<div class='row' id='postContainer".$postid."2'>
    <div class='col-lg-3 text-left namePost'>
    </div>
    <div class='col-lg-6 text-left contentPost' style='word-wrap:break-word;'>
    <span id='contentPost".$postid."'>".$content."</span>
    </div>
    <div class='col-lg-3 text-center side_buttonsPost'>
    <span id='side_buttonsPost".$postid."'>";
    if ($this->session->userdata('uid') == $postUserId) {
        echo "<button class='side_button'id='deletePost".$postid."'><img src='".base_url()."assets/images/remove.png'></button>";
    }
    echo "<button class='side_button'><img src='".base_url()."assets/images/up-arrow.png'></button>
    <button class='side_button'><img src='".base_url()."assets/images/chevron.png'></button>
    </span>
    </div>
    </div>
    <hr id='postHr".$postid."'>";
    // the following script that is formed for each post is used for the delete functionality
    // once the delete button is clicked for each post, an ajax post request is made to the [deletePost] method
    // of the controller [User_functions]
    // then the particular post that the user wants deleted fades out
    echo "<script>$(document).ready(function(){
          $('#deletePost".$postid."').click(function(){
          $.post('".site_url()."/User_functions/deletePost',{postid:'".$postid."'},function(response,status){
            $('#postContainer".$postid."').fadeOut();
            $('#postContainer".$postid."2').fadeOut();
            $('#postHr".$postid."').fadeOut();
          });
        });
        });</script>";
}
