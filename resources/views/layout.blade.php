<html>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<head>
		<style>
			#header {
			    background-color:black;
			    color:white;
			    text-align:center;
			    padding:5px;
			}
			#drop {
			    line-height:30px;
			    background-color:#eeeeee;
			    height:100%;
			    width:165px;
			    float:left;
			    padding:10px;	      
			}
			#p {
				font-family: "Helvetica";
			}
		</style>
	</head>
    <body>
    	<div id="header">
    		<h1>Presidents of the United States</h1>
    	</div>
        <div id="drop">
        	<br>
        	<?php

				$username = "artur";
				$password = "1022";
				$hostname = "localhost";

				//connection to the database
				$link = mysqli_connect($hostname, $username, $password) 
				  or die("Unable to connect to MySQL");

				//select a database to work with
				$selected = mysqli_select_db($link,"presidents_db") 
				  or die("Could not select presidents_db");

				//execute the SQL query and return records
				$result = mysqli_query($link,"SELECT name FROM president");
				
				//fetch the data from the database
				$presidents = array();
				while ($row = mysqli_fetch_array($result)) {
				   array_push($presidents, $row{'name'});
				}

				echo Form::open(array('/' => '/president.php'));
					echo Form::select('president', $presidents);
					echo Form::submit('Submit');
					$presidents = Input::get('president')+1;
				echo Form::close();

				//close the connection
				mysqli_close($link);
			?>
			<br>
        </div>
      	<?php

			$username = "artur";
			$password = "1022";
			$hostname = "localhost";

			//connection to the database
			$link = mysqli_connect($hostname, $username, $password) 
			  or die("Unable to connect to MySQL");

			//select a database to work with
			$selected = mysqli_select_db($link,"presidents_db") 
			  or die("Could not select interview");

			//execute the SQL query and return records
			$result = mysqli_query($link,"SELECT name FROM president");
			
			//fetch the data from the database
			$presidents = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($presidents, $row{'name'});
			}

			echo Form::open(array('/' => '/president.php'));
				$president = Input::get('president')+1;
			echo Form::close();

			//execute the SQL query and return book titles
			$result = mysqli_query($link,"SELECT city FROM president WHERE ID = $president");
			//fetch the data from the database
			$cities = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($cities, $row{'city'});
			}

			//execute the SQL query and return book titles
			$result = mysqli_query($link,"SELECT state FROM president WHERE ID = $president");
			//fetch the data from the database
			$states = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($states, $row{'state'});
			}

			//execute the SQL query and return book titles
			$result = mysqli_query($link,"SELECT birth FROM president WHERE ID = $president");
			//fetch the data from the database
			$births = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($births, $row{'birth'});
			}

			//execute the SQL query and return book titles
			$result = mysqli_query($link,"SELECT death FROM president WHERE ID = $president");
			//fetch the data from the database
			$deaths = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($deaths, $row{'death'});
			}

			//execute the SQL query and return book titles
			$result = mysqli_query($link,"SELECT years FROM office WHERE ID = $president");
			//fetch the data from the database
			$years = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($years, $row{'years'});
			}

			//execute the SQL query and return book titles
			$result = mysqli_query($link,"SELECT vps FROM office WHERE ID = $president");
			//fetch the data from the database
			$vps = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($vps, $row{'vps'});
			}

			//execute the SQL query and return book titles
			$result = mysqli_query($link,"SELECT parties FROM office WHERE ID = $president");
			//fetch the data from the database
			$parties = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($parties, $row{'parties'});
			}

			//execute the SQL query and return book titles
			$result = mysqli_query($link,"SELECT accomplishments FROM facts WHERE ID = $president");
			//fetch the data from the database
			$facts = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($facts, $row{'accomplishments'});
			}

			//execute the SQL query and return text
			$result = mysqli_query($link,"SELECT fun_facts FROM facts WHERE ID = $president");
			
			//fetch the data from the database
			$fun_facts = array();
			while ($row = mysqli_fetch_array($result)) {
			   array_push($fun_facts, $row{'fun_facts'});
			}

			//display the book title then the text
			$max = count($facts);
			
			//close the connection
			mysqli_close($link);
		?>

		<!-- present the data from the database -->
		<div id="p">
	        <h2>{{ $presidents[$president-1] }}</h2>
	        @for ($i = 0; $i < $max; $i++)
	        	<h3>Birth City</h3>
	        	<p>{{ utf8_encode($cities[$i]) }}</p>
	        	<h3>Birth State</h3>
	        	<p>{{ utf8_encode($states[$i]) }}</p>
	        	<h3>Birth Date</h3>
	        	<p>{{ utf8_encode($births[$i]) }}</p>
	        	<h3>Death Date</h3>
	        	<p>{{ utf8_encode($deaths[$i]) }}</p>
	        	<h3>Years in Office</h3>
	        	<p>{{ utf8_encode($years[$i]) }}</p>
	        	<h3>Vice Presidents</h3>
	        	<p>{{ utf8_encode($vps[$i]) }}</p>
	        	<h3>Political Parties</h3>
	        	<p>{{ utf8_encode($parties[$i]) }}</p>
	        	<h3>Accomplishments</h3>
	        	<p>{{ utf8_encode($facts[$i]) }}</p>
	        	<h3>Fun Facts</h3>
	        	<p>{{ utf8_encode($fun_facts[$i]) }}</p>
	        @endfor
    	</div>

    </body>
</html>

