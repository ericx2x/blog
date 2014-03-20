<?php
// connecting to host
mysql_connect("host", "user", "password"); // replace this with your data
mysql_select_db("your_database"); // database name here

// lets build a blog
if(isset($_GET['post'])){
$post = $_GET['post'];

// first of all we will check string length
if(strlen($post) > 11){ // if post id is bigger than 11 charachters
die('Blog post nof found.');
}
// now we will make sure that the post id is numeric and this is a nice security method
if(is_numeric($post)){ // is numeric allows numbers only
$post = (int)$post; // and the int function, which replace every
// string to its correspoing number

// for the tutorial im gonna add mysql_real_escape_string
// but is not really needed in this case
$post = mysql_real_escape_string($post); // final sqli defense

// final part
$query = mysql_query("SELECT title FROM posts WHERE id=$post LIMIT 1"); 
while($row = mysql_fetch_array($query)){
echo $row['title'];
}

}
else{ // if post is not numeric then
die('Blog post nof found.'); // post does not exist
}

}
else{
// if post is not submitted display them all
$query = mysql_query("SELECT title, id FROM posts"); 
while($row = mysql_fetch_array($query)){
echo $row['title'];
echo $row['id'];
echo '<a href="?post='.$id.'">'.$title.'</a><br>';
}
}
?>