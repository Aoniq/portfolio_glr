<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../assets/modules/mysql.php');

session_start();

if ($_SESSION['loggedin'] == true) {

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $githubURL = $_POST['githubURL'];
        $demoURL = $_POST['demoURL'];
        $languages = $_POST['languages'];

        // Insert project information into the database
        // You need to write the appropriate code to insert the data into your database
        // add project using prepared statement
        $stmt = $connection->prepare("INSERT INTO Projects (ProjectName, description, github_url, demo_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $description, $githubURL, $demoURL);
        $stmt->execute();
        // get last inserted id
        $id = $stmt->insert_id;
        // use id to insert languages
        foreach ($languages as $language) {
            $stmt = $connection->prepare("INSERT INTO ProjectLanguages (ProjectID, LanguageID) VALUES (?, ?)");
            $stmt->bind_param("ii", $id, $language);
            $stmt->execute();
        }
        // use id to insert media
        // Process and save media files
        if (!empty($_FILES['media']['name'])) {
            $mediaFiles = $_FILES['media'];
            $mediaCount = count($mediaFiles['name']);
    
            // Loop through each uploaded media file
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
                $stmt->bind_param("is", $id, $mediaName);
                $stmt->execute();
            }
        }

        header("Location: index.php?success=true&message=Project created");
    }
    
    // make query to get all languages
    $stmt = $connection->prepare("SELECT * FROM Languages");
    $stmt->execute();
    $languages = $stmt->get_result();
    
    include_once('create_view.php');
}
?>
