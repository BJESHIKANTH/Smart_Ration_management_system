<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("location: index.php"); // Redirect to login page if not logged in
    exit();
}
?>


<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta name="viewport"
    content="width=device-width, initial-scale=1.0" />

  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="adminpage.css" />

  <title>Home</title>
  <style>
    .a {
      display: inline-block;
      padding-top: 5em;
      width: 50%;
      height: 50em;
    }

    .c {
      display: inline-block;
      width:200%;
      height: 50em;
      /* padding: 5px; */
      /* border: 1px solid blue; */
      background-image: url('Public-Distribution-System.jpg');
      background-repeat: no-repeat;
    }

    #information {
      color: black;
      background-color: #E4F5D4;
      text-align: center;
      margin-bottom: 57px;
      height: 79px;
      padding: 20px;

    }
  </style>

</head>

<body>
<?php include 'header.php'; ?>
  <!-- <div class="body-text"><h1>This is Home Page!</h1></div> -->
  <div class="a">
    <!-- SELECT sum(rice) as rice,sum(wheat)as wheat,sum(sugar)as sugar FROM `remain_stock`;  -->
    <?php

    // Username is root
    $user = 'root';
    $password = '';

    // Database name is geeksforgeeks
    $database = 'DBMS';

    // Server is localhost with
// port number 3306
    $servername = 'localhost:3306';
    $mysqli = new mysqli($servername, $user,
      $password, $database);

    // Checking for connections
    if ($mysqli->connect_error) {
      die('Connect Error (' .
        $mysqli->connect_errno . ') ' .
        $mysqli->connect_error);
    }

    // SQL query to select data from database
    $sql = " SELECT sum(rice) as 'rice',sum(wheat)as 'wheat',sum(sugar)as 'sugar' FROM `remain_stock`; ";
    $result = $mysqli->query($sql);
    $sql1="SELECT * FROM `price` ";
    $result1 = $mysqli->query($sql1);

    $mysqli->close();
    ?>
    <!-- HTML code to display data in tabular format -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>User Details</title>
      <!-- CSS FOR STYLING THE PAGE -->
      <style>
        table {
          margin: 5% auto;
          font-size: large;
          border: 1px solid black;
          width: 40em;
          align:center;
        }

        h1 {
          text-align: center;
          color: #006600;
          font-size: xx-large;
          font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
          background-color: #E4F5D4;
          border: 1px solid black;
        }
        td {
          font-weight: bold;
          border: 1px solid black;
          padding: 10px;
          text-align: center;
        }

        td {
          font-weight: lighter;
        }
      </style>
      <style>
            blink {
                color: #2d38be;
                font-weight: bold;
                animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
            }
        </style>

    </head>

    <body>
   
      <section>
      <table align="center">
          <!-- <h1>Customer info</h1> -->
          <caption>
            <h1><b><blink>Available Stock</blink></b></h1>
          </caption>
          <tr>

            <th>Rice(in kg)</th>
            <th>Wheat(in kg)</th>
            <th>Sugar(in kg)</th>
            <!-- <th>income</th>
                <th>contact</th>
                <th>city</th> -->
          </tr>
          <?php
          while ($rows = $result->fetch_assoc()) {
          ?>
          <tr>
            <td>
              <?php echo $rows['rice']; ?>
            </td>
            <td>
              <?php echo $rows['wheat']; ?>
            </td>
            <td>
              <?php echo $rows['sugar']; ?>
            </td>
            <!-- <td><?php echo $rows['income']; ?></td> -->
            <!-- <td><?php echo $rows['contact']; ?></td> -->
            <!-- <td><?php echo $rows['city']; ?></td> -->
          </tr>
          <?php
          }
          ?>
        </table>

        <table align="center">
          <!-- <h1>Customer info</h1> -->
          <caption>
            <h1><blink>Price</blink></h1>
          </caption>
          <tr>
          <th>Color</th>

            <th>Rice(in rupees/kg)</th>
            <th>Wheat(in rupees/kg)</th>
            <th>Sugar(in rupees/kg)</th>
            <!-- <th>income</th>
                <th>contact</th>
                <th>city</th> -->
          </tr>
          <?php
          while ($rows = $result1->fetch_assoc()) {
          ?>
          <tr>
            <td>
              <?php echo $rows['color']; ?>
            </td>
            <td>
              <?php echo $rows['rice']; ?>
            </td>
            <td>
              <?php echo $rows['wheat']; ?>
            </td>
            <td>
              <?php echo $rows['sugar']; ?>
            </td>
            <!-- <td><?php echo $rows['id']; ?></td> -->
            <!-- <td><?php echo $rows['contact']; ?></td> -->
            <!-- <td><?php echo $rows['city']; ?></td> -->
          </tr>
          <?php
          }
          ?>
        </table>
      </section>

    </body>

    </html>



  </div>
 <!-- <div class="c"></div>-->
</body>

</html>