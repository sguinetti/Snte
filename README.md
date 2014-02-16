# Simple Note

*A compilation courtesy for use as text messaging self-serving.


##Description
*This is a mechanism like web application that is used in creating autodestruct notes. Once received, it will disappear from the web servers.

##Requirements
*PHP 5 or more.
*mcrypt (see (http://www.php.net/manual/en/book.mcrypt.php)[explication]).
*MySQL installed (or MariaDB) and PhpMyAdmin for managing "tables" (optional).
*Apache server with HTTPS support (if not, you must modify the source code).
*A little calm.

##Instalation
*Download, unzip the files and move with FTP aplication.
*Create table for notes (from MyPhpAdmin or other):

	create table note (		
	id varchar(30) primary key,	
	token varchar(45),		
	creation date);			
*If you know about permissions, note that: chmod 777 ./notes or do it writable for php scripts.
*As there is no automatic installation, you must edit manually from connect_db() function in notes_lib.php
 setting up your configuration.
*Have fun.

##Tranks and License
* Alberto Ortega "a0rtega" (initial concept), 
http://securitybydefault.com/
*[GNU General Public License 2.0 or later](http://www.gnu.org/)
*Includes additional components specified below.
** jQuery (jquery.com)
** Modernizr 
** Twitter Bootstrap

