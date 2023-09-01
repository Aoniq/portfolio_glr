<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../../assets/modules/mysql.php');

session_start();

if ($_SESSION['loggedin'] == true && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete associated data from 'ProjectLanguages' table
    $deleteLangQuery = "DELETE FROM ProjectLanguages WHERE ProjectID = $id";
    if (!mysqli_query($connection, $deleteLangQuery)) {
        echo "Error deleting from ProjectLanguages: " . mysqli_error($connection);
        exit;
    }

    // Delete associated images from 'Images' table
    $deleteImagesQuery = "DELETE FROM Images WHERE ProjectID = $id";
    if (!mysqli_query($connection, $deleteImagesQuery)) {
        echo "Error deleting from Images: " . mysqli_error($connection);
        exit;
    }

    // Delete the project itself from 'Projects' table
    $deleteProjectQuery = "DELETE FROM Projects WHERE ProjectID = $id";
    if (!mysqli_query($connection, $deleteProjectQuery)) {
        echo "Error deleting from Projects: " . mysqli_error($connection);
        exit;
    }

    // Redirect to a suitable page after deletion
    header("Location: index.php?success=true&message=Project deleted"); // Change 'projects.php' to the appropriate page
    exit; // Stop script execution
}
?>
