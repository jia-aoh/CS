<?php
    include("bradapis.php");
    session_start();

    if (isset($_POST["account"])) {
        $account = $_POST['account']; $passwd = $_POST['passwd'];

        $sql = 'SELECT id,account,passwd,name,icon FROM member ' . 
            'WHERE account = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $account);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id,$account,
                                $hashPasswd,$name,$icon);
            $stmt->fetch();
            // if (password_verify($passwd, $hashPasswd)) {
                if ($passwd == $hashPasswd) {
                $member = new Member($id, $account, $name, $icon);
                $_SESSION['member'] = $member; //帶物件過去
                header('Location: 60_main.php');
            }
        }
    }
?>

<form method="post">
    Account: <input name="account" /><br />
    Password: <input type="password" name="passwd" /><br />
    <input type="submit" value="Login" />
</form>
