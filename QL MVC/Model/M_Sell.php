<?php
class Model_Sell
{
  private $idStaff;
  private $reward;
  private $bill;
  private $buy;
  public function _construct($idStaff, $reward, $bill, $buy)
  {
    $this->idStaff = $idStaff;
    $this->reward = $reward;
    $this->bill = $bill;
    $this->buy = $buy;
  }
  function period($conn, $game)
  {
    $sql = "SELECT * FROM $game WHERE period=(SELECT MAX(period) FROM $game);";
    $result = $conn->query($sql);
    $Period = $result->fetch_assoc();
    return $Period['period'];
  }
  function result($conn, $game)
  {
    $sql = "SELECT * FROM $game WHERE period=(SELECT MAX(period) FROM $game);";
    $result = $conn->query($sql);
    $Result = $result->fetch_assoc();
    return $Result['result'];
  }
  function idTicket($conn)
  {
    $sql = "SELECT id FROM ticket WHERE id=(SELECT MAX(id) FROM ticket);";
    $result = $conn->query($sql);
    $IdTicket = $result->fetch_assoc();
    return $IdTicket['id'];
  }
  public function buyTicket($conn, $game, $period, $idStaff)
  {
    $number = $_POST['number'];
    $sql = "INSERT INTO Ticket (number,period,game) VALUES ($number,$period ,'$game')";
    $conn->query($sql);
    $sql2 = "UPDATE staff SET limitt = limitt-2 , rose = rose+0.28  WHERE id = $idStaff";
    $conn->query($sql2);
  }
  public function reward($conn, $idStaff)
  {
    $id = $_POST['id']; //lấy munber, game và kì quay;
    $sql = "SELECT * From ticket WHERE id=" . $id;
    $result = $conn->query($sql);
    $ticket = $result->fetch_assoc();

    if ($ticket != null) { //lấy kết quả của kì quay;
      $period1 = $this->period($conn,$ticket['game']);
      if($ticket['period'] > $period1){
        return 'shoot_yet';
      }
      $sql1 = "SELECT * From $ticket[game] WHERE period=$ticket[period];";
      $result1 = $conn->query($sql1);
      $Result = $result1->fetch_assoc();
      if ($ticket['number'] == $Result['result']) {
        $sql5 = "Delete From ticket WHERE Id =" . $id;
        $conn->query($sql5);
        $sql6 = "UPDATE staff SET limitt = limitt + $Result[prize]  WHERE id =" . $idStaff;
        $conn->query($sql6);
        return $Result['prize'];
      } else {
        return 'no_prize';
      }
    } else {
      return 'no_exit';
    }
  }
public function showTicket($conn)
{
  $sql = "SELECT * FROM ticket WHERE id=(SELECT MAX(id) FROM ticket);";
  $result = $conn->query($sql);
  $Ticket = $result->fetch_assoc();
  return $Ticket;
}
  public function bill($conn)
  {

  }
  function report($conn, $sql)
  {

  }
}
?>
