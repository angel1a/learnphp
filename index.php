<?php
    include 'login.php';
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>登陆</title>
</head>
<body>
    <p style="color:red">
        <?php
            if (isset($errorMessage)) {
                echo $errorMessage;
                unset($errorMessage);
            }
        ?>
    </p>
    <form name="login" method="post" action="login.php">
        <p>
            <label>用户名：</label>
            <input name="username" type="text">
        </p>
        <p>
            <label>密码：</label>
            <input name="password" type="password">
        </p>
        <button>登陆</button>
    </form>
    <p style="color:grey">* 用户名和密码均为accn。</p>
</body>
</html>
