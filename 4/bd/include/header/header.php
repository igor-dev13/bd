<?php
error_reporting(0);
session_start();
$login = false;

if (!isset($_SESSION['login_user'])) {

    if (empty($_POST["login"])) {
        echo "Login is required" . "<br/>";
    } else {
        $login = $_POST["login"];
    }

    if (empty($_POST["password"])) {
        echo "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if ($login && $password) {
        $user = R::findOne('user', ' login = ? and password = ? ', [$login, md5($password)]);

        if (isset($user->login)) {
            // Store Session Data
            $_SESSION['login_user'] = $login;
        } else {
            echo "Пользователь с логином " . $login . " не найден <br/>";
        }
    }
}

if (isset($_SESSION['login_user'])) {

    if (isset($_GET["logout"])) {
        unset($_SESSION['login_user']);
        header("Location: http://bd/index.php");
        exit();
    }

    echo "Привет \"" . $_SESSION['login_user'] . "\" ! <br/>";
    echo "<a href='/?logout'>logout</a><br/>";
}

 if (!isset($_SESSION['login_user'])) :?>
<h2>Please login:</h2>
<form action="<?php echo htmlspecialchars("apartment.php"); ?>" method="post">
    Name: <input type="text" name="login"><br>
    E-mail: <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php endif ;?>

<?php
    if (!isset($_SESSION['login_user'])) {
        exit();
    }
?>

<style>
    a {
        display: inline-block;
        padding: 0 15px;
        text-decoration: none;
        color: #ffffff;
        margin: 3px;
        border-radius: 10px;
        background-color: dimgrey;
        font-size: 14px;
        text-align: center;
        line-height: 28px;
    }
</style>



