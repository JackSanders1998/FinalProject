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
  <title>Another Simple PHP-MySQL Program</title>
  </head>
  
  <body bgcolor="white">
  
  
  <hr>
  
  
<?php
  
$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$type = $_POST['type'];

$query = "INSERT INTO amp.users (username, password, firstname, lastname, email)
		VALUES ('$username', '$password', '$fname', '$lname', '$email')";



if ($type == 'venue') {
	        echo "VENUE";
        $type_query = "INSERT INTO amp.venues (venuename, street, city, state, bio, website, genre1, genre2, capacity)
                VALUES ('$venueename', '$street', '$city', '$state', '$bio', '$website', '$genre1', '$genre2', '$capacity')";
}

if ($type == 'user') {
	echo "USER";
}
?>

<?php if($type == 'user') : ?>
<p>
<h3>Congratulations! You successfully made an account with amp as a GENERAL USER.</h3><br>
Your account was made using the following query:
<p>
<?php
print $query;
?>

<hr>
<p>
Other users in the database:<br>
(<i>Note: This is purely for transparency purposes. Typically, this information would not be display to a user.</i>
<p>

<?php

$result = $dbh->query($query);


$query_show = "SELECT * FROM amp.users";

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
    print "$row[fname] $row[lname] $row[username] $row[email] $row[password]";
}
print "</pre>";

$dbh = null;

?>

<p>

<?php endif; ?>


<?php if($type == 'artist') : ?>
<p>
<h3>You are one step closer to finishing your account. Fill out the form below to become an artist.</h3><br>

<form action="artist.php" method="POST">
 <input type="hidden" name="username" value=<?php echo $username; ?>>
<input type="hidden" name="password" value=<?php echo $password; ?>>
<input type="hidden" name="fname" value=<?php echo $fname; ?>>
<input type="hidden" name="lname" value=<?php echo $lname; ?>>
<input type="hidden" name="email" value=<?php echo $email; ?>>
Stage Name: <input type="text" name="stagename">*<br>
 City: <input type="text" name="city">*<br>
 State: <input type="text" name="state">*<br>
<label for="type">Primary Genre: </label>
 <select id="type" name="genre1">
                                <option value="none">none</option>
                                <option value="alternative">alternative</option>
                                <option value="blues">blues</option>
                                <option value="christiangospel">christian and gospel</option>
                                <option value="classical">classical</option>
                                <option value="country">country</option>
                                <option value="djdance">dj / dance</option>
                                <option value="electronic">electronic</option>
                                <option value="folk">folk</option>
                                <option value="hiphoprap">hip-hop / rap</option>
                                <option value="indie">indie</option>
                                <option value="jazz">jazz</option>
                                <option value="latin">latin</option>
                                <option value="metal">metal</option>
                                <option value="oldies">oldies</option>
                                <option value="pop">pop</option>
                                <option value="rb">r&b</option>
                                <option value="reggae">reggae</option>
                                <option value="rock">rock</option>
                                <option value="singersongwriter">singer / songwriter</option>
                                <option value="soul">soul</option>
                                <option value="funk">funk</option>
                                <option value="world">world</option> 
</select>*<br>
<label for="type">Secondary Genre: </label>
 <select id="type" name="genre2">
                                <option value="none">none</option>
                                <option value="alternative">alternative</option>
                                <option value="blues">blues</option>
                                <option value="christiangospel">christian and gospel</option>
                                <option value="classical">classical</option>
                                <option value="country">country</option>
                                <option value="djdance">dj / dance</option>
                                <option value="electronic">electronic</option>
                                <option value="folk">folk</option>
                                <option value="hiphoprap">hip-hop / rap</option>
                                <option value="indie">indie</option>
                                <option value="jazz">jazz</option>
                                <option value="latin">latin</option>
                                <option value="metal">metal</option>
                                <option value="oldies">oldies</option>
                                <option value="pop">pop</option>
                                <option value="rb">r&b</option>
                                <option value="reggae">reggae</option>
                                <option value="rock">rock</option>
                                <option value="singersongwriter">singer / songwriter</option>
                                <option value="soul">soul</option>
                                <option value="funk">funk</option>
                                <option value="world">world</option>  
</select>*<br>
 Bio: <input type="text" name="bio">*<br>
 Website: <input type="text" name="website"><br>
 Spotify: <input type="text" name="spotify"><br>
 Apple Music: <input type="text" name="applemusic"><br>
 SoundCloud: <input type="text" name="soundcloud"><br>
 YouTube: <input type="text" name="youtube"><br>
 <input type="submit" value="submit">
</form>

<p>

<?php endif; ?>


<?php if($type == 'venue') : ?>
<p>
<h3>You are one step closer to finishing your account. Fill out the form below to become a venue.</h3><br>

<form action="venue.php" method="POST">
Venue Name: <input type="text" name="venuename">*<br>
Street: <input type="text" name="street">*<br>
 City: <input type="text" name="city">*<br>
 State: <input type="text" name="state">*<br>
 Bio: <input type="text" name="bio">*<br>
 Website: <input type="text" name="website"><br>
<label for="type">Primary Genre: </label>
 <select id="type" name="genre1">
                                <option value="none">none</option>
                                <option value="alternative">alternative</option>
                                <option value="blues">blues</option>
                                <option value="christiangospel">christian and gospel</option>
                                <option value="classical">classical</option>
                                <option value="country">country</option>
                                <option value="djdance">dj / dance</option>
                                <option value="electronic">electronic</option>
                                <option value="folk">folk</option>
                                <option value="hiphoprap">hip-hop / rap</option>
                                <option value="indie">indie</option>
                                <option value="jazz">jazz</option>
                                <option value="latin">latin</option>
                                <option value="metal">metal</option>
                                <option value="oldies">oldies</option>
                                <option value="pop">pop</option>
                                <option value="rb">r&b</option>
                                <option value="reggae">reggae</option>
                                <option value="rock">rock</option>
                                <option value="singersongwriter">singer / songwriter</option>
                                <option value="soul">soul</option>
                                <option value="funk">funk</option>
                                <option value="world">world</option>
</select>*<br>
<label for="type">Secondary Genre: </label>
 <select id="type" name="genre2">
                                <option value="none">none</option>
                                <option value="alternative">alternative</option>
                                <option value="blues">blues</option>
                                <option value="christiangospel">christian and gospel</option>
                                <option value="classical">classical</option>
                                <option value="country">country</option>
                                <option value="djdance">dj / dance</option>
                                <option value="electronic">electronic</option>
                                <option value="folk">folk</option>
                                <option value="hiphoprap">hip-hop / rap</option>
                                <option value="indie">indie</option>
                                <option value="jazz">jazz</option>
                                <option value="latin">latin</option>
                                <option value="metal">metal</option>
                                <option value="oldies">oldies</option>
                                <option value="pop">pop</option>
                                <option value="rb">r&b</option>
                                <option value="reggae">reggae</option>
                                <option value="rock">rock</option>
                                <option value="singersongwriter">singer / songwriter</option>
                                <option value="soul">soul</option>
                                <option value="funk">funk</option>
                                <option value="world">world</option>
</select>*<br>
 Capacity: <input type="text" name="capacity"><br>
 <input type="submit" value="submit">
</form>

<p>

<?php endif; ?>


<hr>

<p>
<a href="loginPHP.txt" >Contents</a>
of the PHP program that created this page. 	 
 
</body>
</html>
	  
