<?php
 echo ' ' . $_POST['id_order'] . ' ' . $_POST['id_prod'];

$conn = new mysqli('localhost', 'root', '', 'grafix_database');
$sql = "delete from cart where id_prod='$_POST[id_prod]' and id_order=$_POST[id_order]";
$wynik= $conn->query($sql);
echo 'usunieto recordow: ' . $conn->affected_rows;
header("Location: ./create_order.php");
exit();