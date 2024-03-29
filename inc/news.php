<?php
// Step 1: Establish a database connection
include("dbCon.php");

// Step 2: Execute a query
$sql = "SELECT n.title, n.minute_read, n.content, n.posted_by_image, n.posted_by_image_alt, n.posted_by, n.date, n.image, n.image_alt, c.color
        FROM news AS n
        JOIN color AS c ON n.color_ID = c.color_ID
        ORDER BY STR_TO_DATE(date, '%D %M %Y') DESC
        LIMIT 3;";

$result = $conn->query($sql);

// Step 3: Check if the query was successful
if ($result && $result->num_rows > 0) {
    // Output data for the first 3 news items
    for ($i = 1; $i <= 3; $i++) {
        // Fetch row data
        $row = $result->fetch_assoc();
        echo '<div class="article-container float-container container-col-' . $i . '">';
        echo '<a href="#">';
        echo '<img class="employees" alt="' . $row['image_alt'] . '" src="' . $row['image'] . '">';
        echo '<div class="article-details">';
        echo '<h3 class="article-h3">' . $row['title'] . ' <span class="read-time">- ' . $row['minute_read'] . ' minute read</span></h3>';
        echo '<p>' . $row['content'] . '</p>';
        echo '<span class="button-' . $row['color'] . ' btn" id="button-g">Read More</span>';
        echo '<div class="posted">';
        echo '<img src="' . $row['posted_by_image'] . '" alt="' . $row['posted_by_image_alt'] . '" class="min-logo">';
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
