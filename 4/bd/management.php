<?php
require_once "include/orm/rb.php";
require_once "include/header/header.php";

$managements = R::getAll( 'SELECT * FROM apartment_management' );
?>
<div style="margin: 20px 0;"><a href="apartment.php?">Квартиры</a></div>
<div style="margin: 20px 0;"><a href="management_edit.php?new">Добавить домоуправление</a></div>

<?php foreach( $managements as $management ): ?>
    <div style="margin-bottom: 2px;">Район - <?=  $management['district'];?>&nbsp;&nbsp;<a href="management_edit.php?management_id=<?=  $management['id'];?>">Изменить</a>&nbsp;&nbsp;<a href="management_result.php?management_id=<?=  $management['id'];?>&delete=1">Удалить</a></div>
    <div style="margin-bottom: 2px;">Адрес - <?=  $management['address'];?></div>
    <div style="margin-bottom: 16px;">Название - <?=  $management['name'];?></div>
<?php endforeach; ?>