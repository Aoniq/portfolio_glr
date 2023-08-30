<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../../assets/modules/mysql.php');

$query = "SELECT p.ProjectName, p.ProjectID, p.creation_date, p.description, l.LanguageName, i.ImageURL
FROM Projects p
LEFT JOIN ProjectLanguages pl ON p.ProjectID = pl.ProjectID
LEFT JOIN Languages l ON pl.LanguageID = l.LanguageID
LEFT JOIN Images i ON p.ProjectID = i.ProjectID;
";
$result = mysqli_query($connection, $query);
$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

include_once("./index_view.php");