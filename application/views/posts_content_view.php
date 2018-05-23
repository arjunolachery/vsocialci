<?php
// the content for private messages
// called from User controller -> posts_content()

foreach ($posts_results as $row) {
    $remsec=time()-$row['timestamp'];
    $name=$row['name'];
    $postUserId=$row['u_id'];
    $postid=$row['id'];
    $content=$row['content'];
    echo "<div class='row' id='postContainer".$postid."'><div class='col-lg-5 text-center'><span id='namePost".$postid."' class='namePost'>";

    echo $name."</span><span>&nbsp;&nbsp;</span><span id='namePost".$postid."' class='timePost'> ".$remsec." seconds ago</span></div></div>";
    echo "<div class='row' id='postContainer".$postid."2'><div class='col-lg-3 text-left namePost'></div>";
    echo "<div class='col-lg-6 text-left contentPost' style='word-wrap:break-word;'><span id='contentPost".$postid."'>";
    echo $content;
    echo "</span></div><div class='col-lg-3 text-center side_buttonsPost'><span id='side_buttonsPost".$postid."'><button class='side_button'";
    if ($this->session->userdata('uid') == $postUserId) {
        echo "id='deletePost".$postid."'";
    }
    echo "><img src='".base_url()."assets/images/remove.png'></button><button class='side_button'><img src='".base_url()."assets/images/up-arrow.png'></button><button class='side_button'><img src='".base_url()."assets/images/chevron.png'></button></span></div></div><hr id='postHr".$postid."'>";
    //echo "<script>$('#namePost".$postid."').css(color:'green')$('#side_buttonsPost".$postid."').css(visibility:'hidden');</script>"
    //echo "<script>$('#namePost".$postid."').css('color','green');</script>";
    echo "<script>$(document).ready(function(){
          $('#deletePost".$postid."').click(function(){
            //alert('".$postid.base_url()."User_functions_model/deletePost');
          $.post('".site_url()."/User_functions/deletePost',{postid:'".$postid."'},function(response,status){
            $('#postContainer".$postid."').fadeOut();
            $('#postContainer".$postid."2').fadeOut();
            $('#postHr".$postid."').fadeOut();
          });
        });
        });</script>";
}
