<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta content="charset=utf-8" />
</head>
<body>
	<form method="get" action="search.php">
			<input type="text" name="query" />
			<input type="submit" value="Search" />
		  </form>
	<?php
		$query = $_GET['query'];
		$query = preg_replace("|[^A-Za-z0-9]|", '', $query );
		$query = str_replace(' ', '', $query);
		
		$url = 'file:///users/tutors/mhtest15/share/shakespeare/home.html';
		
		$contents = (string) file_get_contents($url);
		
		if(strpos($contents, $query) !== false){
			$firstIndex =strpos($contents, $query);
			$secondIndex = $firstIndex;
			$subString = substr($contents, $secondIndex, 1);
			
			while(substr($contents, $secondIndex, 1) !== '/'){
				$secondIndex++;
			}
			$fullPlayName = substr($contents, $firstIndex, $secondIndex - $firstIndex);
			$page = 'https://ebooks.adelaide.edu.au/s/shakespeare/william/'. $fullPlayName .'/index.html';
			echo "<a href='".$page."''><b>We have found your search query. Click here to proceed</a>";
		}
		else {
			echo "<p>Not found</p>";
		}
	?>
</body>
</html>
