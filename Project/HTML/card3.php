<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Event</title>
    <link rel="icon" href="PHOTO/college.png">
    <link rel="stylesheet" href="CSS/card1.css">
</head>

<body>
    <div class="main">
        <div class="nav_bar">
            <img id="college_icon" src="PHOTO/icon.png" alt="icon">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="index2.html">Contact</a></li>
                <li><a href="index3.html">About</a></li>
            </ul>
        </div>
        <div class="main_div">
            <div class="div">
                <div class="back">
                    <button id="back">back</button>
                </div>
                <div class="card_heading">
                    <h4>Music Event</h4>
                </div>
            </div>
            <div class="sub_main">
                <div class="info_div">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $uname = $_POST['uname'];
                        $fname = $_POST['fname'];
                        $roll = $_POST['roll'];
                        $year = $_POST['year'];

                        $conn = new mysqli('localhost', 'root', '', 'test');
                        if ($conn->connect_error) {
                            die('Connection Failed : ' . $conn->connect_error);
                        } else {
                            $stmt = $conn->prepare("INSERT INTO music_event(uname, fname, roll, year) VALUES(?, ?, ?, ?)");
                            $stmt->bind_param("sssi", $uname, $fname, $roll, $year);
                            $stmt->execute();
                            $stmt->close();
                            $conn->close();
                        }
                    }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form_heading">
                            <h1 id="h1_from_heading">participate in Music Event</h1>
                        </div>
                        <div class="uname_div" id="input">
                            <label for="uname"> Enter Your Name :
                                <input type="text" placeholder="user name" id="uname" name="uname" required>
                            </label>
                        </div>
                        <div class="fname_div" id="input">
                            <label for="fname"> Enter Your Father Name :
                                <input type="text" placeholder="father name" id="fname" name="fname" required>
                            </label>
                        </div>
                        <div class="roll_div" id="input">
                            <label for="roll">Enter Your Roll Number :</label>
                            <input type="text" placeholder="roll number" id="roll" name="roll" required>
                        </div>
                        <div class="year_div" id="input">
                            <label for="">Select Your Year</label>
                            <select name="year" id="myss" required>
                                <option value="">Select Year</option>
                                <option value="1">1<sup>st</sup> year</option>
                                <option value="2">2<sup>nd</sup> year</option>
                                <option value="3">3<sup>rd</sup> year</option>
                                <option value="4">4<sup>th</sup> year</option>
                            </select>
                        </div>
                        <button type="submit">submit</button>
                    </form>
                </div>
                <div class="event_entery">
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'test');
                    if ($conn->connect_error) {
                        die('Connection Failed : ' . $conn->connect_error);
                    } else {
                        $query = "SELECT * FROM music_event";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            echo "Music Event Enteries";
                            echo "<table border='1'>
                                  <tr>
                                  <th>Sr.no</th>
                                  <th>Student name</th>
                                  <th>Father Name</th>
                                  <th>Roll Number</th>
                                  <th>Year</th>
                                  </tr>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['uname'] . "</td>";
                                echo "<td>" . $row['fname'] . "</td>";
                                echo "<td>" . $row['roll'] . "</td>";
                                echo "<td>" . $row['year'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No records found";
                        }
                        $conn->close();
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>Code with Love ❤</p>
        </div>
    </div>
    <script src="JS/card.js"></script>
</body>

</html>