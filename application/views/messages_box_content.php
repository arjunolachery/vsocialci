<?php
$convert_timestamp_old="";
foreach ($messages as $key) {
    $remsec=$key['time_message'];
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
    $convert_timestamp=$day_timestamp." ".$month_timestamp.$year_timestamp;
    if ($convert_timestamp!=$convert_timestamp_old) {
        echo "<div class='row'>
      <div class='col-lg-12 text-center message_display_date'>".$convert_timestamp."</div>
    </div>";
        $convert_timestamp_old=$convert_timestamp;
    }
    if ($key['u_id']==$uid) {
        //right side
        echo "<div class='row'>
      <div class='col-lg-6'></div>
      <div class='col-lg-4 text-right'><span class='message_display_left";
        echo"'>".$key['content_message']."</span></div>
      <div class='col-lg-2 message_display_time'>".$time_timestamp."</div>
    </div>";
    } else {
        //left side
        echo "<div class='row'>
      <div class='col-lg-2 message_display_time text-center'>".$time_timestamp."</div>
      <div class='col-lg-4'><span class='message_display_left";
        if ($messages_time_checked<$remsec) {
            echo ' green_message';
        }
        echo "'>".$key['content_message']."</span></div>
      <div class='col-lg-6 text-right'></div>
    </div>";
    }
    echo "<br>";
}
