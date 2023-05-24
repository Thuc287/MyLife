<?php
class Model_Staff
{
  private $id;
  private $password;
  private $name;
  private $cccd;
  private $limitt;
  private $rose;
  public function _construct($id, $password, $limitt, $rose, $name, $cccd)
  {
    $this->id = $id;
    $this->password = $password;
    $this->limitt = $limitt;
    $this->rose = $rose;
    $this->name = $name;
    $this->cccd = $cccd;
  }
  public function indexStaff($conn)
  {
    $sql = "Select * FROM staff";
    $result = $conn->query($sql);
    $total_records= $result->num_rows;
    $current_page = isset($_GET['page'])? $_GET['page'] : 1;
    $limit = 10;
    $total_page = ceil($total_records/$limit);
    if ($current_page > $total_page) {
        $current_page=$total_page;
    }elseif ($current_page<1) {
        $current_page=1;
    }
    $start = ($current_page-1)*$limit;

    $StaffTest = $conn->query($sql);
    if (($StaffTest->num_rows) != null) {
      $Staff=$conn->query($sql ." LIMIT ". $start.",$limit");
        return $Staff;
    }else {
        return $StaffTest;
    }
  }
  public function getDetailStaff($conn, $action, $sql)
  {
    $Staff = array();
    if ($action != 'insert') {
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          if ($action == "update") {
            $Staff = $row;
          } else {
            array_push($Staff, $row);
          }
        }
      }
    } else {
      $Staff = array(
        "id" => "",
        "password" => "",
        "limitt" => "",
        "rose" => "",
        "name" => "",
        "cccd" => "",
      );
    }
    return $Staff;
  }
  public function insertStaff($conn)
  {
    $name= $_POST['name'];
    $cccd= $_POST['cccd'];
    $password = $_POST['password'];
    $limit = $_POST['limitt'];
    $rose = 0;
    $sql = "INSERT INTO `staff`( `name`, `password`, `limitt`, `cccd`, `rose`) VALUES ('$name','$password','$limit','$cccd','$rose')";
    $conn->query($sql);
  }
  public function updateStaff($conn)
  {
    $id = $_GET['id'];
    $name= $_POST['name'];
    $password = $_POST['password'];
    $limit = $_POST['limitt'];
    $sql = "UPDATE staff SET name='$name', password='$password', limitt=$limit WHERE id = $id";
    $conn->query($sql);
  }
  public function deleteStaff($conn)
  {
    $id = $_GET['id'];
    $sql = "Delete From staff WHERE Id =" . $id;
    $conn->query($sql);
  }
 public function pay($conn)
 {
    $id = $_GET['id'];
    $rose=ceil($_GET['rose']);
    $sql2 = "UPDATE staff SET limitt = limitt+$rose , rose=0  WHERE id = $id";
    $conn->query($sql2);
 }
  }
?>
