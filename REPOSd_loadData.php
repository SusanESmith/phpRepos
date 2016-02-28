<!--Susan Smith-php repositories call Github API and insert response into table-->
<?php
	function loadData(){
		//connect to db
		require_once('REPOSa_connect_database.php');
		//set user agent
		$context = stream_context_create(array(
		    'http' => array(
		        'user_agent'=> $_SERVER['HTTP_USER_AGENT']
		    )
		));


		//call API and transform response into PHP array
		$json = file_get_contents('https://api.github.com/search/repositories?q=language:php&sort=stars&order=desc', false, $context);
		$data = json_decode($json,true);
		$repos = $data["items"];

			//truncate table
			$query='TRUNCATE Table repos';
			$statement= $db->prepare($query);
			$statement->execute();
			$statement->closeCursor();

		//loop through repos and insert data
		foreach ($repos as $r)
		{

		$repoID=$r['id'];
	  $name=$r['name'];
	  $url=$r['html_url'];
	  $createDate=$r['created_at'];
		$pushDate=$r['pushed_at'];
		$descript=$r['description'];
		$starNum=$r['stargazers_count'];

		$query='INSERT INTO repos(repoID, Name, url, createDate, pushDate, description, starNum)
	  VALUES (:repoID,:Name,:url,:createDate,:pushDate,:description,:starNum)';

		$statement= $db->prepare($query);
		$statement->bindValue(':repoID',$repoID);
		$statement->bindValue(':Name',$name);
		$statement->bindValue(':url',$url);
		$statement->bindValue(':createDate',$createDate);
		$statement->bindValue(':pushDate',$pushDate);
		$statement->bindValue(':description',$descript);
		$statement->bindValue(':starNum',$starNum);
		$statement->execute();
		$statement->closeCursor();
		}
	}

	loadData();
	?>
