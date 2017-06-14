<?php
require "predis/autoload.php";
Predis\Autoloader::register();

$redis = new Predis\Client(array(
	"scheme" => "tcp",
	"host" => "redis-13145.c9.us-east-1-2.ec2.cloud.redislabs.com",
	"port" => 13145));

$key = 'students';

$students = $redis->hgetall($key);
arsort($students);
?>

<style>
	.title {
		font-weight: bold;
		font-size: 18px;
		line-height: 18px;
	}

	a {
		display: inline-block;
		padding: 0 15px;
		line-height: 28px;
		text-align: center;
		background-color: dimgray;
		color: #ffffff;
		text-decoration: none;
		border-radius: 6px;
		margin: 0 5px;
		border: 1px solid transparent;
	}

	a:hover {
		background-color: white;
		color: dimgray;
		border: 1px solid #000;
	}
</style>

<p class="title">Добавить студента</p>
<form action="<?php echo htmlspecialchars("edit.php"); ?>" method="post">
	Фамилия: <input type="text" name="fio"><br>
	<input type="hidden" name="new" value="1"><br>
	<input type="submit" name="submit" value="Submit">
</form>

<p class="title">Весь список студентов</p>
<table>
<?php foreach ($students as $student=>$rating) :?>
	<tr>
		<td><?= $student; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><?= $rating;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><a href="edit.php?vote=2&fio=<?= $student;?>">Голосовать "За"</a></td>
		<td><a href="edit.php?vote=1&fio=<?= $student;?>">Голосовать "Против"</a></td>
		<td><a href="edit.php?delete=1&fio=<?= $student;?>">Удалить</a></td>
	</tr>
<?php endforeach;?>
</table>