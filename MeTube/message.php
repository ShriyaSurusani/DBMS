<!DOCTYPE html>
<?php
	session_start();
	include_once "function.php";
?>	
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Message</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="message.css" />
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
	if(isset($_POST['submit'])){
		$username = $_SESSION['username'];
		$convid = $_GET['id'];
		$msg = $_POST['message'];
		$query = "INSERT INTO messages(convid, msg, sender) VALUES ('$convid', '$msg', '$username')";
		$result = mysqli_query($con, $query);

		if($result){
			$smsg = "Message Created Successfully";
			$msgpath='Location: message.php?id='.$_GET["id"];
			header($msgpath);
		}
		else {
			$fmsg = "Message Failed".mysqli_error($con);
		}
	}
?>
<?php
	$convid = $_GET['id']; 
	$query = "SELECT userA, userB FROM conversations WHERE conversationid='$convid'";
	$users_result = mysqli_query($con, $query);
	$user_row = mysqli_fetch_row($users_result);
	$userA = $user_row[0];
	$userB = $user_row[1];
	$query = "SELECT * FROM messages WHERE convid='".$_GET['id']."'"."ORDER BY timeSent";
	$result = mysqli_query($con, $query);
?>



<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center" style = 'margin-left:8%'>
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h4 class="card-title" style = 'color:black'><strong><?php echo$userB ?></strong></h4> 
                    </div>
                    <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
					<?php
					$result = mysqli_query($con, $query);
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) { if($row[2]==$userA){
	?>
                        <div class="media media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
						
                            <div class="media-body">
                                <p><?php echo $row[1] ?></p>
                                
                                
                            </div>
                        </div>
					<?php }else{?>
                        
                        <div class="media media-chat media-chat-reverse">
                            <div class="media-body">
                                <p><?php echo $row[1] ?></p>
                                
                                
                            </div>
                        </div>
						<?php }}?>
                    </div>
                    <div class="publisher bt-1 border-light">
					<?php 
			$msgpath="message.php?id=".$_GET["id"]; ?> 
				<form method="POST" action=<?php echo $msgpath ?>>
						 <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
						  <input  name="message" class="publisher-input" type="text" placeholder="Write something"> 
						  
  							<input class = 'btn btn-success' name="submit" type="submit" value="Message"></td>
							  </form>
						</div>
                </div>
            </div>
        </div>
    </div>
</div>
