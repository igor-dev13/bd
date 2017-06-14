<?php

require_once "include/orm/rb.php";
require_once "include/header/header.php";

if (($_GET["r"] == 1)) {
    echo "1. Имена всех мастеров котор обслуж. квартиры в жеке с адресом гомзово.<br/>";
    $request1 = R::getAll( 'SELECT DISTINCT
    master.fio
  FROM
    apartment
	INNER JOIN apartment_management
	  ON apartment_management.id = apartment.apartment_management_id
	INNER JOIN counter
	  ON counter.apartment_id = apartment.id
	INNER JOIN service_tarif
	  ON service_tarif.id = counter.service_tarif_id
	INNER JOIN service
	  ON service.id = service_tarif.service_id
	INNER JOIN master
	  ON master.id = service.master_id
  WHERE
    apartment_management.district = "Девятый микрорайон";' );

foreach( $request1 as $request ): ?>
    <div style="margin-bottom: 4px;"><?= $request['fio'] ?></div>
<?php endforeach;
}
?>

<?php
if (($_GET["r"] == 2)) {
    echo "2. Вывести фио всех владельцов квартир у котор долг выше чем 1000 руб. и у котор. счетчик
в 2013 году за электричество превысил значение 1000 <br/>";

    $request2 = R::getAll('SELECT
  DISTINCT fio
FROM
  apartment
  INNER JOIN debt
    ON debt.apartment_id = apartment.id
  INNER JOIN counter
    ON counter.apartment_id = apartment.id
  INNER JOIN service_tarif
    ON service_tarif.id = counter.service_tarif_id
  INNER JOIN service
    ON service.id = service_tarif.service_id
  WHERE
    debt.amount > 1000
	  AND service.name = "Электричество"
	  AND counter.date < "2013-05-00"
      AND counter.value > 1000;');

    foreach ($request2 as $request): ?>
        <div style="margin-bottom: 4px;"><?= $request['fio'] ?></div>
    <?php endforeach;
}
?>

<?php
if (($_GET["r"] == 3)) {
    echo "3. ДЛя каждого ТСЖ найти количество квартир у которых есть долг. > 0";

    $request3 = R::getAll( 'SELECT
  apartment_management.name,
  COUNT(apartment.id)
FROM
  apartment
  INNER JOIN apartment_management
    ON apartment_management.id = apartment.apartment_management_id
  INNER JOIN debt
    ON debt.apartment_id = apartment.id
WHERE
  debt.amount > 0
GROUP BY apartment_management.id;' );

?>

<table>
    <tr>
        <td>Название</td>
        <td>Количество</td>
    </tr>
    <?php foreach( $request3 as $request ): ?>
        <tr>
            <td><?= $request['name'] ?></td>
            <td><?= $request['COUNT(apartment.id)'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php

}





