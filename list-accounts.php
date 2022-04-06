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
            <th>Address</th>
            <th>Telephone</th>
            <th>Balance</th>

        </tr>
        <?php
        if (isset($_GET["page"]) && !empty($_GET["page"])) {
            $currentPg = $_GET["page"];
        } else {
            $currentPg = 1;
        }
        $perPages = 2;
        $first_index = ($currentPg * $perPages) - $perPages;
        $tab = array_slice($_SESSION['accounts'], $first_index, $perPages);

        foreach ($tab as $acc) {
            echo "<tr>";
            echo "<td>" . $acc["num"] . "</td>";
            echo "<td>" . $acc["name"] . "</td>";
            echo "<td>" . $acc["address"] . "</td>";
            echo "<td>" . $acc["tel"] . "</td>";
            echo "<td>" . $acc["balance"] . "</td>";
            echo "</tr>";
        }
        $count = count($_SESSION['accounts']);
        $nbOfPgs = ceil($count / $perPages);
        echo "</table>";
        for ($i = 1; $i <= $nbOfPgs; $i++) {
            echo "<a href='list-accounts.php?page=" . $i . "'>" . $i . "</a>";
        }
        ?>
</body>

</html>