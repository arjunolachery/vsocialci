<div class='row' id='search_content'>
  <div class='col-lg-3'></div>
    <div class='col-lg-6'>
      <h3>Search Results!</h3><br>
      <span id='search_result_value'><?php echo $search_data.$_SESSION['uid'];?></span>
      <br><br><center><button class='side_button' id='searchClose'><img src='../../assets/images/error.png'></button></center>
    </div>
    <div class='col-lg-3'>hi</div>
</div>
<script>
$("#searchClose").click(function(){
  $.fn.openContent(4);
});
</script>
