<!DOCTYPE html>
<?php
	session_start();
	include_once "function.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Playlists</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="default.css" />
</head>

<?php
	$username = $_SESSION['username'];
	if(isset($_POST['playlistname'])) {
		$playlistname = $_POST['playlistname'];

		$query = "DELETE FROM user_playlists WHERE playlist='$playlistname' AND username='$username'";
		$result = mysqli_query($con, $query );

		$query = "DELETE FROM playlists WHERE playlist='$playlistname' AND username='$username'";
		$result = mysqli_query($con, $query );
	}
	if(isset($_POST['mediaid'])) {
		$mediaid = $_POST['mediaid'];
		$query = "DELETE FROM playlists WHERE mediaid='$mediaid' AND username='$username'";
		$result = mysqli_query($con, $query );
		if(!$result){
			echo mysqli_error($con);
		}
	}

?>

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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style = 'color:black'>Playlist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="browse.php" method="post">
				<div class = "row" >
				<input class = "form-control " name="new_playlist" type="text" placeholder="new playlist..." maxlength="20" style ="width:50%; margin-left:5%; margin-right:1%;"> 
				<button class = "btn btn-primary " type="submit" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Create a Playlist</button>
	</div>
			

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		   
      </div>
	</form>
    </div>
  </div>
</div>
<?php if(isset($_POST['new_playlist'])){
		$new_playlist = $_POST['new_playlist'];
		$query = "SELECT playlist FROM user_playlists WHERE username='$username' and playlist='$new_playlist'";
		$playlist_result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($playlist_result);
		if(!$row) {
			$query = "INSERT into user_playlists(playlist, username) VALUES('$new_playlist', '$username')";
			$new_playlist_result = mysqli_query($con, $query);
		}

		if($row) {
			echo 'You already have a playlist with that name.';
		}
	}?>
	
<?php
	$user = $_GET['user'];

	$query = "SELECT playlist FROM user_playlists WHERE username='$user'";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);

	if ($count < 1){
		echo "You have no playlists.";
	}

	while($row = mysqli_fetch_row($result)){
		$playlistname = $row[0]; ?>
		<table class = 'table' style = ' text-align:center;margin-left:20%;margin-top:5%;color:white;width:50%'>
			<tr>
				<th scope = 'col' > <?php echo $row[0]; ?></th>
				<th scope = 'col'>&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th scope = 'col'>
					<?php $path = "manage_playlists.php?user=".$_GET['user']; ?>
					<form action=<?php echo $path ?> method="post">
						<input type="hidden" name="playlistname" value="<?php echo $playlistname; ?>">
						<input class = 'btn btn-danger' type="submit" value="Delete Playlist">
					</form><br>
				</th>
			</tr>
			<?php
				$query = "SELECT media.mediaid, title FROM media INNER JOIN playlists ON media.mediaid=playlists.mediaid WHERE playlists.username='$username' AND playlists.playlist='$playlistname'";
				
				$titles = mysqli_query($con, $query);
				if(!$titles){
					echo mysqli_error($con);
				}
				while($title = mysqli_fetch_row($titles)) {
					
					$mediaid = $title[0]; ?>
					<tr>
						<td><?php echo $title[1]; ?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>
							<?php $path = "manage_playlists.php?user=".$_GET['user']; ?>
							<form action=<?php echo $path ?> method="post">
								<input type="hidden" name="mediaid" value="<?php echo $mediaid; ?>">
								<input class = ' btn btn-danger' type="submit" value="Delete Media">
							</form><br>
						</td>
					</tr>
				<?php } ?>
	
		</table>
	<?php } ?>

	
</body>
</html>
