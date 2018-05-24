<!-- this is the content for the search results -->
<!--
<div class='row' id='search_content'>
  <div class='col-lg-3'></div>-->


    <div style="border:thin solid #ccc">
      <span id='search_result_value'><?php
      $count=0;
      foreach ($retrieved_search_results as $row) {
          // retrieval from users table
          if ($selector_search==$count) {
              $color='white';
              $url=site_url()."/user/profile?email=".$row['email'];
          } else {
              $color='rgb(237, 237, 237)';
          }
          echo "<a class='anchor_search' href='".site_url()."/user/profile?email=".$row['email']."'><div style='background-color:".$color."'>".$row['name']."</div></a>";
          $count++;
      }
      ?>
      <?php setcookie('search_results_amount', $count, time()+3600);?>
      <div class="anchor_search" id="number_search_results" value=''><center><?php echo $count." matching results"?></center></div></span>
      <center><button class='side_button' id='searchClose'><img src='../../assets/images/error.png'></button></center>
    </div>
    <!--
    <div class='col-lg-3'>hi</div>
</div>-->
<!-- closes the search content and opens up posts content when the close button is clicked as defined in scripts.js -->
<script>
$("#searchClose").click(function(){
  $("#search_content_show").hide();
});
$(document).ready(function(){
  // alert(document.cookie);
  $("#searchBar").keyup(function(e){
    if(e.keyCode==13)
    {
    window.location.href="<?php echo $url?>";
  }
  });
});
</script>
