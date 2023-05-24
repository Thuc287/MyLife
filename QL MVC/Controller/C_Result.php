<?php
$action = "";
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
$period = "";
if (isset($_GET['period'])) {
  $period = $_GET['period'];
}
$game = "";
if (isset($_GET['game'])) {
  $game = $_GET['game'];
}

include_once("../Html/Admin/header.php");
include_once("../connect.php");
include_once("../Model/M_Result.php");

$result = new Model_Result();
switch ($action) {
  case 'update':
  case 'insert':
    $Result = $result->searchResult($conn, $action, $game, $period);
    include_once("../View/V_Result/UpdateResult.php");
    break;
  case 'post_update':
    $result->updateResult($conn, $game);
    header("location:/Controller/C_Result.php");
    break;
  case 'post_insert':
    $result->insertResult($conn, $game);
    header("location:/Controller/C_Result.php");
    break;
  default;
    $result->delete($conn);
    $sql = "Select * From F99 ";
    $F99 = $result->indexResult($conn, $sql);
    $sql1 = "Select * From F999 ";
    $F999 = $result->indexResult($conn, $sql1);
    include_once("../View/V_Result/IndexResult.php");
    break;
}

include_once("../Html/Admin/fooder.php");
?>
