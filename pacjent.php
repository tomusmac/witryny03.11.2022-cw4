<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia</title>
    <link rel="stylesheet" href="przychodnia.css">
</head>
<body>
<div class="baner">
<h1>PRAKTYKA LEKARZA RODZINNEGO</h1>
</div>
<div class="lewy">
<h3>LISTA PACJENTÓW</h3>
<br><br>
<form action="pacjent.php" method="post">
<?php skrypt1();?>
Podaj id<br><input type="number" name="liczba" id="liczba">
<input type="submit" value="Pokaż dane">
</form>
<h3>LEKARZE</h3>
<ul>
  <li>pn-śr</li>
  <ol>
    <li>Anna Kwiatkowska</li>
    <li>Jan Kowalski</li>
  </ol>
  <li>czw-pt</li>
    <ol>
      <li>Krzysztof Nowak</li>
    </ol>
  </li>
</ul>
</div>
<div class="prawy">
<h2>INFORMACJE SZCZEGÓŁOWE O PACJENCIE</h2>
<?php if(isset($_POST['liczba'])) {
  skrypt2();} ?>
</div>
<div class="stopka">
<p>utworzone przez: Tomasz Macura</p>
<a href="kwerendy.txt">Pobierz plik z kwerendami</a>
</div>
<?php

function skrypt1() {
  $conn = mysqli_connect("localhost", "root", "", "przychodnia");
  $query = "select id,imie,nazwisko from Pacjenci";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)) {
      $id = $row["id"];
      $imie = $row["imie"];
      $nazwisko = $row["nazwisko"];
      echo "$id $imie $nazwisko<br>";
  }
}
function skrypt2() {
  $idd = $_POST['liczba'];
  $conn = mysqli_connect("localhost", "root", "", "przychodnia");
  $query = "select imie,nazwisko,choroby_przewlekle,uczulenia from Pacjenci where id=$idd";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)) {
      $imie = $row["imie"];
      $nazwisko = $row["nazwisko"];
      $choroby = $row["choroby_przewlekle"];
      $uczulenia = $row["uczulenia"];
      echo "Imie i nazwisko: $imie $nazwisko<br>";
      echo "Choroby przewlekłe: $choroby<br>";
      echo "Uczulenia: $uczulenia<br>";
  }
}
?>
</body>
</html>