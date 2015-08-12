<?php

  include 'config.php';
 
  // Set default timezone
  date_default_timezone_set('UTC');
 
  try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    // $file_db = new PDO('sqlite:printAvail.db');
    $file_db = new PDO('sqlite:'.$database_name);
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Wayne State University, WSU, Library System, Libraries" />
        <meta name="description" content="The online resources and services of the Wayne State University Libraries" />
        <meta name="author" content="libwebmaster@wayne.edu" />
        <meta name="Copyright" content="Copyright (c) <?php echo(date('Y')); ?> Wayne State University" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="/inc/img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="/ico/style.css">
  <link href="//library.wayne.edu/inc/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/pattern-lib/css/style.css">

        <title>Wayne State University Libraries : About</title>

        <script src="/pattern-lib/js/jquery.min.js"></script>
    <script src="/pattern-lib/js/bootstrap.min.js"></script>
    <script src="/pattern-lib/js/main.js"></script>
    <style type="text/css">
      .status {
        font-weight:bold;
      }
      .online {
        color:green;
      }
      .offline {
        color:red;
      }
    </style>
</head>
<body>
        <div class="page" id="wrap">
                <?php include($_SERVER['DOCUMENT_ROOT'].'inc/header.php'); ?>
                <div id="main" class="container">
<!-- ################################################################################################################################ -->
<div class="row">
        <div class="col-md-12">
          <h2>Printer Status</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
      
          <table class="table table-striped">
            <tr>
              <th>Printer Name</th>
              <th>Status</th>
              <th>Message</th>
              <th>Last Updated</th>
            </tr>
            <?php
              
              // Select all data from memory db messages table 
              $result = $file_db->query('SELECT * FROM printer');
              foreach($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td class=' status " . $row['status'] . "'>" . $row['status'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "<td>" . $row['updated'] . "</td>";
                echo "</tr>";                
              }

            ?>
          </table>

        </div>
      </div>        







<!-- ################################################################################################################################ -->
                </div>

        </div>
</body>
</html>`