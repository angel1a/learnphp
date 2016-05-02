<?php
    /**
    * Class TodoList
    */
    class TodoList
    {
        public function addItem($item)
        {
            $_SESSION['TodoList'][] = $item;
        }

        public function editItem($position, $item)
        {
            $_SESSION['TodoList'][$position - 1] = $item;
        }

        public function removeItem($position)
        {
            unset($_SESSION['TodoList'][$position - 1]);
        }
    }

    $list = new TodoList();
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['addItem'])) {
            $list->addItem($_POST['addItem']);
        }
        if (!empty($_POST['editPosition'])) {
            $list->editItem($_POST['editPosition'], $_POST["editItem{$_POST['editPosition']}"]);
        }
        if (!empty($_POST['removePosition'])) {
            $list->removeItem($_POST['removePosition']);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>A Simple Todo List</title>
</head>
<body>
    <header>
        <form name="logout" action="logout.php">
            欢迎 <?= $_SESSION['username'] ?>
            <button>登出</button>
        </form>
    </header>
    <p>
        <form method="post" action="todo.php">
            <input name="addItem" type="text" placeholder="你想做些什么呢？">
            <button>添加</button>
        </form>
    </p>
    <form method="post" action="todo.php">
        <?php foreach ((array)$_SESSION['TodoList'] as $key => $item): ?>
            <input type="checkbox">
            <input name="editItem<?= $key + 1 ?>" type="text" value="<?= $item ?>">
            <button name="editPosition" value="<?= $key + 1 ?>">保存修改</button>
            <button name="removePosition" value="<?= $key + 1 ?>">删除</button>
            <br />
        <?php endforeach ?>
    </form>
</body>
</html>
