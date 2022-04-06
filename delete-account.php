<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>main</title>
</head>

<body>
    <table>
        <tr>
            <th>Account Number</th>
            <th>Account Name</th>
            <th>Balance</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($_SESSION['accounts'] as $acc) {
            echo "<tr>";
            echo "<td>" . $acc["num"] . "</td>";
            echo "<td>" . $acc["name"] . "</td>";
            echo "<td>" . $acc["balance"] . "</td>";
            echo "<td><a href='delete-account.php?num=" . $acc["num"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        if ($_GET["num"] && !empty($_GET["num"])) {
            $acc_num = $_GET["num"];
            if ($_SESSION['accounts'][$acc_num]["balance"] == 0) {
                unset($_SESSION['accounts'][$acc_num]);
                header("Location:main.php");
            } else {
                echo "<script>alert('Can't delete account with balance>0');</script>";
            }
        }
        ?>
</body>

</html>