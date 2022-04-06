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
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <form action="create-account.php" method="post">
        <table>
            <tr>
                <td>Account Number</td>
                <td><input type="text" name="acc_num" /></td>
            </tr>
            <tr>
                <td>Client Name</td>
                <td><input type="text" name="client_name" /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" /></td>
                </td>
            </tr>
            <tr>
                <td>Telephone</td>
                <td><input type="text" name="tel" /></td>
            </tr>
            <tr>
                <td>Balance</td>
                <td><input type="text" name="balance" /></td>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="add_acc" value="Add Account" /></td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['add_acc'])) {
            $acc_num = $_POST['acc_num'];
            $client_name = $_POST['client_name'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $balance = $_POST['balance'];
            $acc = ["num" => $acc_num, "name" => $client_name, "address" => $address, "tel" => $tel, "balance" => $balance];
            $_SESSION['accounts'][$acc_num] = $acc;
        }
    }
    // $acc = ["num" => $acc_num, "name" => $client_name, "address" => $address, "tel" => $tel, "balance" => $balance];
    //$_SESSION['accounts'][$acc_num] = $acc;

    print_r($_SESSION);
    ?>
</body>

</html>