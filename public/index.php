<?php
require_once('./vendor/autoload.php');
require_once('./functions.php');

session_start();
if (isset($_POST['submit']) && !isset($_SESSION['logged_in'])) {
    if (
        !isset($_POST['username'])
        || empty($_POST['username'])
        || !isset($_POST['password'])
        || empty($_POST['password'])
    ) {
        echo "Username/password must not be empty!";
        exit;
    }

    $check = login($_POST['username'], $_POST['password']);
    if ($check) {
        echo "Logged In!";
    } else {
        echo "Username or password is wrong!";
    }
}

if (!isset($_SESSION['logged_in'])) :
?>

    <h2>Hello!</h2>

    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
<?php
else :
?>
    <h2>Hello Bro!</h2>
    <a href="logout.php">Logout</a>
<?php
endif;
?>