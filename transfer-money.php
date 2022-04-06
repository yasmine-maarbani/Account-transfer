<?php
session_start();
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
    <form action="transfer-money.php" method="post">
        <table>
            <tr>
                <td>Account Source </td>
                <td><input type="text" name="acc_source" /></td>
            </tr>
            <tr>
                <td>Account Destination</td>
                <td><input type="text" name="acc_dest" /></td>
            </tr>
            <tr>
                <td> Quantity </td>
                <td><input type="text" name="quant" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="transfer" value=" transfer" /></td>
            </tr>
        </table>
    </form>
    <?php
    $quant = $_POST["quant"];
    $acc_dest = $_POST["acc_dest"];
    $acc_source = $_POST["acc_source"];
    if (!empty($_SESSION['accounts'])) {
        if (isset($_SESSION['accounts'][$acc_dest]) && isset($_SESSION['accounts'][$acc_source])) {
            if ($_SESSION['accounts'][$acc_source] > $quant) {
                $_SESSION['accounts'][$acc_dest]["balance"] += $quant;
                $_SESSION['accounts'][$acc_source]["balance"] -= $quant;
            }
        }

        // foreach ($_SESSION as $key => $value) {
        //     if ($key == $_POST["acc_dest"]) {
        //         $value["balance"] += $quant;
        //     }
        // }
    } else {
        echo "";
    }

    ?>
</body>

</html>