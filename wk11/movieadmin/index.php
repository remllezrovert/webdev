

<!DOCTYPE html>

<html lang="en">

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>movie store</title>

  <!-- Bootstrap CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>

    .menu-link>a {

      color: #fff;

      /*white color*/

      font-weight: 500;

    }

    .menu-link {

      padding-left: 20px;

    }

    .menu-bar {

      background-color: maroon;

    }

  </style>

</head>

<body>

  <div class='container-fluid'>

    <!-- include page content -->

    <?php

    // Establish database connection

    include_once("pdo_connect.php");

    /* Check if the database connection is established. If not, exit the program. */

    if (!$db) {

      echo "Could not connect to the database";

      exit();

    }

    ?>

    <div class="row">

      <div class="col-sm-12">

        <img src="http://www.southjersey.com//images/page_movies.jpg" alt="Movie store" height="100px">

      </div>

      <nav class="navbar navbar-expand-lg menu-bar">

        <ul class="navbar-nav mr-auto">

          <li class="nav-item menu-link active">

            <a class="nav-link"

              href="index.php"> Home </a>

          </li>

          <li class="nav-item menu-link">

            <a class="nav-link" href="index.php?mode=members"> Members </a>

          </li>

          <li class="nav-item menu-link">

            <a class="nav-link" href="index.php?mode=movies&genre=all"> All Movies </a>

          </li>

          <li class="nav-item menu-link">

            <a class="nav-link" href="index.php?mode=movies&genre=Drama"> Drama Movies </a>

          </li>

          <li class="nav-item menu-link">
            <a class="nav-link" href="index.php?mode=displaynewmemberform"> Add New Member</a>
          </li>

          <li class="nav-item menu-link">
            <a class="nav-link" href="index.php?mode=selectmember"> Update a Member</a>
          </li>

          <li class="nav-item menu-link">
          <a class="nav-link" href="index.php?mode=updateMovie"> Update Movie Information</a>
          </li>


        </ul>

      </nav>

    </div>

    <?php

    // Define variables and assign their default values

    $mode = ""; // default value for the switch statement

    $parameterValues = null; // default values named parameters

    $pageTitle = ""; // define a title for each output

    $columns = array(); // define an array of column labels for a table header

    try {

      if (isset($_GET['mode'])) {

        $mode = $_GET['mode'];

      }

      switch ($mode) {

        case 'displayMemberInfo':
            $memberID = isset($_GET['memberId'])? $_GET['memberId']:null;
            if (empty($memberId)){
                echo "You have not selected a member";
                exit();
            }
            $sql = "SELECT `memberId`, `firstName`, `lastName`,`phone` FROM `members` where `memberId`=:memberId";
            $parameterValues = array(":memberId" => $memberId);
            $dataList = getAll($sql,$db,$parameterValues);
            $pageTitle = "Update MemberInformation";
            include("displayMemberInfo.php");

            //select member's data

            break;

          
        case 'selectmember':
            //need to display a list of members so that we can select a membe from the list to update;
            $sql = "SELECT `memberId`, `firstName`,`lastName` from `members` order by `lastName`";
            $dataList - getAll($sql,$db);
            //define title
            $pageTitle = "Select a member from the following list to update";
            //include aphp script from the displayMemberList to display the list of members available
            include("displayMemberList.php");
            break;
        case 'displaynewmemberform': //display a form to allow the user to enter member information
            include('displaynewmemberform.html');
            break;//display an html form
     
        case 'addNewMember':
          // Get input data and validate that data
          $firstName = isset($_POST['firstName'])? $_POST['firstName']: "";
          $lastName = isset($_POST['lastName'])? $_POST['lastName']: "";  // Corrected the variable
          $phone = isset($_POST['phone'])? $_POST['phone']: "";
          $memberType = isset($_POST['memberType'])? $_POST['memberType']: "";
          $username = isset($_POST['username'])? $_POST['username']: "";
          $password = isset($_POST['password'])? $_POST['password']: "";

          // Validate input data
          if (empty($firstName) || empty($lastName) || empty($phone) || empty($memberType) || empty($username) || empty($password)) {
              echo "Invalid data";
          } else {
              $sql = "INSERT INTO `members` (firstName, lastName, phone, memberType, username, password) 
                      VALUES (:firstName, :lastName, :phone, :memberType, :username, :password)";
              
              $parameterValues = [
                  ":firstName" => $firstName, 
                  ":lastName" => $lastName, 
                  ":phone" => $phone, 
                  ":memberType" => $memberType, 
                  ":username" => $username, 
                  ":password" => md5($password)  // Assuming you still want to use md5 (though bcrypt is safer)
              ];

              // Prepare SQL statement
              $stm = $db->prepare($sql);
              $stm->execute($parameterValues);
              echo "<p> A new member has been added!</p>";
          }
        break;

            

        case "members": // display a list of members

          // 1. define SQL statement

          $sql = "SELECT `firstName`, `lastName` FROM `members` order by `lastName`";

          // 2. Define values for named parameters. There are no parameters in this SQL statement. Use the default.

          // 3. Fetch result set

          $resultSet = getAll($sql, $db, $parameterValues);

          // 4. Display result

          $pageTitle = "List of Members";

          $columns = array("First Name", "Last Name"); // we will use a two-column table to display members

          displayResultSet($pageTitle, $resultSet, $columns);

          break;


          case 'editMovie':
          $movieID = isset($_GET['movieId']) ? $_GET['movieId'] : null;

          if ($movieID) {
              $sql = "SELECT `movieId`, `title`, `year`, `type` FROM `movies` WHERE `movieId` = :movieId";
              $parameterValues = array(":movieId" => $movieID);
              $movieData = getAll($sql, $db, $parameterValues);

              if (!empty($movieData)) {
                  $movie = $movieData[0]; 
                  $sqlTypes = "SELECT DISTINCT `type` FROM `movies` ORDER BY `type`";
                  $types = getAll($sqlTypes, $db);

                  include('updateMovieForm.php');
              }
          } else {
              echo "No movie selected for update.";
          }
          break;


          case "updateMovieForm":
            $movieId = isset($_GET['movieId']) ? $_GET['movieId'] : null;
            if (empty($movieId)) {
                echo "No movie selected.";
                exit();
            }

            $sql = "SELECT `movieId`, `title`, `type`, `year` FROM `movies` WHERE `movieId` = :movieId";
            $parameterValues = array(":movieId" => $movieId);
            $movie = getAll($sql, $db, $parameterValues)[0]; // Assuming only one movie is returned

            $typesSql = "SELECT DISTINCT `type` FROM `movies` ORDER BY `type`";
            $types = getAll($typesSql, $db);

            echo "<h3>Update Movie: {$movie['title']}</h3>";
            echo "<form method='POST' action='index.php?mode=updateMovie'>";
            echo "<input type='hidden' name='movieId' value='{$movie['movieId']}'>";
            echo "<label for='title'>Title:</label>";
            echo "<input type='text' name='title' value='{$movie['title']}' required><br>";
            echo "<label for='year'>Year:</label>";
            echo "<input type='number' name='year' value='{$movie['year']}' required><br>";
            echo "<label for='type'>Type:</label>";
            echo "<select name='type'>";
            foreach ($types as $type) {
                $selected = ($movie['type'] == $type['type']) ? "selected" : "";
                echo "<option value='{$type['type']}' {$selected}>{$type['type']}</option>";
            }
            echo "</select><br>";
            echo "<button type='submit'>Update Movie</button>";
            echo "</form>";
        break;

         case "updateMovie":
          $sql = "SELECT `movieId`, `title`, `year`, `type` FROM `movies` ORDER BY `title`";
          $dataList = getAll($sql, $db);
          $pageTitle = "Select a Movie to Update";
          $columns = array("movieId", "Title", "Year", "Type", "Action"); // Add an Action column for edit links
          
          // Prepare rows with edit links
          $rows = [];
          foreach ($dataList as $movie) {
              $editLink = "<a href='index.php?mode=updateMovieForm&movieId={$movie['movieId']}' class='btn btn-warning btn-sm'>Edit</a>";
              $movie['Action'] = $editLink;
              $rows[] = $movie;
          }

      displayResultSet($pageTitle, $rows, $columns);
      break;
  
     case 'updateMovieSubmit':
        $movieID = isset($_POST['movieId']) ? $_POST['movieId'] : null;
        $title = isset($_POST['title']) ? $_POST['title'] : "";
        $year = isset($_POST['year']) ? $_POST['year'] : "";
        $type = isset($_POST['type']) ? $_POST['type'] : "";

        if (empty($movieID) || empty($title) || empty($year) || empty($type)) {
            echo "Please fill out all fields.";
        } else {
            $sql = "UPDATE `movies` SET `title` = :title, `year` = :year, `type` = :type WHERE `movieId` = :movieId";
            $parameterValues = array(
                ":title" => $title,
                ":year" => $year,
                ":type" => $type,
                ":movieId" => $movieID
            );

            $stmt = $db->prepare($sql);
            if ($stmt->execute($parameterValues)) {
                echo "<p>Movie information updated successfully!</p>";
            } else {
                echo "<p>Error updating movie information.</p>";
            }
        }
        break;
 
        case "movies":

          // 1. define SQL statement

          /* Note: We use two key/value pairs: 

                        mode - identifies the switch case

                        genre - movie type

                        If genre=all then display all the movies.

                        If genre=Drama then display Drams type movies.

                        Need two different SQL statements.

                        We can use an if ... else statement to handle these values.

                    */
                
                

          if (isset($_GET['genre']) && $_GET['genre'] !== "all") {

            $genre = $_GET['genre'];

            $sql = "SELECT `title`, `type`, `year` FROM `movies` where `type` = :genre order by `title`";

            // 2. Define values for named parameters. 

            $parameterValues = array(":genre" => $genre);

            // Define page title

            $pageTitle = "List of {$genre} movies";

          } else {

            // Default output is a list of all the movies

            $sql = "SELECT `title`, `type`, `year` FROM `movies`  order by `title`";

            // 2. Define values for named parameters. There are no parameters in this SQL statement. Use the default.

            // Define page title

            $pageTitle = "List of movies";

          }

          // 3. Fetch result set

          $resultSet = getAll($sql, $db, $parameterValues);

          // 4. Display result

          $columns = array("Title", "Genre", "Year"); // three columns, same as the field names in the SQL statement

          displayResultSet($pageTitle, $resultSet, $columns);

          break;

        default: // Default page

          echo "<h3>Welcome to Online Movie Club<h3>";

          break;

      }

    } catch (PDOException $e) {

      echo "Error!: " . $e->getMessage() . "<br/>";

      die();

    }

    /* end main section */

    ?>

  </div>

