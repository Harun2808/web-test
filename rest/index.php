<?php
  require "../vendor/autoload.php";
  require "./services/MidtermService.php";

  Flight::register('midtermService', 'MidtermService');

  require 'routes/MidtermRoutes.php';

  $midtermDao = new MidtermDao([
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'ispit'
  ]);

  Flight::route('/rest/connection-check', function() use($midtermDao) {
    echo $midtermDao->check_connection();
  });

  Flight::route('/rest/cap-table', function() use($midtermDao) {
    header('Content-Type: application/json');
    $data = $midtermDao->cap_table();
    echo json_encode($data);
  });

  Flight::route('/rest/summary', function() {

  });

  Flight::route('/rest/investors', function() {

  });

  Flight::start();
?>
