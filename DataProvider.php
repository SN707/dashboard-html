<?php
	class DataProvider {
		public static function SelectQuery($sql)
		{

			try{
				//$dbh = new PDO('sqlsrv:Server=192.168.0.15,1433;Database=IFCA_Mobile', 'DESKTOP-AO9MJCD\SQL2012', '');
				$dbh = new PDO('sqlsrv:Server=192.168.0.253,1433;Database=IFCA_Report_Dashboard', 'sa', '@Ifcavn@123');
			}
			catch(PDOException $e){
				echo 'Error connecting to SQL Server';
				echo $e->getMessage();
				}
			if ($dbh != null){
				$sth = $dbh->prepare($sql); 
				$sth->execute();
				$result = $sth->fetchAll(PDO::FETCH_ASSOC);
				$numRow= $sth->rowCount();
				$dbh=null;
		
				if ($numRow >=1 ) {		
						return $result;
						}
				
				else {
					return false;
				}
			}
		}
		public static function ExcuteQuery($sql)
		{
			try {
		//	$dbh = new PDO('sqlsrv:Server=192.168.0.163,1433;Database=IFCA_Mobile', 'sa', '@Ifcavn@@@');  
				$dbh = new PDO('sqlsrv:Server=192.168.0.253,1433;Database=IFCA_Report_Dashboard', 'sa', '@Ifcavn@123');
			}
			catch( PDOException $e ) {
				echo '<h1>Error connecting to SQL Server</h1><pre>';
				echo $e->getMEssage();
				}	
			if ($dbh != null){
			$sth = $dbh->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			$numRow= $sth->rowCount();
			$dbh = null;
			return ($numRow ==1);
			}
		}
}
?>