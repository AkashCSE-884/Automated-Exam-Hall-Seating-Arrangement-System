<?php
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = postgres";
   $credentials = "user = postgres password=123";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {


      echo "Error : Unable to open database\n";
   } else {
    $sql = "select * from test.tbuser";
    $ret = pg_query($db, $sql);
       echo $ret;
       while($row = pg_fetch_row($ret)) {
        echo $row['1'];
       }
    echo "Opened database successfully\n";
   }