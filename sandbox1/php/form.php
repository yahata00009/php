<?php
session_start();

require 'validation.php';
$pageFlag = 0;
$errors = validation($_POST);

if (!empty($_POST)) {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}


if (!empty($_POST['btn_confirm']) && empty($errors)) {
    $pageFlag = 1;
}
if (!empty($_POST['btn_submit'])) {
    $pageFlag = 2;
}


function h($str)
{
    // var_dump($str);
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
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
        if (!isset($_SESSION['csrfToken'])) {
            $csrfToken = bin2hex(random_bytes(32));
            $_SESSION['csrfToken'] = $csrfToken;
        }
        $token = $_SESSION['csrfToken'];
        ?>

        <?php if (!empty($errors) && !empty($_POST['btn_confirm'])) : ?>
            <?php echo '<ul>'; ?>
            <?php
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            ?>
            <?php echo '</ul>'; ?>
        <?php endif; ?>

        入力画面
        <form method="POST" action="form.php">

            <label for="">氏名</label>
            <input type="text" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
            <br>
            <label for="">email</label>
            <input type="text" name="email" value="<?php echo h($_POST['email']); ?>">
            <br>

            <label for="">ホームページ</label>
            <input type="text" name="url" value="<?php echo h($_POST['url']); ?>">
            <br>
            <label for="">性別</label>
            <input type="radio" name="gender" value="0" <?php if (!empty($_POST['gender'] && $_POST['gender'] === "0")) { {
                                                                echo 'checked';
                                                            }
                                                        } ?> checked>
            男性

            <input type="radio" name="gender" value="1" <?php if (!empty($_POST['gender'] && $_POST['gender'] === "1")) { {
                                                                echo 'checked';
                                                            };
                                                        } ?>>女性
            <br>
            <label for="">年齢</label>
            <select name="age" id="">
                <option value="1">~19</option>
                <option value="2">20~29</option>
                <option value="3">30~39</option>
                <option value="4">40~49</option>
                <option value="5">50~59</option>
                <option value="6">60~</option>
            </select>
            <br>
            <textarea name="contact" id="" cols="30" rows="10">
            <?php echo h($_POST['contact']); ?>
            </textarea>
            <br>
            <label for="">注意事項</label>
            <input type="checkbox" name="caution" value="1">



            <input type="submit" name="btn_confirm" value="送信">
            <input type="hidden" name="csrf" value="<?php echo $token ?>">

        </form>
    <?php endif; ?>


    <?php
    if ($pageFlag === 1) : ?>
        確認画面
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
            <form method="POST" action="form.php">
                <label for="">氏名</label>
                <?php echo h($_POST['your_name']); ?>
                <br>
                <label for="">email</label>
                <?php echo h($_POST['email']); ?>
                <br>
                <label for="">ホームページ</label>
                <?php echo h($_POST['url']); ?>
                <br>
                <label for="">性別</label>
                <?php
                if ($_POST['gender'] === 0) {
                    echo "男";
                } else {
                    echo "女";
                }
                ?>
                <br>
                <label for="">年齢</label>
                <?php
                if ($_POST['age'] == 1) {
                    echo "~19";
                };
                if ($_POST['age'] == 2) {
                    echo "20~29";
                };
                if ($_POST['age'] == 3) {
                    echo "30~39";
                };
                if ($_POST['age'] == 4) {
                    echo "40~49";
                };
                if ($_POST['age'] == 5) {
                    echo "50~59";
                };
                if ($_POST['age'] == 6) {
                    echo "60~";
                };
                ?>
                <br>
                <label for="">お問い合わせ内容</label>
                <?php echo h($_POST['contact']); ?>


                <input type="submit" name="back" value="戻ります">
                <input type="submit" name="btn_submit" value="送信するよ">
                <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
                <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
                <input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
                <input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
                <input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
                <input type="hidden" name="contact" value="<?php echo h($_POST['contact']); ?>">
                <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <?php
    if ($pageFlag === 2) : ?>
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
            完了画面
            <?php echo h($_POST['your_name']); ?>
            <?php echo h($_POST['email']); ?>
            <?php unset($_SESSION['csrfToken']); ?>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>