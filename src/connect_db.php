<?php
  try
  { 
    $db = new PDO('mysql:host=localhost;port=6033;dbname=mds_db', 'root', '');
  }
  catch (PDOException $e) 
  {
    echo 'Error connecting to database server:<br />';
    echo $e->getMessage();
    exit;
  } 
?>