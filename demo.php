<html>
<meta charset="UTF-8">
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "demo_utf8";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "TRUNCATE demo";
$result = $conn->query($sql);

echo "No SET NAMES <br />";
insertData($conn);
printResult($conn);

echo "SET NAMES 'utf8' <br />";
$conn->query("SET NAMES 'utf8'");
insertData($conn);
printResult($conn);

echo "SET NAMES 'utf8mb4' <br />";
$conn->query("SET NAMES 'utf8mb4'");
insertData($conn);
printResult($conn);


$conn->close();


function insertData($conn)
{
    $sql = "INSERT INTO demo (name_latin, name_utf8, name_utf8md4) VALUES ('😂 aiya',  '😂 haha',  '😂 good!'), ('100€', '200€', '300€')";
    $conn->query($sql);
}

function printResult($conn)
{
    $sql = "SELECT * FROM  `demo` order by id desc limit 2";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name latin: " . $row["name_latin"] . " - Name utf8: " . $row["name_utf8"] . " - Name utf8md4: " . $row["name_utf8md4"]  . "<br />";
        }
    } else {
        echo "0 results";
    }

    echo '<br />';
}

?>
</html>
