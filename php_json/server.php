<?php

  // Receive the JSON and log it for debugging
  $json = file_get_contents("php://input");
  $json_log_file = "/var/log/log_file.log";

  // log raw json to feeder.text - used for debugging
  file_put_contents($json_log_file, $json . "\n", FILE_APPEND );

  // Connect to the mysql database;
  $db_host = "database_host";
  $db_user = "database_user";
  $db_pass = "database_password";
  $db_name = "database_name";
  $db_conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

  if($db_conn->connect_errno)
  {
         echo '{ "error": "'.$db_conn->connect_error.'" } ';
  }
  else
  {
        // load $entry with the submitted json values
        $request = json_decode($json, true);

        $sql = 'INSERT INTO visit ( field1,
                                    field2,
                                    field3,
                                    field4)
                  VALUES('    .'"'.$request['field1'].'",'
                              .'"'.$request['field2'].'",'
                              .'"'.$request['field3'].'",'
                              .$request['field4'].
                 .');';
        $db_conn->query($sql);

        echo '{ "record_id": '. $db_conn->insert_id . ' }';
         
        $db_conn->close();
  }

?>
