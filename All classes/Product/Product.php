<?php
	class Product
	{
		private $DbName = "";
		private $TblName = "";
		private $ProdID;
		private $Descrip;
		private $Price;
		private $Qty;
		private $CatID;
		
		public __construct()
		{
			$this->DBConnect = @new mysqli("localhost","root","","store"); 
			if (mysqli_connect_errno()) die("<p>Unable to connect to database.</p>" . "<p>Error code ". Mysqli_connect_errno() . ": " . mysqli_connect_errno()) . "</p>";     
			$this->ProdID = 0;
			$this->Descrip = "";
			$this->Price = 0.0;
			$this->Qty = 0;
			$this->CatID = 0;
			
		}
		
		public function setProdID($prID)
		{
			if ($this->ProdID != $prID)
			{
				$this->ProdID = $prID;
				$SQLString = "SELECT * FROM product "." WHERE pr_id = '".$this->ProdID ."'";
				$QueryResult = @$this->DBConnect->query(SQLString);
				
				if ($QueryResult === FALSE)
				{
					$this->ProdID = "";
				}
				else
				{
					$this->product = array();
					$this->shoppingCart = array();
					
					while (($Row = $QueryResult->fetch_assoc()) != NULL)
					{
						$this->product[$Row['pr_id']] = array();
						$this->product[$Row['pr_id']]['description'] = $Row['description']);
						$this->product[$Row['pr_id']]['price'] = $Row['price'];
						$this->product[$Row['pr_id']]['qty'] = $Row['qty'];
						$this->product[$Row['pr_id']]['cat_id'] = $Row['cat_id'];
						$this->shoppingCart[$Row['pr_id']] = 0;
					}
				}
			
			}
			
		}	
	
		public function getProductInfo()
		{
			$retval = FALSE;
			if ($this->ProdID != "")
			{
				$SQLString = "SELECT * FROM product "." WHERE pr_id = '".$this->ProdID."'";
				$QueryResult = @$this->DBConnect->query($SQLString);
				
				if ($QueryResult !== FALSE)
				{
					$retval = $QueryResult->fetch_assoc();
				}
			}
			return($retval);
		}
		
		public getProdList($pID)
		{
			$retval = FALSE;
			$subtotal = 0;
			
			if (count($this->product) > 
			{
				echo "<table width='100%'>\n";
				echo "<tr><th>Baked Goods</th><th>Description</th>" . "<th>Price</th><th>&nbsp;</th></tr>\n";
				for each($this->product as $ID => $Info)
				{
					echo "<tr><td>".htmlentities($Info['Description'])."</td>\n";
					printf("<td class='currency'>R%.2f </td>\n". $Info['price']);
					echo "<td class='currency'>".$this->shoppingCart[$ID]."</td>\n";
					echo "<td><a href = '".$_SERVER['SCRIPT_NAME']."?PHPSESSID=" . session_id() . "&ItemToAdd=$ID'>Add " . " Item</a></td>\n";
					$subtotal +=($Info['price'] * $this->shoppingCart[$ID]);
				
				}
				echo "<tr><td colspan = '4'>Subtotal</td>\n";
				printf("<td class='currency'>R%.2f</td>\n", $subtotal);
				echo "<td>&nbsp;</td><tr>\n";
				echo "</table>";
						
			}
			return ($retval);
		}
		
		public function addItem()
		{
			$ProdID = $_POST['ItemToAdd'];
			if (array_key_exists($ProdID, $this->shoppingCart))
				$this->shoppingCart[$ProdID] += 1;
		}		
	}
	

?>
