<?php
$nameInitial = ucfirst(substr($_SESSION['user']['Name'], 0, 1));
$firstnameInitial = ucfirst(substr($_SESSION['user']['Firstname'], 0, 1));
?>


<div class="user-icon">
    <div class="circle">
        <p class="user-letters"><?php echo $firstnameInitial . $nameInitial?></p>
    </div>
</div>