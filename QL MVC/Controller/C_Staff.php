<?php
$action = "";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
function function_alert($message)
{
    echo "<script>alert('$message');</script>";
}
if (isset($_GET['actionB'])=='alert') {
    function_alert('Staff already exits!');
}
include_once("../Html/Admin/header.php");
include_once("../connect.php");
require_once("../Model/M_Staff.php");

$sql = "Select * FROM staff";
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

$staff = new Model_Staff();
switch ($action) {
    case 'update':
    case 'insert':
        $sql = "Select * FROM Staff where id=" . $id;
        $Staff = $staff->getDetailStaff($conn, $action, $sql);
        include_once("../View/V_Staff/UpdateStaff.php");
        break;
    case 'post_update':
            $staff->updateStaff($conn);
            header("location:/Controller/C_Staff.php");
        break;
    case 'post_insert':
        $cccd = $_POST['cccd'];
        $sql = "Select * FROM Staff where cccd='$cccd'";
        $Staff = $staff->getDetailStaff($conn, $action, $sql);
        if ($Staff != null) {
            header("location: " . $_SERVER['HTTP_REFERER']. "&actionB=alert");
        } else {
            $staff->insertStaff($conn);
            header("location:/Controller/C_Staff.php");
        }
        break;
    case 'delete':
        $staff->deleteStaff($conn);
        header("location:/Controller/C_Staff.php");
        break;
    case 'pay':
        if ($_GET['rose'] >= 50) {
            $staff->pay($conn);
            header("location:/Controller/C_Staff.php");
        } else {
            function_alert("Rose tối thiểu 50 $");
            $Staff = $staff->indexStaff($conn);
            include_once("../View/V_Staff/IndexStaff.php");
        }
        break;
    case 'search':
        $sql = "Select * FROM Staff where id=" . $id;
        $Staff = $staff->getDetailStaff($conn, $action, $sql);
        if ($Staff == null) {
            function_alert("Not found Staff Id: " . $id);
            $Staff = $staff->indexStaff($conn);
        }
            include_once("../View/V_Staff/IndexStaff.php");
        break;
    default;
        $Staff = $staff->indexStaff($conn);
        include_once("../View/V_Staff/IndexStaff.php");
        break;
}
include_once("../Html/Admin/fooder.php");
?>
