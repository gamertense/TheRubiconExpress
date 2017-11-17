<?php
include_once 'dbconfig.php';
?>
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Categories
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <?php
    $query = "SELECT category_name FROM category";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result)): 
    ?>
    <li><a href="#"><?php echo "$row</a></li>
    
  </ul>
</div>