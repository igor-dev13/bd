<?php
require_once "include/orm/rb.php";
require_once "include/header/header.php";
?>

<?php if (isset($_GET["delete"]) && isset($_GET["management_id"])) {
    $management_id = $_GET["management_id"];
    $management = R::load('apartment_management', $management_id);
    R::trash($management);
    header("Location: http://bd/management.php");
}

$district = $_POST["district"];
$address = $_POST["address"];
$name = $_POST["name"];

$management="";

if (isset($_POST["new"]) && !empty($district) && !empty($address) && !empty($name)) {
    echo "asd1";
    // $management = R::dispense( 'apartment_management');
    $management = R::load( 'apartment_management', -1 );
    echo "asd2";
}

if (isset($_POST["id"])) {
    $management_id = $_POST["id"];
    $management = R::load( 'apartment_management', $management_id );
}

$management->district = $district;
$management->address = $address;
$management->name = $name;

$id =R::store( $management );
echo $id;

header("Location: http://bd/management.php");
die();
