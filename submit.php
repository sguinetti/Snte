<?php
	/*
		Alberto Ortega (a0rtega) - alberto[at]pentbox[dot]net

		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		(at your option) any later version.

		http://www.gnu.org/licenses/
	*/
	require "./header.php";
	show_header("Submit note");
?>
<body>
<?php
	require "./notes_lib.php";
	if (isset($_POST["note"]) && $_POST["note"] != "" && is_https() != false) {
		$conn = connect_db();
		if ($conn == false) {
			echo "Error connecting to DB.";
		}
		else {
			// Create unique id
			$ids = 1;
			while ($ids != 0) {
				$new_id = rand_id();
				$query = mysql_query("select * from note where id = '" . $new_id . "';", $conn);
				$ids = mysql_num_rows($query);
			}
			// Encrypt note
			$note = sanit_xss($_POST["note"]);
			$key = rand_key();
			$data = encrypt_note($note, $key);
			// Save everything
			file_put_contents("./notes/" . $new_id . ".note", $data[0]);
			file_put_contents("./notes/" . $new_id . ".iv", $data[1]);
			chmod("./notes/" . $new_id . ".note", 0700);
			chmod("./notes/" . $new_id . ".iv", 0700);
			mysql_query("insert into note (id, token, creation) values ('" . $new_id . "', '" . sha1(sha1($key)) . "', '" . date("Y/m/d") . "');", $conn);
			mysql_close($conn);
?>
	<?php show_title("Note submitted!"); ?><br>
	<center>
	<font>
	<?php echo "https://" . $_SERVER["HTTP_HOST"] . str_replace("submit.php", "show.php", $_SERVER["REQUEST_URI"]) . "?id=" . $new_id . "&token=" . $key . "<br><br>\n";?>
	<?php echo "<a href=\"https://" . $_SERVER["HTTP_HOST"] . str_replace("submit.php", "show.php", $_SERVER["REQUEST_URI"]) . "?id=" . $new_id . "&token=" . $key . "\">link</a><br>\n";?>
	<br>
	<b>Remember:</b> The note can be viewed only one time, then it'll be wiped.
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

