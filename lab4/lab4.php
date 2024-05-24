<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entry = array(
        "fname" => $_POST['fname'],
        "email" => $_POST['email'],
        "password" => $_POST['password'],
        "age" => $_POST['age'],
        "bday" => $_POST['bday'],
        "gender" => $_POST['gender'],
        "interest" => $_POST['interest'],
        "country" => $_POST['country']
    );
    $_SESSION['entries'][] = $entry;
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
       
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
}

form {
    background-color: #ffffff;
    border-radius: 5px;
    padding: 20px;
    margin: 0 auto;
    width: 300px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
}

input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="date"], select {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
    padding: 10px;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 5px 10px;
}

button:hover {
    background-color: #45a049;
}
   
    </style>
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["fname"].value;
            if (x == "") {
                alert("Name must be filled out");
                return false;
            }
        }
    </script>
</head>
<body>
    <form name="myForm" action="" onsubmit="return validateForm()" method="post">
        Name: <input type="text" name="fname"><br>
        Email: <input type="email" name="email"><br>
        Password: <input type="password" name="password"><br>
        Age: <input type="number" name="age"><br>
        Birthday: <input type="date" name="bday"><br>
        Gender:
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female<br>
        Interests:
        <input type="checkbox" name="interest" value="coding"> Coding
        <input type="checkbox" name="interest" value="music"> Music<br>
        Country:
        <select name="country">
            <option value="india">India</option>
            <option value="usa">USA</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_SESSION['entries'])) {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Password</th><th>Age</th><th>Birthday</th><th>Gender</th><th>Interests</th><th>Country</th><th>Update</th><th>Delete</th></tr>";
        foreach ($_SESSION['entries'] as $entry) {
            echo "<tr>";
            echo "<td>" . $entry['fname'] . "</td>";
            echo "<td>" . $entry['email'] . "</td>";
            echo "<td>" . $entry['password'] . "</td>";
            echo "<td>" . $entry['age'] . "</td>";
            echo "<td>" . $entry['bday'] . "</td>";
            echo "<td>" . $entry['gender'] . "</td>";
            echo "<td>" . $entry['interest'] . "</td>";
            echo "<td>" . $entry['country'] . "</td>";
            echo "<td><button>Update</button></td>";
            echo "<td><button>Delete</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
