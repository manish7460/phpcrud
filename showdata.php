<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "manishfirst"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the students table
$sql = "SELECT id, firstname, lastname, dob, email, gender FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['email']}</td>
                <td>{$row['gender']}</td>
                <td>
                    <a href='database/edit_student.php?id={$row['id']}'>Edit</a> | 
                    <a href='database/delete_student.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