</body>

</html>

<?php

function displayResultSet($pageTitle, $resultSet, $columns)

{

  // Use a table structure for displaying data

  echo $pageTitle;

  echo "<table class='table table-sm'>";

  // If the $columns array is not empty then display table header

  $numCols = count($columns); // find the size of the array

  if ($numCols > 0) {

    echo "<thead><tr>";

    foreach ($columns as $c) {

      echo "<th>{$c}</th>";

    }

    echo "</thead>";

  }

  echo "<tbody>";

  foreach ($resultSet as $item) {

    /* Each $item is an associative array.  Keys are the same as the field names 

                    used in the SQL statement.

                */

    // Define a table row for each item in the $resultSet array

    echo "<tr>";

    // We can use a foreach loop to access each element of $item array

    foreach ($item as $key => $value) {

      echo "<td>{$value}</td>";

    }

    echo "</tr>";

  }

  echo "</tbody></table>";

}

function getAll($sql, $db, $parameterValues = null)

{

  /* Prepare the SQL statement. 

        The $db->prepare($sql) method returns an object.

    */

  $statement = $db->prepare($sql);

  /* Execute prepared statement. The execute( ) method returns a resource object.  */

  $statement->execute($parameterValues);

  /* Use the fetchAll( ) method to extract records from the result set.

    */

  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  return $result;

}

?>

