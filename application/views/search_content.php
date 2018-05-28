<!-- this is the content for the search results -->
<!--
<div class='row' id='search_content'>
  <div class='col-lg-3'></div>-->


    <div>
      <span id='search_result_value'><?php
      $count=0;
      foreach ($retrieved_search_results as $row) {
          // retrieval from users table
          if ($selector_search==$count) {
              $color='rgb(237, 237, 237)';
              $url=site_url()."/user/profile?email=".$row['email'];
          } else {
              $color='white';
          }
          echo "<a class='anchor_search' href='".site_url()."/user/profile?email=".$row['email']."'><div style='background-color:".$color."'>".$row['name']."</div></a>";
          $count++;
      }
      ?>
      <?php setcookie('search_results_amount', $count, time()+3600);?>
      <div class="anchor_search" id="number_search_results" value=''><center><?php echo $count." matching results"?></center></div></span>
      <div class="bottom_dropdown"><center><button class='side_button' id='searchCloser'><img src='../../assets/images/error.png'></button></center></div>
    </div>
    <!--
    <div class='col-lg-3'>hi</div>
</div>-->
<!-- closes the search content and opens up posts content when the close button is clicked as defined in scripts.js -->
<script>
$(document).ready(function(){
$("#searchCloser").click(function(){
  $("#search_content_show").hide();
});
  // alert(document.cookie);
  $("#searchBar").keyup(function(e){
    if(e.keyCode==13)
    {
    window.location.href="<?php echo $url?>";
  }
  });
});
</script>
