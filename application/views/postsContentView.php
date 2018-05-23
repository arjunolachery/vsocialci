<?php
//this is the view that calls the posts within the profile page
//need to create scripts that makes the buttons show up

$query = $this->db->query('SELECT * FROM posts ORDER BY id DESC');

foreach ($query->result_array() as $row) {
    //echo "<script>alert('".$this->session->userdata('uid')."');</script>";
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where(array('user_id'=>1));
    $query=$this->db->get();
    $user=$query->row();
    $remsec=time()-$row['timestamp'];
    $name=$user->name;
    $postUserId=$row['u_id'];
    $postid=$row['id'];
    $content=$row['content'];
    echo "<div class='row' id='postContainer".$postid."'><div class='col-lg-5 text-center'><span id='namePost".$postid."' class='namePost'>";

    echo $name."</span><span id='namePost".$postid."' class='timePost'> ".$remsec." seconds ago</span></div></div>";
    echo "<div class='row' id='postContainer".$postid."2'><div class='col-lg-3 text-left namePost'></div>";
    echo "<div class='col-lg-6 text-left contentPost' style='word-wrap:break-word;'><span id='contentPost".$postid."'>";
    echo $content;
    echo "</span></div><div class='col-lg-3 text-center sideButtonsPost'><span id='sideButtonsPost".$postid."'><button class='sideButton'";
    if ($this->session->userdata('uid') == $postUserId) {
        echo "id='deletePost".$postid."'";
    }
    echo "><img src='".base_url()."assets/images/remove.png'></button><button class='sideButton'><img src='".base_url()."assets/images/up-arrow.png'></button><button class='sideButton'><img src='".base_url()."assets/images/chevron.png'></button></span></div></div><hr id='postHr".$postid."'>";
    //echo "<script>$('#namePost".$postid."').css(color:'green')$('#sideButtonsPost".$postid."').css(visibility:'hidden');</script>"
    //echo "<script>$('#namePost".$postid."').css('color','green');</script>";
    echo "<script>$(document).ready(function(){
          $('#deletePost".$postid."').click(function(){
            //alert('".$postid.base_url()."UserFunctions/deletePost');
          $.post('".site_url()."/UserFunctions/deletePost',{postid:'".$postid."'},function(response,status){
            $('#postContainer".$postid."').fadeOut();
            $('#postContainer".$postid."2').fadeOut();
            $('#postHr".$postid."').fadeOut();
          });
        });
        });</script>";
}
