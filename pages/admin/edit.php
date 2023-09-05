<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../../assets/modules/mysql.php');
session_start();
$projectId = (int)$_GET['id']; // Sanitize and cast project ID to an integer

// Count the number of images associated with the project
$countQuery = "SELECT COUNT(*) AS imageCount FROM Images WHERE ProjectID = $projectId;";
$countResult = mysqli_query($connection, $countQuery);
$imageCount = 0; // Initialize image count to 0

if ($countRow = mysqli_fetch_assoc($countResult)) {
    $imageCount = (int)$countRow['imageCount']; // Get the image count
}

$query = "SELECT p.ProjectName, p.ProjectID, p.creation_date, p.description, p.github_url, p.demo_url
FROM Projects p WHERE p.ProjectID = $projectId;";

$result = mysqli_query($connection, $query);

$project = null; // Initialize the $project variable

// make query for images based on project id
$ImgQuery = "SELECT i.ImageURL, i.ImageID FROM Images i WHERE i.ProjectID = $projectId;";
$Imgresult = mysqli_query($connection, $ImgQuery);

$images = []; // Initialize the $images array to store project images

// store images in array
while ($row = mysqli_fetch_assoc($Imgresult)) {
    $images[] = $row;
}

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
}

mysqli_free_result($result);

// get languages for the project
$ProjectLanguageQuery = "SELECT l.LanguageName, l.LanguageID
FROM Projects p
LEFT JOIN ProjectLanguages pl ON p.ProjectID = pl.ProjectID
LEFT JOIN Languages l ON pl.LanguageID = l.LanguageID
WHERE p.ProjectID = $projectId;";
$ProjectLanguageResult = mysqli_query($connection, $ProjectLanguageQuery);
$ProjectLanguageNames = []; // Initialize the $languageNames array to store language names
while ($ProjectLanguageRow = mysqli_fetch_assoc($ProjectLanguageResult)) {
    // Add language names to the $languageNames array
    $ProjectLanguageNames[] = $ProjectLanguageRow['LanguageName'];
}
mysqli_free_result($ProjectLanguageResult);

// get all languages
$languageQuery = "SELECT * FROM Languages;";
$languageResult = mysqli_query($connection, $languageQuery);
$languages = []; // Initialize the $languages array to store language s
while ($languageRow = mysqli_fetch_assoc($languageResult)) {
    // Add language s to the $languages array
    $languages[] = $languageRow;
}

mysqli_free_result($languageResult);

if ($_SESSION['loggedin'] == true && isset($_GET['id']) && isset($_GET['image'])) {
    $id = $_GET['id'];
    $imageId = $_GET['image'];
    $query = "DELETE FROM Images WHERE ImageID = $imageId;";
    if (!mysqli_query($connection, $query)) {
        echo mysqli_error($connection);
    }
    header("Location: edit.php?id=$id");
}

if ($_SESSION['loggedin'] == true && isset($_POST['submit'])) {
    $name = $_POST['name'];
    // trim description
    $description = trim($_POST['description']);
    $githubURL = $_POST['githubURL'];
    $demoURL = $_POST['demoURL'];
    $languages = $_POST['languages'];
    $query = "UPDATE Projects SET ProjectName = '$name', description = '$description', github_url = '$githubURL', demo_url = '$demoURL' WHERE ProjectID = $projectId;";
    if (!mysqli_query($connection, $query)) {
        echo mysqli_error($connection);
    }
    // update languages
    // check which languages are checked and unchecked
    $languageQuery = "SELECT * FROM ProjectLanguages WHERE ProjectID = $projectId;";
    $languageResult = mysqli_query($connection, $languageQuery);
    $checkedLanguages = []; // Initialize the $checkedLanguages array to store checked languages
    while ($languageRow = mysqli_fetch_assoc($languageResult)) {
        // Add checked languages to the $checkedLanguages array
        $checkedLanguages[] = $languageRow['LanguageID'];
    }
    mysqli_free_result($languageResult);
    // update languages
    foreach ($checkedLanguages as $language) {
        if (!in_array($language, $languages)) {
            $query = "DELETE FROM ProjectLanguages WHERE ProjectID = $projectId AND LanguageID = $language;";
            if (!mysqli_query($connection, $query)) {
                echo mysqli_error($connection);
            }
        }
    }
    foreach ($languages as $language) {
        if (!in_array($language, $checkedLanguages)) {
            $query = "INSERT INTO ProjectLanguages (ProjectID, LanguageID) VALUES ($projectId, $language);";
            if (!mysqli_query($connection, $query)) {
                echo mysqli_error($connection);
            }
        }
    }

    // check if images is uploaded
    if (!empty($_FILES['media']['name'])) {
        // upload image
        $mediaFiles = $_FILES['media'];
        $mediaCount = count($mediaFiles['name']);
        // make foreach for uploading all images
        for ($i = 0; $i < $mediaCount; $i++) {
            $mediaName = $mediaFiles['name'][$i];
            $mediaTmpName = $mediaFiles['tmp_name'][$i];
            $mediaType = $mediaFiles['type'][$i];

            // Process and save the media file to a directory
            $targetDir = '../../assets/uploads/';
            $targetPath = $targetDir . $mediaName;
            if (move_uploaded_file($mediaTmpName, $targetPath)) {
                // File uploaded successfully
            } else {
                // Error uploading file
                echo "Error uploading file: " . $_FILES['media']['error'][$i];
            }

            // Save media information to the database
            // You need to write the appropriate code to insert the data into your database
            // use the last inserted id to insert media
            $stmt = $connection->prepare("INSERT INTO Images (ProjectID, imageURL) VALUES (?, ?)");
            $stmt->bind_param("is", $projectId, $mediaName);
            $stmt->execute();
        
        }
    }

    header("Location: edit.php?id=$projectId");
}

// Include your view file
include_once("edit_view.php");

?>
