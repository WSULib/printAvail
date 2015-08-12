
<?php

  include 'config.php';
 
  // Set default timezone
  date_default_timezone_set('UTC');

  // set default message
  $msg = "";

  print_r($_REQUEST);

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

  // if init, drop and create table, populate with all printers from config online
  if ($_REQUEST['init']){
    
    $msg = "FIRING INIT";   
    
    try {

      /**************************************
      * Drop tables                         *
      **************************************/

      // Drop table messages from file db
      $file_db->exec("DROP TABLE printer");
   
   
      /**************************************
      * Create tables                       *
      **************************************/
   
      // Create table messages
      $file_db->exec("CREATE TABLE IF NOT EXISTS printer (
                      id INTEGER PRIMARY KEY, 
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
        $message = "n/a";
   
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
    
    $msg = "updating printer";

    // update row
    // Prepare INSERT statement to SQLite3 file db
    $insert = "UPDATE printer  
                SET status = :status, message = :message
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

<html>
  <head>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    
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
    <div class="container">

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
            <li><a href="#">Reset All</a></li>
            <li><a href="#">Do Other Thing</a></li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
      
          <table class="table table-striped">
            <tr>
              <th>Printer Name</th>
              <th>Current Status</th>
              <th>Message</th>
              <th>Updated</th>
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
                    <input type="hidden" name="printer_id" value="<?php echo $row['id'] ?>"/>
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

    </div> 
  </body>

</html> 

<?php


   

  /**************************************
  * Close db connections                *
  **************************************/

  // Close file db connection
  $file_db = null;

?>