<?php
  /**
   * check if post has been liked
   * display like button accordingly
   */
  $userID = $_SESSION['id'];
  $likeCheck = "SELECT * FROM likes WHERE userID='$userID' AND actID='$actid'";
  $resultLikes = $conn->query($likeCheck);
  $rowLikes = $resultLikes->fetch_assoc();
  $liked = $resultLikes->num_rows;
?>
<div class="likeButton" id="likeButton<?php echo $actid; ?>">
  <?php
    if($liked>0){
      echo "<button class='unlike' type='button' onclick='unlike(".$actid.")'></button>";
    }else{
      echo "<button class='like' type='button' onclick='like(".$actid.")'></button>";
    }
  ?>
</div>
<script>
  var userid = '<?php echo $userID; ?>';
</script>
<script src="javascript/like.js"></script>
<script src="javascript/unlike.js"></script>