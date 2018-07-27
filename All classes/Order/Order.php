<?php  
	class OrderClass  {  
	//private $DBConnect = "";      
	//private $TableName = "";      
	private $OrderId = 0;
    private $Amount = 0;
    private $Shipment = 0;
    private $Date = "";

    /* This section will be replaced by the class DBConnection
    public function __construct(){   
    	$this->DBConnect = @new mysqli("localhost","root","","store"); 

        If (mysqli_connect_errno()) die("<p>Unable to connect to database.</p>" . "<p>Error code ". Mysqli_connect_errno() . ": " . mysqli_connect_errno()) . "</p>";     
    } 

    function __destruct() { 
        $DBConnect -> close();
    } 

    function __wakeup() {   
        Include(""); 
        $this->DBConnect = $DBConnect; 
    }  

    public function setDatabase($Database) { 
        $this->DBName = $Database; 
        @$this->DBConnect->select_db($this->DBName) Or die("<p>Unable to select the database.</p>" . "<p>Error code " . mysqli_errno($this->DBConnect) . ": " . mysqli_error($this->DBConnect)) . "</p>"; } */ 

      
    public function setOrderID($id) {  
        if($this->OrderId != $id) {  

            $this->OrderId = $id;   
            $SQLString = "SELECT * FROM order " .   " WHERE order_id = '" .$this->OrderId ."'";  
            $QueryResult = @$this->DBConnect->query($SQLString);  

            if($QueryResult === FALSE){     
                $this-> OrderId = "";  
                                    } 

            else {     
                $this-> order = array();    

                 while(($Row = $QueryResult->fetch_assoc()) !== NULL)   {     
                    $this->order[$Row['order_id']] = array();     
                    $this->order[$Row['order_id']]['shipment'] = $Row['name'];     
                    $this->order[$Row['order_id']]['amount'] = $Row['amount'];     
                    $this->order[$Row['order_id']]['price'] = $Row['price'];     
                    $this->OrderClass[$Row['order_id']] = 0;    } 

                }      
        } 
    }  
?> 
