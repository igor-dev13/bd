<?php
require_once "include/orm/rb.php";
require_once "include/header/header.php";
?>

<?php if (isset($_GET["new"])) :?>

    <h2>Введите данные домоуправления:</h2>
    <form action="<?php echo htmlspecialchars("management_result.php?new"); ?>" method="post">
        <table>
            <tr>
                <td> Район:</td>
                <td><input type="text" name="district"></td>
            </tr>
            <tr>
                <td>Адрес:</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td>Название:</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="new" value="1"></td>
            </tr>
        </table>
        <input style="margin: 20px 0;" type="submit" name="submit" value="Отправить">
    </form>

<?php else:?>

    <?php if (isset($_GET["management_id"])) :?>
        <?php  $management = R::findOne( 'apartment_management', ' id = ? ', [$_GET["management_id"] ]); ?>

        <h2>Данные домоуправления N: <?php echo $management['id']?></h2>
        <form action="<?php echo htmlspecialchars("management_result.php"); ?>" method="post">
            <table>
                <tr>
                    <td> Район:</td>
                    <td><input type="text" name="district" value="<?= $management['district']?>"></td>
                </tr>
                <tr>
                    <td>Адрес:</td>
                    <td><input type="text" name="address" value="<?= $management['address']?>"></td>
                </tr>
                <tr>
                    <td>Название:</td>
                    <td><input type="text" name="name" value="<?= $management['name']?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?= $management['id']?>"></td>
                </tr>
            </table>
            <input style="margin: 20px 0;" type="submit" name="submit" value="Изменить">
        </form>
    <?php endif;?>

<?php endif;?>

