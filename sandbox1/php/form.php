<?php
$pageFlag = 0;

if(!empty($_POST['btn_confirm'])){
    $pageFlag = 1;
}
if(!empty($_POST['btn_submit'])){
    $pageFlag = 2;
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
        入力画面
        <form method="POST" action="form.php">

            <label for="">氏名</label>
            <input type="text" name="your_name">
            <label for="">email</label>
            <input type="email" name="email">
            <input type="submit" name="btn_confirm" value="送信">
        </form>
    <?php endif; ?>


    <?php
    if ($pageFlag === 1) : ?>
        確認画面
        <form method="POST" action="form.php">
            <label for="">氏名</label>
            <?php echo $_POST['your_name']; ?>
            <label for="">email</label>
            <?php echo $_POST['email']; ?>

            <input type="submit" name="btn_submit" value="送信するよ">
            <input type="hidden" name="your_name" value="<?php echo $_POST['your_name']; ?>">
            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
        </form>
    <?php endif; ?>

    <?php
    if ($pageFlag === 2) : ?>
        完了画面
        <?php echo $_POST['your_name']; ?>
        <?php echo $_POST['email']; ?>
    <?php endif; ?>
</body>

</html>