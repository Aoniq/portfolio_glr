<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../../assets/modules/mysql.php');

$query = "SELECT p.ProjectName, p.ProjectID, p.creation_date, p.description, l.LanguageName, i.ImageURL
FROM Projects p
LEFT JOIN ProjectLanguages pl ON p.ProjectID = pl.ProjectID
LEFT JOIN Languages l ON pl.LanguageID = l.LanguageID
LEFT JOIN Images i ON p.ProjectID = i.ProjectID WHERE p.ProjectID = " . $_GET['id'] . ";";

$result = mysqli_query($connection, $query);

$project = []; // Initialize the $project array

$languageNames = []; // Initialize the $languageNames array

while ($row = mysqli_fetch_assoc($result)) {
    // Populate the $project array with project details
    $project['ProjectName'] = $row['ProjectName'];
    $project['ProjectID'] = $row['ProjectID'];
    $project['creation_date'] = $row['creation_date'];
    $project['description'] = $row['description'];
    $project['ImageURL'] = $row['ImageURL'];

    // Store each language name in the array
    $languageNames[] = $row['LanguageName'];
}

mysqli_free_result($result);

// Include your view file
include_once("./project_view.php");
?>
