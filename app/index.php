<?php

$mysql = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'));

if ($mysql->connect_errno) {
  echo "Error: {$mysql->connect_errno} - {$mysql->connect_error}";
  exit(1);
}

$res = $mysql->query('SELECT @@hostname');

while ($rs = $res->fetch_row())
  echo "<h1>{$rs[0]}</h1>";
