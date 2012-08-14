<?php
// If the page is loaded via PJAX, you will need to supply the title of the page once again like this:  
$this->pjax_title($this->title); 
?>

<center>
	<h1> Welcome to the Small Simple Framework! :D </h1><br />
	<span>
		The controller of this page is located at: <b>app/controller/index_controller.php</b><br /><br />
		It's representative view is located at: <b>app/views/index/index.php</b>
		<br />
		<br />
		Please configure the <b>app/config/globals.php</b> file before anything. You can also define your database settings in the <b>app/config/database.php</b> file.
		<br />
		<br />
		<h2>Have Fun!</h2>
		<br />
	</span>
</center>