<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("127.0.0.1", "root", "", "midterm");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$company = mysqli_real_escape_string($link, $_REQUEST['company']);
$category = mysqli_real_escape_string($link, $_REQUEST['category']);
$location = mysqli_real_escape_string($link, $_REQUEST['location']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
// Attempt insert query execution
$sql = "INSERT INTO jobs (fullname, company, category,locationjob,descriptionjob) VALUES ('$name', '$company', '$category','$location', '$description')";
if(mysqli_query($link, $sql)){
    header("Location: new-post.php?message=success");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>