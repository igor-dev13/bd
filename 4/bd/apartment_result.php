<?php
require_once "include/orm/rb.php";
require_once "include/header/header.php";
?>

<?php if (isset($_GET["delete"]) && isset($_GET["apartment_id"])) {
    $apartment_id = $_GET["apartment_id"];
    $apartment = R::load('apartment', $apartment_id);
    R::trash($apartment);
    header("Location: http://bd/apartment.php");
}

$fio = $_POST["fio"];
$square = $_POST["square"];
$number_of_residence = $_POST["number_of_residence"];
$address = $_POST["address"];
$apartment_management_id = $_POST['apartment_management_id'];

$apartment="";

if (isset($_POST["new"]) && !empty($fio) && !empty($square) && !empty($number_of_residence) && !empty($address) && !empty($apartment_management_id)) {
    $apartment = R::dispense( 'apartment' );
}

if (isset($_POST["id"])) {
    $apartment_id = $_POST["id"];
    $apartment = R::load( 'apartment', $apartment_id );
}

$apartment->square = $square;
$apartment->fio = $fio;
$apartment->number_of_residence = $number_of_residence;
$apartment->address = $address;
$apartment->apartment_management_id = $apartment_management_id;
$id =R::store( $apartment );
echo $id;

header("Location: http://bd/apartment.php");
die();
