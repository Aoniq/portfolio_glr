<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../../assets/modules/mysql.php');

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

include_once("./index_view.php");
?>
