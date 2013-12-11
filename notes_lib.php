<?php
	/*
		Alberto Ortega (a0rtega) - alberto[at]pentbox[dot]net

		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		(at your option) any later version.

		http://www.gnu.org/licenses/
	*/
	function connect_db() {
		$conn = mysql_connect("localhost", "user", "pass") or die ("<h1>Error connecting DB</h1>");
		mysql_select_db("notes_database") or die ("<h1>Error connecting DB</h1>");
		return $conn;
	}
	function show_title($text) {
		echo "<center><font id=title>" . $text . "</font></center>";
	}
	function is_https() {
		if ($_SERVER["SERVER_PORT"] != 443) {
			return false;
		}
		else {
			return true;
		}
	}
	function rand_id() {
		$chars = array ("A", "B", "C", "D", "E", "F", "G", "H",
		"I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
		"S", "T", "U", "V", "W", "X", "Y", "Z", "1", "2",
		"3", "5", "6", "7", "8", "9"); // 33
		$id = "";
		for ($i = 0; $i < 25; $i++) {
			$id = $id . $chars[mt_rand(0, 33)];
		}
		return strtolower($id);
	}
	function rand_key() {
		$chars = array ("A", "B", "C", "D", "E", "F", "G", "H",
		"I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
		"S", "T", "U", "V", "W", "X", "Y", "Z", "1", "2",
		"3", "5", "6", "7", "8", "9"); // 33
		$key = "";
		for ($i = 0; $i < 32; $i++) {
			if (mt_rand() % 2 == 0) {
				$key = $key . strtolower($chars[mt_rand(0, 33)]);
			}
			else {
				$key = $key . $chars[mt_rand(0, 33)];
			}
		}
		return $key;
	}
	function sanit_xss($string) {
		return htmlentities($string, ENT_QUOTES);
	}
	function encrypt_note($data, $key) {
		$mod = mcrypt_module_open("rijndael-256", "", "cbc", "");
		$iv = base64_encode(mcrypt_create_iv(mcrypt_enc_get_iv_size($mod), MCRYPT_DEV_URANDOM));
		mcrypt_generic_init($mod, $key, base64_decode($iv));
		$crypted = mcrypt_generic($mod, $data);
		$crypted = base64_encode($crypted);
		mcrypt_generic_deinit($mod);
		mcrypt_module_close($mod);
		return array ($crypted, $iv);
	}
	function decrypt_note($data, $key, $iv) {
		$data = base64_decode($data);
		$iv = base64_decode($iv);
		$mod = mcrypt_module_open("rijndael-256", "", "cbc", "");
		mcrypt_generic_init($mod, $key, $iv);
		$decrypted = mdecrypt_generic($mod, $data);
		mcrypt_generic_deinit($mod);
		mcrypt_module_close($mod);
		return rtrim($decrypted, "\0");
	}
?>
