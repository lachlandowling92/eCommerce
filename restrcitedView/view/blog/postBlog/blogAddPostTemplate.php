<?php
if(isset($_SESSION['username'])):
?>

<article>
	<div id="blogContainer">
			<h3 class="center">Add a blog post</h3>
			<form action="?addPost" method="post">
				<label>Blog title:</label><br />
				<input type="text" name="title"/><br /><br />
				<label>Blog body:</label><br />
				<textarea rows="10" cols="75" rows="5" name="body"></textarea><br /><br />
				<input type="hidden" name="blogAuthor" value="<?php echo $_SESSION['username']; ?>" />				
				<input type="submit" name="addPostSubmit" />
			</form>

</div>

<div id="sideContainer">
	<?php
	if(isset($_SESSION['userLoggedin']))
				{
				?>
	<div id="userDisplayPic">
		<img src="BlogMVC/includes/images/user.jpg" height=100 width=100>
	</div>
	<div id="userInfo">
	<h4 class="center">UserName</h4>
	<p class="center">Member Since xxxx-xx-xx</p>
	</div>
	<div id="updateDetails">
	Add Blog
	<a href="<?php echo SITE_ROOT?>/index.php?location=page2&action=view" class="linkBtn">Test</a>
	Update Details
	Change Display Picture
	Change Password
	Logout
	</div>
	<?php
	}
	else
	{
	?>
	<h4 class="center">User Not Logged in</h4>
	<form>
	<input type="text" name="userName" placeholder="User Name"></input>
	<input type="password" name="password" placeholder="Password"></input></br>
	<input type="submit" name="login" value="Login"></input></br>
	Not registered? Click <a href="?register">here</a> to register
	<?php
	}
	?>
</div>
</article>
<?php
else:
?>
<article>
	<h1><?php echo $data['blog_title']; ?></h1>
	<section>			
		<p>You are not logged in! Please log in first.</p>			
	</section>
</article>
<?php
endif;
?>