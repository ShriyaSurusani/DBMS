<?php
session_start();

include_once "function.php";

?>

<head> 
<title>Add Group</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="default.css" />
</head>
<body style = "background-image:url(img/bg.png) !important; color:white !important; ">

<nav class="navbar navbar-expand-lg bg-danger">
  <a class="navbar-brand" href="browse.php"><img src="img/metube.png" width="80" height="40" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      
<form class="form-inline" action="browseFilter.php" method="post" style ="width:50rem; margin-left:20%">
    <input class="form-control mr-sm-2" type="search" name="searchwords" placeholder="" aria-label="Search" style ="margin-left:25%; width:50%;">
    <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
  </form>
  </div>
  
  
<?php
	if (! empty($_SESSION['logged_in']))
	{
		echo "
		<a href='update.php'style= 'color:white !important; margin-left:19%; '> 
		<button type='button' class='btn  ' ><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16' style= 'color:white !important; '>
		<path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
		
	  </svg>   <span class = 'text-white'>
	  ".$_SESSION['username'],"</span>
		</button>
		</a>";
	}
	else {
		echo "
		<a href='index.php'style= 'color:white !important; margin-left:19%; '> 
		<button type='button ' class='btn   ' ><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16' style= 'color:white !important; '>
		<path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
		
	  </svg>   <span class = 'text-white'>
	  SIGN IN</span>
		</button>
		</a>";
	}

	if(isset($_POST['search'])){

	}

  ?>
  </div>
</nav>

<?php
$username = $_SESSION['username'];

if(isset($_POST['submit'])) {
		if($_POST['groupname'] == "") {
			$contact_error = "Please enter a Group name.";
		}
		if($_POST['topic'] == "") {
			$contact_error = "Please enter the Topic to be discussed.";
		}
		else {
			$groupname = $_POST['groupname'];
			$topic = $_POST['topic'];
			$discussion = $_POST['discussion'];
			$check = addGroup($_SESSION['username'], $groupname, $topic, $discussion);

			if($check==1) {
				$contact_error = "".$groupname." already exists";
			}
			else if($check==2){
				$contact_error = "Some other error.";
			}	
			else if($check==0){
				echo "Group created successfully";
			}
		}
}


 
?>
	<form method="post" action="<?php echo "add_group.php"; ?>">

	<table width="100%" style = 'margin:15%' >
		<tr>
			<td  width="20%">Group Name:</td>
			<td width="80%"><input class="text"  type="text" name="groupname" maxlength="15"><br /></td>
		</tr>
		<tr>
			<td  width="20%">Topic:</td>
			<td width="80%"><input class="text"  type="text" name="topic" maxlength="15"><br /></td>
		</tr>
		<tr>
			<td  width="20%">Discussion:</td>
			<td width="80%"><input class="text"  type="text" name="discussion" maxlength="15"><br /></td>
		</tr>
        <tr>
		<td></td>
		<td><input class = 'btn btn-primary' name="submit" type="submit" value="Submit"><br /></td>
		</tr>
	</table>
	</form>



<?php
  if(isset($contact_error))
   {  
   	echo "<div>".$contact_error."</div>";
	}
//SELECT id, username, email FROM users INNER JOIN user_contact ON users.id = user_contact.contactid WHERE user_contact.userid='3';
?>
