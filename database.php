<?php
/** MySQL database name */
define('DB_NAME', 'a2893458_exams');

/** MySQL database username */
define('DB_USER', 'a2893458_exams');

/** MySQL database password */
define('DB_PASSWORD', 'exams@123');

/** MySQL hostname */
define('DB_HOST', 'mysql3.000webhost.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
	
/** The Database Port number. Don't change this if in doubt. */
define('DB_PORT', '3306');
function getconnect(){
	return mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME,DB_PORT);
}	
?>