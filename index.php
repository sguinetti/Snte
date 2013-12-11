<?php
	require "./header.php";
	show_header("Safe webnotes");
?>
<body>
<?php
	require "./notes_lib.php";
	if (is_https() == false) {
		echo "<script>window.location=\"https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . "\"</script>";
	}
	else {
?>
	<?php show_title("Create note"); ?><br>
	<center>
	<font>Create a note -> Send it -> Read and destroy</font>
	<form method=post action=submit.php>
	<table>
	<tr><td><textarea name=note rows=25 cols=100></textarea></td></tr>
	<tr align=right><td><input id=sub_but type=submit name=upload value=Upload></td></tr>
	</table>
	</form>
	<br>
	<table>
	<tr><td align=left><font>- Notes encrypted with AES (Rijndael) 256 CBC using token (random) as encryption key.</font></td></tr>
	<tr><td align=left><font>- Tokens stored with sha1(sha1()), only the client can decrypt notes.</font></td></tr>
	<tr><td align=left><font>- Tokens and encrypted notes aren't in the same location.</font></td></tr>
	</table>
	<br>
	<font>Notes are <b>self destroyed</b> when read.</font><br><br>
	</center>
<?php
	}
?>
</body>
</html>

