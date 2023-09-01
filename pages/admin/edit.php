<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../../assets/modules/mysql.php');

$projectId = (int)$_GET['id']; // Sanitize and cast project ID to an integer

// Count the number of images associated with the project
$countQuery = "SELECT COUNT(*) AS imageCount FROM Images WHERE ProjectID = $projectId;";
$countResult = mysqli_query($connection, $countQuery);
$imageCount = 0; // Initialize image count to 0

if ($countRow = mysqli_fetch_assoc($countResult)) {
    $imageCount = (int)$countRow['imageCount']; // Get the image count
}

$query = "SELECT p.ProjectName, p.ProjectID, p.creation_date, p.description, p.github_url, p.demo_url, i.ImageURL
FROM Projects p
LEFT JOIN Images i ON p.ProjectID = i.ProjectID WHERE p.ProjectID = $projectId LIMIT $imageCount;";

$result = mysqli_query($connection, $query);

$project = null; // Initialize the $project variable

$images = []; // Initialize the $images array to store project images

while ($row = mysqli_fetch_assoc($result)) {
    // Populate the $project array with project details once
    if ($project === null) {
        $project = [
            'ProjectName' => $row['ProjectName'],
            'ProjectID' => $row['ProjectID'],
            'creation_date' => $row['creation_date'],
            'description' => $row['description'],
            'github_url' => $row['github_url'],
            'demo_url' => $row['demo_url'],
        ];
    }

    // Add the image URL to the $images array
    if (!empty($row['ImageURL'])) {
        $images[] = $row['ImageURL'];
    }
}

mysqli_free_result($result);

// Separate query to retrieve language names
$languageNames = []; // Initialize the $languageNames array to store language names

$languageQuery = "SELECT l.LanguageName
FROM Projects p
LEFT JOIN ProjectLanguages pl ON p.ProjectID = pl.ProjectID
LEFT JOIN Languages l ON pl.LanguageID = l.LanguageID
WHERE p.ProjectID = $projectId;";

$languageResult = mysqli_query($connection, $languageQuery);

while ($languageRow = mysqli_fetch_assoc($languageResult)) {
    // Add language names to the $languageNames array
    $languageNames[] = $languageRow['LanguageName'];
}

mysqli_free_result($languageResult);

// Include your view file
include_once("edit_view.php");
?>
