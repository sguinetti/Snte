
REQUIREMENTS
	
- PHP >= 5
	
- php5-mcrypt
	
- mysql-server
	
- php5-mysql
	
- apache with HTTPS support (if not, you must modify the source code)



INCLUES
- jQuery (jquery.com)
- Modernizr 
- Twitter Bootstrap

INSTALLATION
	
- Create table for notes (from MyPhpAdmin or other):

	"create table note (			"
	"	id varchar(30) primary key,	"
	"	token varchar(45),		"
	"	creation date);			"
- Extract files

	
- chmod 777 ./notes or do it writable for php scripts

	
- Edit connect_db() function in notes_lib.php
	setting up your configuration.

	
- Have fun

 

TRANKS
- a0rtega (initial concept), 
http://securitybydefault.com/

