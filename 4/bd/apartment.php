<?php
require_once "include/orm/rb.php";
require_once "include/header/header.php";

$apartments = R::getAll( 'SELECT * FROM apartment' );
?>
<div style="margin: 20px 0;"><a href="management.php?">Домоуправления</a></div>
<div style="margin: 20px 0;"><a href="apartment_edit.php?new">Добавить квартиру</a></div>

<?php foreach( $apartments as $apartment ): ?>
    <div style="margin-bottom: 2px;">ФИО - <?=  $apartment['fio'];?>&nbsp;&nbsp;<a href="apartment_edit.php?apartment_id=<?=  $apartment['id'];?>">Изменить</a>&nbsp;&nbsp;<a href="apartment_result.php?apartment_id=<?=  $apartment['id'];?>&delete=1">Удалить</a></div>
    <div style="margin-bottom: 2px;">Площадь квартиры - <?=  $apartment['square'];?></div>
    <div style="margin-bottom: 2px;">Количество проживающих - <?=  $apartment['number_of_residence'];?></div>
    <div style="margin-bottom: 10px;">Адрес - <?=  $apartment['address'];?></div>
<?php endforeach; ?>



