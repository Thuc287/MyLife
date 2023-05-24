<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$idStaff = "";
if (isset($_GET['idStaff'])) {
    $_SESSION['idStaff'] = $_GET['idStaff'];
}
$idStaff = $_SESSION['idStaff'];
$action = "";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
//bill
if (!isset($_SESSION['buy'])) {
    $_SESSION['buy'] = 0;
}
if (!isset($_SESSION['reward'])) {
    $_SESSION['reward'] = 0;
}
if (!isset($_SESSION['slreward'])) {
    $_SESSION['slreward'] = 0;
}
//report
if (!isset($_SESSION['report_Buy'])) {
    $_SESSION['report_Buy'] = 0;
}
if (!isset($_SESSION['report_Reward'])) {
    $_SESSION['report_Reward'] = 0;
}
if (!isset($_SESSION['report_slreward'])) {
    $_SESSION['report_slreward'] = 0;
}
$actionB = "";
if (isset($_GET['actionB'])) {
    $actionB = $_GET['actionB'];
}
function function_alert($message)
{
    echo "<script>alert('$message');</script>";
}
if ($actionB) {
    function_alert('Limit Không được phép bán vé!');
}

include_once("../connect.php");
include_once("../Model/M_Result.php");
require_once("../Model/M_Sell.php");
$sell = new Model_Sell();
//Lấy kì hiện tại
$periodF99 = ($sell->period($conn, 'F99')) + 1;
$periodF999 = ($sell->period($conn, 'F999')) + 1;
//Lay result hien tai
$resultF99 = $sell->result($conn, 'F99');
$resultF999 = $sell->result($conn, 'F999');
//
$idTicket = ($sell->idTicket($conn)) + 1;
//Lấy limit bán hàng
$result = $conn->query("SELECT * FROM Staff Where id=" . $idStaff);
$Limit = $result->fetch_assoc();
$limit = $Limit['limitt'];
include_once("../Html/Sell/header.php");
//Action điều hướng
switch ($action) {
    case 'F99':
    case 'F999':
        include_once("../View/V_Sell/Buy.php");
        break;
    case 'buy99':
        if ($limit >= 2) {
            $sell->buyTicket($conn, 'F99', $periodF99, $idStaff);
            $_SESSION['buy']++;
            header("location:/Controller/C_Sell.php?action=ticket");
        } else {
            header("location:/Controller/C_Sell.php?actionB=alert");
        }
        break;
    case 'buy999':
        if ($limit >= 2) {
            $sell->buyTicket($conn, 'F999', $periodF999, $idStaff);
            $_SESSION['buy']++;
            header("location:/Controller/C_Sell.php?action=ticket");
        } else {
            header("location:/Controller/C_Sell.php?actionB=alert");
        }
        break;
    case 'reward':
        include_once('../View/V_Sell/Reward.php');
        break;
    case 'post_reward':
        $Reward = $sell->reward($conn, $idStaff);
        if ($Reward == 'no_prize') {
            $conten='No prize !';
            include_once("../View/V_Sell/Alert.php");
        } elseif ($Reward == 'no_exit') {
            $conten='No exit !';
            include_once("../View/V_Sell/Alert.php");
        } elseif ($Reward == 'shoot_yet') {
            $conten='Its not time to shoot yet !';
            include_once("../View/V_Sell/Alert.php");
        } else {
            $_SESSION['slreward']++;
            $_SESSION['reward'] += $Reward;
            $conten='Vé trúng : ' .$Reward.' $';
            include_once("../View/V_Sell/Alert.php");
        }
        break;
    case 'bill':
        $bill = ($_SESSION['buy'] * 2) - ($_SESSION['reward']);
        $_SESSION['report_Buy'] += $_SESSION['buy'];
        $_SESSION['report_slreward'] += $_SESSION['slreward'];
        $_SESSION['report_Reward'] += $_SESSION['reward'];
        include_once("../View/V_Sell/Bill.php");
        break;
    case 'deleteBill':
        $_SESSION['buy'] = 0;
        $_SESSION['reward'] = 0;
        $_SESSION['slreward'] = 0;
        header("location:/Controller/C_Sell.php");
        break;
    case 'ticket':
        $Ticket = $sell->showTicket($conn);
        include_once("../View/V_Sell/Ticket.php");
        break;
    case 'report':
    case 'log_out':
        $rose = $_SESSION['report_Buy'] * 2 * 0.14;
        include_once("../View/V_Sell/Report.php");
        break;
    case 'post_log_out':
        session_destroy();
        header("location:/index.php");
        break;
    case 'result99':
        $result = new Model_Result();
        $sql = "Select * From F99 ";
        $Result = $result->indexResult($conn, $sql);
        include_once("../View/V_Sell/Result.php");
        break;
    case 'result999':
        $result = new Model_Result();
        $sql = "Select * From F999 ";
        $Result = $result->indexResult($conn,$sql);
        include_once("../View/V_Sell/Result.php");
        break;
    default;
        include_once("../View/V_Sell/Main.php");
        break;
}
include_once("../Html/Sell/fooder.php");
?>
