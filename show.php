<?php
	require "./header.php";
	show_header("Read note");
?>
<body>
<?php
	require "./notes_lib.php";
	if (isset($_GET["id"]) && isset($_GET["token"]) && is_https() != false) {
		// Check token
		$conn = connect_db();
		$id = mysql_real_escape_string(strtolower($_GET["id"]), $conn);
		$token = mysql_real_escape_string($_GET["token"], $conn);
		$query = mysql_query("select * from note where id = '" . $id . "' and token = '" . sha1(sha1($token)) . "';", $conn);
		if (mysql_num_rows($query) == 0) {
			mysql_close($conn);
?>
	<?php show_title("404 note not found"); ?><br>
	<center>
	<font>
	ID or token invalid,<br>
	probably this note has been read and destroyed.<br><br>
	Go to <a href="index.php">index</a>.
	</font>
	</center>
<?php
		}
		else {
			// Note found
			$date = mysql_fetch_row($query);
			$date = $date[2];
			$crypted = file_get_contents("./notes/" . $id . ".note");
			$iv = file_get_contents("./notes/" . $id . ".iv");
			$note = decrypt_note($crypted, $token, $iv);
			// Delete it
			mysql_query("delete from note where id = '" . $id . "' and token = '" . sha1(sha1($token)) . "';", $conn);
			mysql_close($conn);
			unlink("./notes/" . $id . ".note");
			unlink("./notes/" . $id . ".iv");
?>
	<?php show_title("Read note"); ?><br>
	<center>
		<table>
		<tr><td align=right><font><i><?php echo $date; ?></i></font></td></tr>
		<tr><td><textarea name=note rows=25 cols=100 readonly=readonly>
<?php echo $note; ?></textarea></td></tr>
		</table>
		<font>
		This note has been <b>destroyed</b>. Save it now or don't cry.<br><br>
		Go to <a href="index.php">index</a>.
		</font>
	</center>
<?php
		}
	}
	else {
?>
	<script>window.location="index.php"</script>
<?php
	}
?>
</body>
</html>

