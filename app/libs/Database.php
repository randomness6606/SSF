<?php

class Database {

	public $query;
	public $result;
	
	public function __construct() {
		mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error());
	}
	
	public function num_rows($q) {
		/* echo '<b>'.mysql_num_rows($q).'</b>'; */
		$this->result = mysql_num_rows($q);
	}
	
	public function fetch_assoc() {
		$this->result = mysql_fetch_assoc($this->query) or die(mysql_error());
	}
	
	public function fetch_array() {
		$this->result = mysql_fetch_assoc($this->query) or die(mysql_error());
	}
	
	public function query($q) {
		$this->query = mysql_query($q) or die(mysql_error());
	}
	
	public function insert($table, $field_names, $data) {
		/*$field_names = implode($field_names, ',');
		$data = implode($data, ',');*/
		$this->query = mysql_query("INSERT INTO $table ($field_names) VALUES ('$data')");
	}
	
	public function select($amount, $table, $conditions) {
		$this->query = mysql_query("SELECT $amount FROM $table $conditions") or die(mysql_error());
	}
	
	public function update($table, $values, $conditions) {
		$this->query = mysql_query("UPDATE $table SET $values $conditions") or die(mysql_error());
	}
	
	public function delete($field, $table, $conditions) {
		$this->query = mysql_query("DELETE $field FROM $table $conditions");
	}
	
	
	
}