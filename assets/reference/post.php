<?php
$.fn.postData=function(data){
  $.post(hostAddress+"/index.php/user/postdata",{message:data},
  function(response,status){
  if(response ==1)
  {
    textPostNotify="Successfully Posted.";
    textPostColor="green";
    $("#postsViewer").load(hostAddress+"/index.php/user/postscontentview");
  }
  else {
    textPostNotify="Technical error. Try again.";
    textPostColor="red";
  }
  });
};
?>
