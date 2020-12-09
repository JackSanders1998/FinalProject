 <?php

include('connectionData.txt');

try 
{	
	$dbh = new PDO('mysql:host='.$server.';port='.$port.';dbname='.$dbname, $user, $pass);
} catch (PDOException $e) {
	print $e->getMessage();
 	exit;
} 

?>

<html>
<head>
  <title>Venue Dashboard</title>
  </head>
  <body bgcolor="white">  
  <hr>
  
  
<?php
	$username 	= $_POST['username'];

	$password 	= $_POST['password'];
	$fname 		= $_POST['fname'];
	$lname 		= $_POST['lname'];
	$email 		= $_POST['email'];
	
	$venuename 	= $_POST['venuename'];
	$street		= $_POST['street'];
	$city      	= $_POST['city'];
	$state		= $_POST['state'];
	$bio            = $_POST['bio'];
	$website        = $_POST['website'];
	$genre1	 	= $_POST['genre1'];
        $genre2 	= $_POST['genre2'];
        $capacity 	= $_POST['capacity'];

	$user_query = "INSERT INTO amp.users (username, password, firstname, lastname, email)
                VALUES ('$username', '$password', '$fname', '$lname', '$email')";
        $query = "INSERT INTO amp.venues (venuename, street, city, state, bio, website, genre1, genre2, capacity)
                VALUES ('$venueename', '$street', '$city', '$state', '$bio', '$website', '$genre1', '$genre2', '$capacity')";
}

?>

<p>
<h3>Congratulations! You successfully made an account with amp as an Artist</h3><br>
Your account was made using the following queries:
<p>
<?php
	print $user_query;
?>
<br>
<?php
        print $query;
?>

<hr>
<p>
Other artists in the database:<br>
(<i>Note: This is purely for transparency purposes. Typically, this information would not be displayed to a user.</i>
</p>

<?php

$result = $dbh->query($query);

$query_show = "SELECT * FROM amp.artists";

$show = $dbh->query($query_show);


if (!$show) 
{
	print "execution error: </br>";
	$error = $dbh->errorInfo();
    print($error[2]);
    exit;
}

      
print "<pre>";

while($row = $show->fetch())
{
    print "\n";
    print "$row[stagename] $row[username]";
}
print "</pre>";


?>



<hr>
<p>
Other users in the database:<br>
(<i>Note: This is purely for transparency purposes. Typically, this information would not be displayed to a user.</i>
</p>

<?php

$user_result = $dbh->query($user_query);

$user_query_show = "SELECT * FROM amp.users";

$user_show = $dbh->query($user_query_show);


if (!$user_show)
{
        print "execution error: </br>";
        $error = $dbh->errorInfo();
    print($error[2]);
    exit;
}


print "<pre>";

while($user_row = $user_show->fetch())
{
    print "\n";
    print "$user_row[stagename] $user_row[username]";
}
print "</pre>";

$dbh = null;

?>

<hr>
<p>
Add your availabilities to be booked by a venue<br>
</p>



<form action="availability.php">
  <label for="availstart">start:</label>
  <input type="datetime-local" name="availstart">
  <label for="availend">end:</label>
  <input type="datetime-local" name="availend">  
<input type="submit" value="Submit">
</form>

<p><strong>Note:</strong> type="datetime-local" is not supported in Firefox, Safari or Internet Explorer 12 (or earlier).</p>


<?php
?>


<p>
<a href="artistPHP.txt" >Contents</a>
view the PHP program that created this page. 	 
 </p>
</body>
</html>
	  
