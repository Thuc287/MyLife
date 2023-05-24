<?php
$action = "";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
$actionB = "";
if (isset($_GET['actionB'])) {
    $actionB = $_GET['actionB'];
}
$period = "";
if (isset($_GET['period'])) {
    $period = $_GET['period'];
}
$game = "";
if (isset($_GET['game'])) {
    $game = $_GET['game'];
}
if ($action == 'post_update' || $action == 'post_insert') {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $detail = $_POST['detail'];
}
if ($game == 'all') {
    header("location:/Controller/C_Ticket.php");
}
if ($period == 'all') {
    header("location:/Controller/C_Ticket.php?action=indexByGame&game=$game");
}
if ($action == 'indexByGame') {
    $sql = "Select * From ticket WHERE game= '$game'";
} elseif ($action=='indexByGameAndPeriod') {
    $sql = "Select * FROM ticket where game='$game' AND period='$period'";
}else {
    $sql = "Select * FROM ticket";
}

include_once("../Html/Admin/header.php");
include_once("../connect.php");
require_once("../Model/M_Ticket.php");

//lấy total_page cho duôi;
    $result = $conn->query($sql);
    $total_records = $result->num_rows;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } elseif ($current_page < 1) {
        $current_page = 1;
    }

$ticket = new Model_Ticket();
switch ($action) {
    case 'indexByGame':
    case 'indexByGameAndPeriod':
        $Ticket = $ticket->indexTicket($conn, $sql);
        $Period=$ticket->period($conn,$game);
        include_once("../View/V_Ticket/IndexTicket.php");
        break;
    default;
        $Ticket = $ticket->indexTicket($conn, $sql);
        include_once("../View/V_Ticket/IndexTicket.php");
        break;
}
include_once("../Html/Admin/fooder.php");
?>
