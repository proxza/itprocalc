<?php
/**
 * Created by PhpStorm.
 * User: n00bdetected
 * Date: 14.11.2017
 * Time: 20:59
 */

if (isset($_REQUEST['submit'])) {
    if ($_REQUEST['pc_col'] == ''){
        $error = 2;
    }else{
        $error = 0;
    }
}else{
    $error = 1;
}
?>

<html>
<head>
    <title>IT Pro Dnipro Calc (alpha)</title>
    <style>
        body {
            font-family: "Verdana, Arial, Helvetica, sans-serif";
            font-size: 14px;
        }
    </style>
</head>

<body>

<?php

if ($error == 2) {
    echo "<p>Вы не ввели количество ПК!</p>";
    echo "<p><a href='itcalc.php'>Вернуться</a></p>";
}

if ($error == 1) {

?>
<table>
    <form action="itcalc.php" method="post">
        <tr>
            <td>Количество ПК: <input type="text" name="pc_col"></td>
        </tr>
        <tr>
            <td>Тип ПК: <input type="text" disabled name="pc_type" value="Офисный"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Посчитать"></td>
        </tr>
    </form>
</table>

<?php

}

if ($error == 0) {
    echo "<p>" . calc($_REQUEST['pc_col']) . "</p>";
    echo "<p><a href='itcalc.php'>Вернуться</a></p>";

}


function calc($pc_col)
{
    // Малый бизнес
    if ($pc_col <= 4) {
        $val = $pc_col * 300;
        echo "Так как у вас малый бизнес, стоимость обслуживания стоит: " . $val . "грн за " . $pc_col . " ПК";
        return;
    }

    if ($pc_col >= 5 && $pc_col <= 20) {
        $val = $pc_col * 200;
        echo "У вас 33% скидки <br />";
        echo "Так как у вас средний бизнес, стоимость обслуживания стоит: " . $val . "грн за " . $pc_col . " ПК";
        return;
    }

    if ($pc_col >= 21 && $pc_col <= 50) {
        $val = $pc_col * 150;
        echo "У вас 50% скидки <br />";
        echo "Так как у вас крупный бизнес, стоимость обслуживания стоит: " . $val . "грн за " . $pc_col . " ПК";
        return;
    } else {
        echo "Извините, для обслуживания более 50 ПК стоимость и условия обслуживания обсуждается индивидуально.";
        return;
    }
}

?>

</body>
</html>
