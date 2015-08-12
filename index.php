
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
    </style>
  </head>

  <body>
    <div class="container">

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

    </div> 
  </body>

</html> 

<?php

  /**************************************
  * Drop tables                         *
  **************************************/

  // Drop table messages from file db
  // $file_db->exec("DROP TABLE printer");
   

  /**************************************
  * Close db connections                *
  **************************************/

  // Close file db connection
  $file_db = null;

?>