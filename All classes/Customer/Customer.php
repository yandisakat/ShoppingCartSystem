<?php class customer 

{
	
private $cust_id= "";
private $firstname= "";
private $lastname="";
private $dateofbirth="";
private $cust_address="";
private $cellno=0;
private $cust_email="";
private $password="";

public function __construct()
{
	
}
public function setDatabase($Database, $TB)
{
	//I do not have to set the database connection from here
}
public function setCust_id($customerID)
{
	$this->cust_id = $customerID;
}
public function setFirstName($fname)
{
	$this->firstname = $fname;
}
public function setLastname($lname)
{
	$this->lastname = $lname;
}
public function setDateofbirth($dof)
{
	$this->dateofbirth = $dof;
}
public function setCust_address($address)
{
	$this->cust_address = $address;
}
public function setCellno ($cn)
{
	$this->cellno = $cn;
}
public function setCust_email($email)
{
	$this->cust_email = $email;
}
public function setPassword($passw)
{
	$this->password = $passw;
}
public function getCust_id()
{
	return $this->cust_id;
}
public function getFirstName()
{
	return $this->firstname;
}
public function getLastname()
{
	return $this->lastname;
}
public function getDataofbirth()
{
	return $this->dateofbirth;
}
public function getCust_address()
{
	return $this->cust_address;
}
public function getCellno()
{
	return $this->cellno;
}
public function getCust_email()
{
	return $this->cust_email;
}
public function getPassword()
{
	return $this->password;
}

}
?>

<?php

/*set a database connection

We will use a PDO instead of MYSQLI to set a database connection
we are using a localhost, the database name is shoppingcartsystemdb, the database's username is root, 
and the databse's password is 122
*/
try
{
$handler = new PDO('mysql:host=127.0.0.1;dbname=shoppingcartsystemdb','root','122');
$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (class_exists("customer"))
{
	$customerdb = new customer();
}
else 
	exit ("<p> Customer class not available</p>");

$sql = "INSERT INTO customer (cust_id,firstname,lastname,dateofbirth,cust_address,cellno,cust_email,cust_password) VALUES (1,'Kessy','Leaqo',12/12/1990,'Sea Point',3453,'kes@gm.com','53879ef')";
$handler->exec($sql);

echo "";
}

catch (PDOException $e)
{


	echo $sql. "<br>". $e->getMessage();



 //printf("<p>%s  </p>",$customerdb->getCust_address()); 

}


?>
