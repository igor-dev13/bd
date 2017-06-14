<?php
require_once "include/orm/rb.php";
require_once "include/header/header.php";
?>

<?php if (isset($_GET["new"])) :?>

    <h2>Введите данные квартиры:</h2>
    <form action="<?php echo htmlspecialchars("apartment_result.php"); ?>" method="post">
        <table>
            <tr>
                <td> ФИО:</td>
                <td><input type="text" name="fio"></td>
            </tr>
            <tr>
                <td>Площадь квартиры:</td>
                <td><input type="text" name="square"></td>
            </tr>
            <tr>
                <td>Количество проживающих:</td>
                <td><input type="text" name="number_of_residence"></td>
            </tr>
            <tr>
                <td>Адрес:</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td>Домоуправление N:</td>
                <td><input type="text" name="apartment_management_id"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="new" value="1"></td>
            </tr>
        </table>
        <input style="margin: 20px 0;" type="submit" name="submit" value="Отправить">
    </form>

<?php else:?>

    <?php if (isset($_GET["apartment_id"])) :?>
        <?php  $apartment = R::findOne( 'apartment', ' id = ? ', [$_GET["apartment_id"] ]); ?>

        <h2>Данные квартиры N: <?php echo $apartment['id']?></h2>
        <form action="<?php echo htmlspecialchars("apartment_result.php"); ?>" method="post">
            <table>
                <tr>
                    <td> ФИО:</td>
                    <td><input type="text" name="fio" value="<?= $apartment['fio']?>"></td>
                </tr>
                <tr>
                    <td>Площадь квартиры:</td>
                    <td><input type="text" name="square" value="<?= $apartment['square']?>"></td>
                </tr>
                <tr>
                    <td>Количество проживающих:</td>
                    <td><input type="text" name="number_of_residence" value="<?= $apartment['number_of_residence']?>"></td>
                </tr>
                <tr>
                    <td>Адрес:</td>
                    <td><input type="text" name="address" value="<?= $apartment['address']?>"></td>
                </tr>
                <tr>
                    <td>Домоуправление N:</td>
                    <td><input type="text" name="apartment_management_id" value="<?= $apartment['apartment_management_id']?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?= $apartment['id']?>"></td>
                </tr>
            </table>
            <input style="margin: 20px 0;" type="submit" name="submit" value="Изменить">
        </form>
    <?php endif;?>

<?php endif;?>

