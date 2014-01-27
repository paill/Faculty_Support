<?php
	//specify complete path to the resource
	define("DEV_LOCAL", "localhost");
	define("DEV_CJT", "cjturner-g5.ucdavis.edu");
	define("PRODUCTION", "facultysupport.ucdavis.edu");
	define("PRODUCTION_2", "facultysupport");
	
	switch($_SERVER["HTTP_HOST"]){
		case DEV_LOCAL:
			$path = "http://localhost/~psalessi/Faculty_Support";
			break;
		case DEV_CJT:
			$path = "http://cjturner-g5.ucdavis.edu/~cjturner/facultysupport";
			break;
		case PRODUCTION:
			$path = "http://facultysupport.ucdavis.edu";
			break;
		case PRODUCTION_2:
			$path = "http://facultysupport.ucdavis.edu";
			break;
		default:
			die("Unrecognized HOST in _SERVER[HTTP_HOST] = " . $_SERVER["HTTP_HOST"]);		
	}

	echo "<ul>";
	echo "<li><a href = '$path'>Home</a></li>";
	echo "<li><a href = 'http://cts.ucdavis.edu'>Classroom Technology Services</a></li>";
	echo "<li><a href='http://fmfp.ucdavis.edu'>Faculty Mentoring Faculty Program</a></li>";
	echo "<li><a href='$path/techtips'>TechTips</a></li>";
	echo "<li><a href='http://smartsite.ucdavis.edu'>SmartSite</a></li>";
	echo "<li><a href='http://cetl.ucdavis.edu' target = '_new'>Center for Excellence in Teaching and Learning</a></li>";
	echo "<li><a href='$path/research'>Technology Support for Research</a></li>";
	echo "<li><a href ='#'>Resources</a></li>";
	echo "<li><a href='http://itexpress.ucdavis.edu/'>IT Help</a></li>";
	echo "</ul>";
	
?>