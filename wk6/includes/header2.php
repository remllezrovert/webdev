<?php
//(1) define an array named $nav to create a list of items in nav bar
//Use the file name as the key and link text as the value.
$nav = [];
$nav = [
  "Home"=>"index2.php",
  "About"=>"about.php",
  "Candy"=>"candy.php",
  "Contact"=>"contact.php"
];

//(2) define a function add_title to provide title that comes from current php file name
//if the current file is index2.php, display title as "The Candy Store'. 
// the function will return title at the end. 
//use predefined functions: basename(), $_SERVER("PHP_SELF"), str_replace(), ucwords()
function add_title() {
    $filename = basename($_SERVER['PHP_SELF']);
    
    $filenameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
    
    $formattedTitle = ucwords(str_replace('_', ' ', $filenameWithoutExt));

    return $formattedTitle;
}
//(3) define a function create_logo() to create
//an <img> element with a logo image named "logo.png" inside
//the funtion accepts the img file name and path as argument
//and return an img element as a string 
function create_logo($filename) {
  $path = './img/' . $filename;
    return '<img src="' . htmlspecialchars($path) . '" alt=$filename />';
}

?>
<!DOCTYPE html>
<html>

<head>
  <title> <?php //call add_title funtion here
  add_title();
          ?></title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1> <?php //call create_logo function and add_title function here 
  echo add_title();
  echo create_logo("logo.png");
        ?> </h1>

  <nav>
    <?php
    //add php here to create <a> elements by using $nav array
      foreach ($nav as $file => $text) {
        echo '<a href="' . htmlspecialchars($text) . '" class="button-link">' . htmlspecialchars($file) . '</a> ';
    }
    ?>
    <!-- <a href="index.php">Home</a> | 
      <a href="candy.php">Candy</a> | 
      <a href="about.php">About</a> | 
      <a href="contact.php">Contact</a>-->
  </nav>