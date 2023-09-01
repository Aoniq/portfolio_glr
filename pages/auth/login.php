<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../assets/modules/mysql.php');

session_start();
if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $wachtwoord = md5($_POST['password']);

    $stmt = $connection->prepare('SELECT * FROM users WHERE username=? AND password=?');
    $stmt->bind_param('ss', $username, $wachtwoord);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $password);
    $stmt->fetch();
    if ($stmt->num_rows > 0) {
        $_SESSION['userid'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        header("Location: ../../index.php");
        //exit; // Stop script execution
    } else {
    echo "FOUT";
        header("Location: login.php?e=10043");
        //exit; // Stop script execution
    }
} else {
    $foutmelding = isset($_GET['e']);
    if ($foutmelding == 10043) {
        function returnScriptCode()
        {
            $scriptCode = '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
                           <script>
                               document.addEventListener("DOMContentLoaded", function() {
                                   Swal.fire({
                                       icon: "error",
                                       title: "Oops!",
                                       text: "Username or password is incorrect"
                                   });
                               });
                           </script>';
    
            echo $scriptCode;
        }
    
        // Call the function to return the script code
        returnScriptCode();
    }
    // $ww = md5($_POST['password']);
    // $stmt = $connection->prepare('SELECT * FROM users WHERE username=? AND password=?');
    // $stmt->bind_param('ss', $_POST['username'], $ww);
    // $stmt->execute();
    // $stmt->store_result();
    // $stmt->bind_result($id, $username, $password);
    // $stmt->fetch();
    // var_dump($stmt);

}

include_once("./login_view.php");
?>