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

  function getLimit() { return floatval($this->credLimit); }

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
  
  public function getAll()
  {
    return $this->customers;
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


//observer
class CheckLimit //this class checks all the customer objs and sorts them into different collections depending on their current credit limit
{
  private $goodStanding;
  private $watchList;
  private $badStanding;

  public function __construct()
  {
    $this->goodStanding = new CustomerList();
    $this->watchList = new CustomerList();
    $this->badStanding = new CustomerList();
  }

  public function addCollection(CustomerList $coll)
  {
    foreach($coll->getAll() as $cust)
      {
	$this->filter($cust);
      }
  }

  public function addSingle(Customer $cust)
  {
    $this->filter($cust);
  }

  private function filter(Customer $cust)
  {
    if($cust->getLimit() > 100000)
      {	
	$this->goodStanding->addCustomer($cust);
      }
    elseif($cust->getLimit() > 1000)
      {
	$this->watchList->addCustomer($cust);
      }
    else
      {
	$this->badStanding->addCustomer($cust);
      }
  }

  public function getGood() { return $this->goodStanding; }
  public function getWatch() { return $this->watchList; }
  public function getbad() { return $this->badStanding; }

}

//---------

$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
$q = "select customerName, contactFirstName, contactLastName, creditLimit from customers limit 100";

$customers = new CustomerList();

foreach($conn->query($q) as $row) 
{
  $temp = CustomerFactory::makeCustomer($row['customerName'], $row['contactFirstName'], $row['contactLastName'], $row['creditLimit'] );
  $customers->addCustomer($temp);
}

try{ 

$limChecker = new CheckLimit(); 
$limChecker->addCollection($customers);

//echo gettype($limChecker->getBad()->getCust(10)->getLimit());
//print_r($limChecker);
echo "<h2>GOOD STANDING: " . $limChecker->getGood()->getCustCount() . "<br>";
echo "WATCH LIST   : " . $limChecker->getWatch()->getCustCount() . "<br>";
echo "BAD STANDING : " . $limChecker->getBad()->getCustCount() . "<br></h2>";

}
catch(Exception $e) { echo $e->getMesseage(); }

$conn->close();

?>