<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta content="charset=utf-8" />
</head>
<body>
	<?php
		$play = $_GET['playName'];
		$plays = 'file:///users/tutors/mhtest15/share/shakespeare/home.html';
		$playDetails = (string) file_get_contents($plays);
		
		if(strpos($playDetails, $play) !== false){
			$start =strpos($contents, $play);
			$end = $start;
			$subString = substr($contents, $end, 1);
			
			while(substr($playDetails, $end, 1) !== '/'){
				$end++;
			}
			$fullName = substr($playDetails, $start, $end - $start);
			$web = 'https://ebooks.adelaide.edu.au/s/shakespeare/william/'. $fullName .'/index.html';
			echo "<a href='".$web."''><b>We have found your search query. Click here to proceed</a>";
		}
		else {
			echo "<p>Not found</p>";
		}
	?>
</body>
</html>
