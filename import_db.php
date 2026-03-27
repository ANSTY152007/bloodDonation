<?php
require_once('db_connection.php');

$conn = dbconnect();

$sql_file = __DIR__ . '/db/blooddonor.sql';
if (!file_exists($sql_file)) {
    die("Error: SQL file not found at " . $sql_file);
}

$sql_contents = file_get_contents($sql_file);

if (mysqli_multi_query($conn, $sql_contents)) {
    do {
        if ($res = mysqli_store_result($conn)) {
            mysqli_free_result($res);
        }
    } while (mysqli_more_results($conn) && mysqli_next_result($conn));
    echo "<h1 style='color:green'>Database Import Successful!</h1><p>You can now go back to <a href='index.php'>Home</a> and Log In.</p>";
} else {
    echo "<h1 style='color:red'>Database Import Failed!</h1><p>" . mysqli_error($conn) . "</p>";
}
?>
