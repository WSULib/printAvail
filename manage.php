<?php

  include 'config.php';
  include 'inc/password_protect.php';
 
  // Set default timezone
  date_default_timezone_set('UTC');

  // set default message
  $msg = "";

  // if init, drop and create table, populate with all printers from config online
  if ($_REQUEST['init']){
    
    $msg = "Re-Initializing, pulling in printers from config, setting all to 'online'";   
    
    try {

      /**************************************
      * Drop tables                         *
      **************************************/

      // Drop table messages from file db
      $file_db->exec("DROP TABLE printer");
   
   
      /**************************************
      * Create tables                       *
      **************************************/
   
      // Create table
      $file_db->exec("CREATE TABLE IF NOT EXISTS printer (
                      id INTEGER PRIMARY KEY AUTOINCREMENT, 
                      name TEXT, 
                      status TEXT,
                      message TEXT, 
                      updated DATETIME DEFAULT CURRENT_TIMESTAMP)"); 

 
   
      /**************************************
      * Set initial data                    *
      **************************************/
   
      // Prepare INSERT statement to SQLite3 file db
      $insert = "INSERT INTO printer (name, status, message) 
                  VALUES (:name, :status, :message)";
      $stmt = $file_db->prepare($insert);
   
      // Bind parameters to statement variables
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':status', $status);
      $stmt->bindParam(':message', $message);
   
      // Loop thru all messages and execute prepared insert statement
      foreach ($printers_array as $printer) {
        // Set values to bound variables
        $name = $printer;
        $status = "online";
        $message = "OK";
   
        // Execute statement
        $stmt->execute();
      } 
   
      

    }
    catch(PDOException $e) {
      // Print PDOException message
      echo $e->getMessage();
    }
  } // close init


  // if printer update (printer_id key present), update printer row in SQLite
  if (array_key_exists("printer_id", $_REQUEST)){
    
    $msg = "Updating status of printer: {$_REQUEST['printer_name']}";

    // update row
    // Prepare INSERT statement to SQLite3 file db
    $insert = "UPDATE printer  
                SET status = :status, message = :message, updated = (DATETIME('now')) 
                WHERE id = :id";
    $stmt = $file_db->prepare($insert);
 
    // Bind parameters to statement variables
    $stmt->bindParam(':status', $_REQUEST['printer_status']);
    $stmt->bindParam(':message', $_REQUEST['printer_message']);
    $stmt->bindParam(':id', $_REQUEST['printer_id']);

    // Execute statement
    $stmt->execute();

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

        <title>Wayne State University Libraries : Printer Management</title>

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
      .manage_msg{
        background-color:yellow;
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
          <p class="manage_msg"><?php echo $msg; ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h3>Manage</h3>
          <ul class="list-inline">
            <li><a href="./manage.php?init=true">Reset All</a></li>
            <li><a href="./index.php">Librarian / Public View</a></li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
      
          <table class="table table-striped">
            <tr>
              <th>Printer Name</th>
              <th>Current Status</th>
              <th>Current Message</th>
              <th>Last Updated</th>
              <th>Update Status</th>
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
                ?>
                <!-- maangement blurb -->
                <td>
                  <form action="./manage.php" method="POST" class="form">
                    <div class="form-group">
                      <label class="radio-inline">
                        <input type="radio" name="printer_status" value="online"> Online
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="printer_status" value="offline"> Offline
                      </label>
                    </div>
                    <div class="form-group">
                      <input type="text" name="printer_message" placeholder="update message..."/>
                    </div>
                    <div class="form-group" id="hidden">
                      <input type="hidden" name="printer_id" value="<?php echo $row['id'] ?>"/>
                      <input type="hidden" name="printer_name" value="<?php echo $row['name'] ?>"/>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>

                  </form>
                </td>
                <?php
                echo "</tr>";                
              }

            ?>
          </table>

        </div>
      </div>

<!-- ################################################################################################################################ -->
                </div>

        </div>
        <?php include($_SERVER['DOCUMENT_ROOT'].'inc/footer.php'); ?>
</body>
</html>`

<?php
  /**************************************
  * Close db connections                *
  **************************************/

  // Close file db connection
  $file_db = null;
?>