<?php
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'test_upload';
 
  $db = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($db->connect_error) {
    echo 'Errno: '.$db->connect_errno;
    echo '<br>';
    echo 'Error: '.$db->connect_error;
    exit();
  }

  echo 'Success: A proper connection to MySQL was made.';
  echo '<br>';
  echo 'Host information: '.$db->host_info;
  echo '<br>';
  echo 'Protocol version: '.$db->protocol_version;


?>