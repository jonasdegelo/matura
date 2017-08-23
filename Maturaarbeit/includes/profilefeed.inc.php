<h1>Meine Aktivitäten</h1>
<?php
  //session_start();
  if(isset($_SESSION['id'])){
    include 'parsers/parse.gpx.php';
    $id = $_SESSION['id'];
    function resultToArray($result) {
      $rows = array();
      while($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
      return $rows;
    }
    $sql = "SELECT * FROM activities WHERE user_id='$id'";
    $result = $conn->query($sql);
    $rows = resultToArray($result);
    $result->free();

    foreach($rows as $row) {
      $title = $row['title'];
      $actid = $row['id'];
      $sport = $row['sport'];
      $path = $row['actPath'];
      $type = $row['type'];
      $actTime = $row['actTime'];
      $filename = $row['filename'];
      $description = $row['description'];
      echo "<h1><a clas='actTitle' href='../activity.php?name=".$filename."'>".$title."</a></h1><br />";
      echo "<p>".$description."</p><br />";
      gpx($row['actPath']);
      echo "<img src='https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318&markers=color:red%7Clabel:C%7C40.718217,-73.998284
      &key=AIzaSyA4g-swM5ElPgnAUJPg27C8Gwi3-kANoTg' width='100' height='100'>";
    }
  }
?>
