<div id="mainContent">
	<div id="content">
<?php 
	$articleTitle = $blogNotice['article_title'];
	$articleBody = $blogNotice['article_body'];
	echo '<h1>'.$articleTitle.'</h1>';
	echo $articleBody;
?>



<div id="blogMainCont">
<?php

if($data != null)
{
?>
<article>

<div id="userInfo2">
<?php
	
		if(isset($_SESSION['userLoggedin']))
		{
					?>
					<div id="userDisplayImage">
					<?php
					if($userDetails['user_avatar'] != NULL)
					{
						?><img src="<?php echo SITEROOT  . "forum/download/file.php?avatar=" . $userDetails['user_avatar']?>" height=100 width=100><?php
					}
					else
					{
						?><img src="<?php echo SITEROOT?>includes/img/user.jpg" height=100 width=100><?php
					}
					?>
					</div>
					<div id="testIdLockie">
						<h4 class="center"><?php echo $userDetails['username']?></h4>
						<p class="center">Click <a href="?logout">here</a> to logout</p>
					</div>
				<?php
		}
		else
		{
			?>
			<span id="center">You are not currently logged in. Click <a href="?login">here</a> to login or click <a href="?register">here</a> to register</span>
			<?php
		}
		?>
</div>

	<div id="blogContainer">
			<h1 class="center">Blog posts</h1>
				

			<?php 
			foreach($data as $row)
			{			?>
				<div class="blogPost">
					<h3><a class="blogTitle" href="?blog&action=view&blogId=<?php echo $row['blog_id']; ?>"><?php echo $row['blog_title']; ?></a></h3>
					<p><?php echo ($row['blog_body']); ?></p>
					<p>
						<span class="blogDateTime">
							<?php
							$datetime = strtotime($row['blog_time']);
							$mysqldate = date("g:ia, l jS F Y", $datetime);
							echo "Posted by: " . $row['user_name'] . " on " . $mysqldate;
							?>
						</span>
					</p>
				</div>
			<?php
			}?>
	</div>
	
	<?php
	}
	else
	{
		?>
			<div id="blogContainer">
			<h1>Blog posts</h1>
			<p>No posts found. Please try going back one page.</p>
		</div>
	<?php
	}
$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"); 
?>




<div id="sideContainer">
	
		<div id="monthLinks">
			<h4 class="center">Select Blogs by Month</h4>
			<?php 
			for($i=0; $i<count($months); $i++)
			{
				echo $months[$i] . "</br>";
			}
		?>
		</div>
		
</div>

</div>

	</div>
</div>
</article>