<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> Find a Tests</title>
        <link rel="stylesheet" href="../DoTest/TestPage.css">
    </head>
    <body>
        <header class="pageHeding_find">
            <form class="find_test_form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
               <input class="search_txt" type="text" name="searchVal">
               <input type="submit" name="submit" value="Търси">
            </form>
            <div class= "create_test_link">
                <a class="CreateTest" href='../CreateTest/CreateTest.html'>Създай тест</a>
            </div>
        </header>
        <div class = "SearchResults">
        <?php
            if(isset($_POST['submit']))
            {
                $searchValue    = filter_var($_POST["searchVal"], FILTER_SANITIZE_STRING);


                // Create connection
                $conn = new mysqli(getenv(mysql.default.host), getenv(mysql.default.user), getenv(mysql.default.password), "audio-tests");
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $searchValue = "%".$searchValue."%";
                $sql = "SELECT id, name, added  FROM tests WHERE name LIKE ? ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $searchValue);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                  // output data of each row
                  echo "<div class='tests_found'>";
                  echo "<ul class='tests_lists'>";
                  while($row = $result->fetch_assoc()) {
                    echo "<li><a class='test_links' href='../DoTest/TestPage.php?TestID=".$row["id"]."'>".$row["name"]."</a><span class= 'date_tag'>".$row["added"]."</span></li>";
                  }
                  echo "</ul>";
                  echo "</div>";
                } else {
                  echo "0 results";
                }
                $conn->close();
            }
        ?>
        </div>
    </body>
</html>
