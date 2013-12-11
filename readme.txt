
REQUIREMENTS
	
- PHP >= 5
	
- php5-mcrypt
	
- mysql-server
	
- php5-mysql
	
- apache with HTTPS support (if not, you must modify the source code)



INCLUES
- Font Awesome (http://fortawesome.github.com/Font-Awesome/)
- jQuery (jquery.com)
- html5shiv.js (@afarkas @jdalton @jon_neal @rem)
- jquery.dropotron (n33.co)
- skelJS (skeljs.org)

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

 ("a0rtega" 
http://securitybydefault.com/

)