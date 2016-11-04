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

echo "
<table border=\"1\">
    <thead>
        <tr>
            <th></th>
            <th>Id</th>
            <th>name_latin</th>
            <th>name_utf8</th>
            <th>name_utf8md4</th>
        </tr>
    </thead>
    <tbody>
";


//echo "No SET NAMES <br />";
insertData($conn);
printResult($conn, "No SET NAMES");

//echo "SET NAMES 'utf8' <br />";
$conn->query("SET NAMES 'utf8'");
insertData($conn);
printResult($conn, "SET NAMES utf8", 2);

//echo "SET NAMES 'utf8mb4' <br />";
$conn->query("SET NAMES 'utf8mb4'");
insertData($conn);
printResult($conn, "SET NAMES utf8mb4", 4);


$conn->close();

echo "</tbody> </table>";

function insertData($conn)
{
    $sql = "INSERT INTO demo (name_latin, name_utf8, name_utf8md4) VALUES ('100€', '200€', '300€'), ('😂 aiya',  '😂 haha',  '😂 good!')";
    $conn->query($sql);
}

function printResult($conn, $setNames, $offset = 0)
{
    $sql = "SELECT * FROM  `demo` limit 2 offset " . $offset ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<tr>";

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<td>" . $setNames . "</td>";
            foreach ($row as $detail) {
                echo "<td>" . $detail . "</td>";
            }
            echo "</tr>";
        }

    } else {
        echo "0 results";
    }
}

?>
</html>
