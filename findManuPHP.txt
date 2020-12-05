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
  
$manu = $_POST['manu'];
$query = "SELECT customer.fname, customer.lname, stock.description
		FROM stores7.orders
		JOIN stores7.customer USING(customer_num)
		JOIN stores7.items USING(order_num)
		JOIN stores7.stock USING(stock_num, manu_code)
		JOIN stores7.manufact USING(manu_code)
		WHERE manufact.manu_name = ";
$query = $query."'".$manu."';";

?>

<p>
The query:
<p>
<?php
print $query;
?>

<hr>
<p>
Result of query:
<p>

<?php

$result = $dbh->query($query);

if (!$result) 
{
	print "execution error: </br>";
	$error = $dbh->errorInfo();
    print($error[2]);
    exit;
}

      
print "<pre>";

while($row = $result->fetch())
{
    print "\n";
    print "$row[fname] $row[lname] $row[description]";
}
print "</pre>";

$dbh = null;

?>

<p>
<hr>

<p>
<a href="findManu.txt" >Contents</a>
of the PHP program that created this page. 	 
 
</body>
</html>
	  
