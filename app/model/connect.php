<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$database = 'EMMALINE';
$user = 'db2inst1';
$password = 'db2isgood';

$conn = db2_connect($database, $user, $password) or die('Connection failed: '.db2_conn_errormsg($conn));

function dbConnect() {
	global $conn;
   return $conn;
}

function dbQuery($conn,$sql) {
	return db2_exec($conn, $sql, array('cursor' => DB2_SCROLLABLE));
}

function dbExecute($conn,$sql) {
	//global $conn;
   $stmt = db2_prepare($conn, $sql);
   return db2_execute($stmt);
}

// Use for query data from table by using array to define the ordering columns.
function dbFetchArray($conn,$result) {
	return db2_fetch_array($result);
}


function dbFetchRow($result) {
	return db2_fetch_row($result);
}

function dbFreeResult($result) {
	return db2_free_result($result);
}

function dbFetchAssoc($result) {
	return db2_fetch_assoc($result);
}

// This query function return number of rows 

function dbNumRows($result) {
	return db2_num_rows($result);
}

function dbClose() {
	global $conn;
	db2_close($conn);
}

function dbClearStmt($conn,$stmt) {
   db2_free_stmt($stmt);
}

?>