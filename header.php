<?php
	/*
		AutoHeader
		(C) Alberto Ortega
	*/
	function show_header($title = "Notes") {
		echo "<!doctype html>\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "\t<title>" . $title . "</title>\n";
		echo "\t<link rel=\"shortcut icon\" href=\"favicon.ico\">\n";
		echo "\t<meta name=\"keywords\" content=\"private, notes, note, safe, destroyed, read\">\n";
      	echo "\t<link rel="stylesheet" href="css/bootstrap.min.css">\n";
       	echo "<style>\n";
		echo "body {\n";
		echo "padding-top: 50px;\n";
		echo "padding-bottom: 20px;\n";
		echo "}\n";
		echo "</style>\n";
     		echo "\t<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>\n";
        	echo "\t<link rel="stylesheet" href="css/main.css"/>\n";
        	echo "\t<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"/>\n";
		echo "</head>\n";
	}
?>