<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../../assets/modules/mysql.php');

if ($_SESSION['loggedin'] == true) {
$query = "SELECT p.ProjectID, p.ProjectName, p.creation_date, p.description, i.ImageURL
FROM Projects p
LEFT JOIN Images i ON p.ProjectID = i.ProjectID;";
$result = mysqli_query($connection, $query);

$projects = []; // Initialize the projects array

while ($row = mysqli_fetch_assoc($result)) {
    $projectID = $row['ProjectID'];

    // Check if the project is already in the array
    if (!isset($projects[$projectID])) {
        $projects[$projectID] = [
            'ProjectID' => $row['ProjectID'],
            'ProjectName' => $row['ProjectName'],
            'creation_date' => $row['creation_date'],
            'description' => $row['description'],
            'images' => [] // Initialize images array for the project
        ];
    }

    // Add the image URL to the project's images array
    if (!empty($row['ImageURL'])) {
        $projects[$projectID]['images'][] = $row['ImageURL'];
    }
}

mysqli_free_result($result);

if (isset($_GET['success']) && $_GET['success'] == true) {
    $message = $_GET['message'];
    function returnScriptCode($message)
        {
            $scriptCode = '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
                           <script>
                               document.addEventListener("DOMContentLoaded", function() {
                                   Swal.fire({
                                       icon: "success",
                                       title: "Success!",
                                       text: "' . $message . '",
                                   });
                               });
                           </script>';
    
            echo $scriptCode;
        }
    
        // Call the function to return the script code
        returnScriptCode($message);
}

include_once("index_view.php");

} else {
    header("Location: ../auth/login.php");}
?>