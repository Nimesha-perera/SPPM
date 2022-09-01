<?php

require_once('config.php');
?>

<?php

if (isset($_POST)) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (firstname, lastname, email, phone, address1, address2, city, postal, password) VALUES(?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$firstname, $lastname, $email, $phone, $address1, $address2, $city, $postal, $password]);
    if ($result) {
        echo 'Successfully saved';
    } else {
        echo 'There is an error';
    }
} else {
    echo 'NO data';
}