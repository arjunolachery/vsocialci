<!-- this is the content for the search results -->
<div>
  <span id='search_result_value'><?php
      $count=0;
      $url='';
      foreach ($retrieved_search_results as $row) {
          // retrieval from users table
          if ($selector_search==$count) {
              $border_bottom_color='thin solid #b2b2b2';
              $url=site_url()."/user/profile?email=".$row['email'];
          } else {
              $border_bottom_color='thin solid white';
          }
          //echo "<a class='anchor_search' href='".site_url()."/user/profile?email=".$row['email']."'><div style='background-color:".$color."'>".$row['name']."</div></a>";
          echo "<a class='anchor_search' href='".site_url()."/user/profile?email=".$row['email']."' href='hi'><div class='search_result_div' style='border-bottom:".$border_bottom_color.";border-top:".$border_bottom_color."'>&nbsp;".$row['name']."</div></a>";
          $count++;
      }
      ?>
      <?php setcookie('search_results_amount', $count, time()+3600);?>
</span>
  <div class="bottom_dropdown flex_container">
    <table width="100%">
      <tr>
        <td width="48%"><span style="font-family:Arial;font-size:0.5em;">&nbsp;&nbsp;<?php echo $count." found"?></span></td>
        <td width="52%"><img src='../../assets/images/error.png' class='side_button' id='searchCloser'></td>
      </tr>
    </table>
  </div>
</div>
<!-- closes the search content and opens up posts content when the close button is clicked as defined in scripts.js -->
<script>
  $(document).ready(function() {
    $("#searchCloser").click(function() {
      $("#search_content_show").hide();
    });
    var e;
    $("#searchBar").keyup(function(event) {
      if (event.which == 13) {
        window.location.href = "<?php echo $url?>";
      }
    });
  });
</script>
