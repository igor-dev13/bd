<?php
require "predis/autoload.php";
Predis\Autoloader::register();

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "redis-13145.c9.us-east-1-2.ec2.cloud.redislabs.com",
    "port" => 13145));

$key = 'students';

if (isset($_POST["new"]) && (isset($_POST["fio"]))) {
    $redis->hmset($key, [
        $_POST["fio"] => 0
    ]);
}

if ($_GET["vote"] == 2 && isset($_GET["fio"])) {
    $redis->hincrby($key, $_GET["fio"], 1);
}

if ($_GET["vote"] == 1 && isset($_GET["fio"])) {
    $oldValue = $redis->hget($key, $_GET["fio"]);
    $redis->hset($key, $_GET["fio"], $oldValue - 1);
}

if (isset($_GET["delete"]) && isset($_GET["fio"])) {
  $redis->hdel($key, $_GET["fio"]);
}

header("Location: http://redis/index.php");
die();



