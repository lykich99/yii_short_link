yii_short_link
==============

************************** <a href="http://lweb.pl.ua/yii_short_link">YII укоротитель ссылок </a>******************
<br>
*************************  <a href="http://lweb.pl.ua/yii_short_link">YII short link </a> ****************


1. Copy for this repository in directory accessible to the Web server. You can make this.
  
    git clone git@github.com:lykich99/yii_short_link.git  OR download on tar.gz
    
2. Create table for database, this example for mysql. 
   
    CREATE TABLE `link` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `long_link` varchar(255) NOT NULL,
			  `short_link` varchar(255) NOT NULL,
			  PRIMARY KEY (`id`),
			  UNIQUE KEY `short_link` (`short_link`)
			) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1  
			
			
3. You have to make readable dir (protected/runtime).
   I make this.
   chmod 777 protected/runtime		
   
4. You have to connect your database in protected/config/main.php

  Example 
  	// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=dbname',
			'emulatePrepare' => true,
			'username' => 'username',
			'password' => 'password',
			'charset' => 'utf8',
		)
  
  
  
  

   
