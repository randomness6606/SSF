<?php

class Form {
	
	public $error = array();
	
	public function __construct() {}
	
	public function start($action, $method, $enctype = false) {
		if ($enctype == false) {
			if (!empty($action['controller']) || isset($action['controller'])) {
				$url = URL.$action['controller'].'/'.$action['action'];
			} else {
				$url = $action['action'];
			}
			echo "<form action='$url' method='$method'>";
		} else {
			echo "<form action='$url' method='$method' enctype='multipart/form-data'>"; 
		}	
	}
	
	public function add($type, $name, $val = false, $option_name = false, $rows = false, $cols = false) {
		if ($attr == false) {
			switch ($type) {
				case text:
					echo "<input type='text' name='$name' id='$name' class='textbox' />";
					break;
				case password:
					echo "<input type='password' name='$name' id='$name' class='textbox' />";
					break;
				case radio:
					echo "<input type='radio' name='$name' value='$val' class='radio' />";
					break;
				case checkbox:
					echo "<input type='checkbox' name='$name' value='$val' class='checkbox' />";
					break;
				case select:
					echo "<select name=$name class='select'>
						  <option value=$val class='option'>$option_name</option>
						  </select>
						  ";
					break;
				case textarea:
					echo "<textarea name=$name rows=$rows cols=$cols>$val</textarea>";	
					break;
				case label: 
					echo "<b>$name</b>";
					break;
				case submit:
					echo "<input type='submit' name=$name value='$val' id=$name class=btn>";
					break;
			}
		} else {
		
		}
	}
	
	public function end() {
		echo "</form>";
	}
	
	public function sanatize($s) {
			$s = strip_tags($s);
			$s = filter_var($s, FILTER_SANITIZE_STRING);
			$s = preg_replace("/(from|select|insert|delete|where|drop table|like|show tables|\’|'\| |=|-|;|,|\|’||#|\*|–|\\\\)/", "" ,$s);
			$s = trim($s);
			$s = strip_tags($s);
			$s = (get_magic_quotes_gpc()) ? stripslashes($s) : mysql_real_escape_string($s);
			$s = htmlentities($s);
			return $s;
	}
	
	public function validates_presence($s, $error = 'empty') {
		if (!empty($s)) {
			return true;
		} else {
			$this->error['presence'] = $error;
			return false;
		}
	}
	
	public function validates_uniqueness($table, $field, $value, $error = 'not unique') {
		$db = new Database();
		$db->query("SELECT $field FROM $table WHERE $field='$value'");
		$db->num_rows($db->query);
		if ($db->result > 0) {
			$this->error['unique'] = $error;
		} else {
			return true;
		}
	}
	
	public function validates_email($s, $error) {
		if (filter_var($s, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
			$this->error['email'] = $error;
		}
	}
	
	public function hash($s) {
		return md5(md5($s));
	}
}