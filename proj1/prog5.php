<?php

//Singleton
class ConnectDb 
{
  
  private static $instance = null;
  private $conn;
  
  private $host = 'sql1.njit.edu';
  private $user = 'dfu3';
  private $pass = 'maynard6';
  private $db = 'dfu3';
  
  
  private function __construct() //est. connection to the DB
  {
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

    if ($this->conn->connect_error)
      {
	die("Connection failed: " . $this->conn->connect_error);
      }

  }
  
  public static function getInstance()//get the persistent instance of the connection 
  {
    if(!self::$instance)
      {
	self::$instance = new ConnectDb();
      }
   
    return self::$instance;
  }
  
  public function getConnection()//create initial connection 
  {
    return $this->conn;
  }
}

//Factory
class Customer
{
  private $custName = "";
  private $contFirst = "";
  private $contLast = "";
  private $credLimit = 0;

  function __construct() {}

  function setName($name) { $this->custName = $name; }

  function setFirst($first) { $this->custFirst = $first; }

  function setLast($last) { $this->custLast = $last; }

  function setLimit($limit) { $this->credLimit = $limit; }

  function profile()
  {
    echo "<h3>CUSTOMER NAME: $this->custName</h3>
         <b>CONTACT:         $this->custFirst $this->custLast </b><br>
         <b>CREDIT LIMIT:    $this->credLimit </b><hr><br>";
  }

}

class CustomerFactory //creates customers given the content
{
  public static function makeCustomer($customerName, $contactFName, $contactLName, $creditLimit)
  {
    $cust = new Customer();
    $cust->setName($customerName);
    $cust->setFirst($contactFName);
    $cust->setLast($contactLName);
    $cust->setLimit($creditLimit);
   
    return $cust;
  }
}

class CustomerList 
{
  private $customers = array();
  private $custCount = 0;
  
  public function __construct() {}
  
  public function getCustCount() 
  {
    return $this->custCount;
  }
  private function setCustCount($newCount) 
  {
    $this->custCount = $newCount;
  }
  public function getCust($numToGet) 
  {
    if ( (is_numeric($numToGet)) && ($numToGet <= $this->getCustCount() ) ) 
      {
	return $this->customers[$numToGet];
      } 
    else { return NULL; }
  }
  public function addCustomer(Customer $cust_in) 
  {
    $this->setCustCount($this->getCustCount() + 1);
    $this->customers[$this->getCustCount()] = $cust_in;
    return $this->getCustCount();
  }
}

class Archive
{
  private $custArch;

  function __construct(CustomerList $custList)
  {
    $this->setArch($custList);
  }
  
  function getArch() { return $this->custArch; }

  function setArch(CustomerList $custList) { $this->custArch = $custList; }

}
//momento class
class Active
{
  private $custAct;

  function __construct(Archive  $arch)
  {
    $this->setAct($arch);
  }
  
  function getAct() { return $this->custAct; }

  function setAct(Archive $arch) { $this->custAct = $arch->getArch(); }

}


//----------------------

$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
$q = "select customerName, contactFirstName, contactLastName, creditLimit from customers limit 10";

$customers = new CustomerList();

foreach($conn->query($q) as $row) 
{
  $temp = CustomerFactory::makeCustomer($row['customerName'], $row['contactFirstName'], $row['contactLastName'], $row['creditLimit'] );
  $customers->addCustomer($temp);
}

$archive = new Archive($customers);
$active = new ACtive($archive);
print_r($archive);
echo "<br>";
print_r($active);

$q = "select customerName, contactFirstName, contactLastName, creditLimit from customers limit 100"; //more customers

$customers1 = new CustomerList();

foreach($conn->query($q) as $row)
{
  $temp = CustomerFactory::makeCustomer($row['customerName'], $row['contactFirstName'], $row['contactLastName'], $row['creditLimit'] );
  $customers1->addCustomer($temp);
}

$archive = new Archive($customers1);
echo "<hr>";
print_r($archive);

$conn->close();

?>