<!DOCTYPE html>
<html lang = "en-US">
  <head>
      <title>SYP-HOME</title>
      <meta charset="utf-8">
  </head>
  <body>
<center>
    <h1>Save Your Records & Draw a Graph with your data</h1>
    <ul>
      <p><button><a href="index.php">file Upload</a></button></p>

      <p><button><a href="table.php">show table</a></button></p>

      <form action = "tableOne.php" method="POST" enctype="multipart/form-data">
        <?php
          $conn = mysqli_connect("localhost", "root", "123456");
          $db = mysqli_select_db($conn, 'opentutorials');
          $query = "SELECT distinct InspectName FROM `medicalrecords` ";
          $query_run = mysqli_query($conn, $query);
          ?>
            <select name="job">
            <?php while($row = mysqli_fetch_array($query_run)){?>
              <option ><?=$row[0]?></option>
            <?php } ?>
            </select>
          <input type="submit" name="submit" value="Select InspectName"/><br>
      </form>


      <form action = "graph.php" method="POST" enctype="multipart/form-data">
        <?php
          $conn = mysqli_connect("localhost", "root", "123456");
          $db = mysqli_select_db($conn, 'opentutorials');
          $query = "SELECT distinct InspectName FROM `medicalrecords` ";
          $query_run = mysqli_query($conn, $query);
          ?>
            <select name="draw">
            <?php while($row = mysqli_fetch_array($query_run)){?>
              <option ><?=$row[0]?></option>
            <?php } ?>
            </select>
          <input type="submit" name="submit" value="draw graph with InspectName"/><br>
      </form>


      <p><button><a href="displayImage.php">show images (ALL)</a></button></p>

        <form action = "displayImageOne.php" method="POST" enctype="multipart/form-data">
          <p><input type="text" name="idNo" placeholder="Enter id number"/>
          <input type="submit" name="submit" value="show image (Only ONE)"/><br>
        </form>

      <button><a href="showList.php">image List</a></button>

    </ul>
    </center>
  </body>
</html>
