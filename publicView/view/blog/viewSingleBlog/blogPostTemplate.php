<script src="includes/js/comments.js"></script>
<div id="mainContent">
	<div id="content">
<div id="blogMainCont">

<?php
if($data != null)
{
	$datetime = strtotime($data['blog_time']);
	$mysqldate = date("g:ia, l jS F Y", $datetime);			
?>

<article>
<div id="userInfo2">
<?php
	
		if(isset($_SESSION['userLoggedin']))
		{
					?>
					<div id="userDisplayImage">
					<?php
					if($userDetails['user_avatar'] != '')
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
			<p class="center">You are not currently logged in. Click <a href="?login">here</a> to login or click <a href="?register">here</a> to register</p>
			<?php
		}
		?>
</div>
	<div id="singleBlogContainer">
	<h1 class="center"><?php echo $data['blog_title']; ?></h1>
	<p class="center">Posted by: <?php echo $data['user_name']?> on <?php echo $mysqldate?></p>
					
		<div id="blogContent">
			<p><?php echo $data['blog_body']; ?></p>
		</div>
	</div>

<?php
}
else
{
	?>

<article>
	<h1>Blog posts</h1>
	<p>No post found! Please try going back to the previous page you were on.</p>
</article>
	
<?php
}
?>
<div id="blogComments">
	<h4>Comments</h4>
	<?php
			if(isset($_SESSION['userLoggedin']))
			{
			?>
					<div id="reviewContainer">
			<div id="storeReviewsBtn">
				<input id="showDivBtn" type="button" name="answer" value="Show Review Form" onclick="showAddCommentDiv()" />
			</div>
			<div id="welcomeDiv"  style="display:none;" class="answer_list" > 
	<form action="?comment&action=post&blogId=<?php echo$data['blog_id']?>" method="post">
		<textarea id="commentContent" cols="100" rows="5" name="commentContent"></textarea>
		<input type="hidden" name="productId" value="<?php echo $data['product_id']?>"></input>
		<input type="submit" id="commentSubmit" name="submit" value="Post Comment">
	</form>
	</div>
	<?php
	}
	?>
	<div id="comments">

	<?php 
	if(isset($comments))
	{
	foreach($comments as $row): ?>
		<div id="review">
			<div id="userImage">
				<?php 
				if(isset($row[4]) && $row[4] != NULL)
				{
				?>
					<img src="<?php echo SITEROOT  . "forum/download/file.php?avatar=" .  $row[4]?>" width="50" height="50">
				<?php
				}
				else
				{
				?>
					<img src="<?php echo SITEROOT?>includes/img/user.jpg" width="50" height="50">
				<?php
				}
				?>
			</div>
			<div id="reviewDetails">
				<b><?php echo $row[1]?></b></br>
				<?php echo $row[2]?>
				<p>Comment posted on <?php echo $row[3]?></p>
			</div>
		</div>
	<?php endforeach; 
	}
	else
	{
	echo "There are currently no comments on this blog";
	}
	?>
	</div>
</div>
</div>
</div>
</div>
</div>
</article>