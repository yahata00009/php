<?php
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

$address = "";
// var_dump($address);
?>

<body>
    <form action="index.php">
        <input type="text">
    </form>
</body>