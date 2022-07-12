<?php
session_start();
$pageFlag = 0;

if(!empty($_POST['btn_confirm'])){
    $pageFlag = 1;
}
if(!empty($_POST['btn_submit'])){
    $pageFlag = 2;
}

function h($str){
    // var_dump($str);
    return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($pageFlag === 0) : ?>
        <?php
        if(!isset($_SESSION['csrfToken'])){
            $csrfToken = bin2hex(random_bytes(32));
            $_SESSION['csrfToken'] = $csrfToken;
        }
        $token = $_SESSION['csrfToken'];
        ?>

        入力画面
        <form method="POST" action="form.php">

            <label for="">氏名</label>
            <input type="text" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
            <label for="">email</label>
            <input type="email" name="email" value="<?php echo h($_POST['email']); ?>">
            <input type="submit" name="btn_confirm" value="送信">
            <input type="hidden" name="csrf" value="<?php echo $token?>">
        </form>
    <?php endif; ?>


    <?php
    if ($pageFlag === 1) : ?>
        確認画面
        <?php if($_POST['csrf'] === $_SESSION['csrfToken'])?>
        <form method="POST" action="form.php">
            <label for="">氏名</label>
            <?php echo $_POST['your_name']; ?>
            <label for="">email</label>
            <?php echo $_POST['email']; ?>

            <input type="submit" name="back" value="戻ります">
            <input type="submit" name="btn_submit" value="送信するよ">
            <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
            <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
        </form>
    <?php endif; ?>

    <?php
    if ($pageFlag === 2) : ?>
        完了画面
        <?php echo h($_POST['your_name']); ?>
        <?php echo h($_POST['email']); ?>
    <?php endif; ?>
</body>

</html>