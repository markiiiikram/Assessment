<?php
// Step 1: Establish a database connection
$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contact_form_nm";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Execute a query
$sql = "SELECT n.title, n.minute_read, n.content, n.posted_by_image, n.posted_by, n.date, n.image, n.image_alt, c.color
        FROM news AS n
        JOIN color AS c ON n.color_ID = c.color_ID
        LIMIT 3;";

$result = $conn->query($sql);

// Step 3: Check if the query was successful
if ($result && $result->num_rows > 0) {
    // Output data for the first 3 news items
    for ($i = 1; $i <= 3; $i++) {
        // Fetch row data
        $row = $result->fetch_assoc();
        




        // Output news container for each row
        echo '<div class="article-container float-container container-col-' . $i . '">';
        echo '<a href="#">';
        echo '<img class="employees" alt="' . $row['posted_by'] . '" src="' . $row['posted_by_image'] . '">';
        echo '<div class="article-details">';
        echo '<h3 class="article-h3">' . $row['title'] . ' <span class="read-time">- ' . $row['minute_read'] . ' minute read</span></h3>';
        echo '<p>' . $row['content'] . '</p>';
        echo '<span class="button-blue btn" id="button-g">Read More</span>';
        echo '<div class="posted">';
        echo '<img src="' . $row['image'] . '" alt="' . $row['image_alt'] . '" class="min-logo">';
        echo '<div class="flex"><strong class="text-primary">Posted by ' . $row['posted_by'] . '</strong><br>' . $row['date'] . '</div>';
        echo '</div></div></a>';
        echo '<div class="image-container"><a href="#">NEWS</a></div></div>';
    }
} else {
    echo "No news found";
}

// Step 4: Close the database connection
$conn->close();
?>
