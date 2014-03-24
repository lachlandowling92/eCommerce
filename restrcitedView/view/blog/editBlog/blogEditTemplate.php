<article>

<div id="adminBlogContainer">	
<?php if($Posts['blog_status'] == 'Approved')
{
?>
<div id="blogStatusPublished">
	<p>The status of this blog is currently Published</p>
	<a href="">Unpublish</a> || <a href="">Back to blog admin</a>
</div>
<?php
}
else
{
?>
<div id="blogStatusPending">
	<p>The status of this blog is currently unpublished</p>
	<a href="">Publish</a> || <a href="">Back to blog admin</a>
</div>
<?php
}
?>

<div id="blogEditContent">
	<h2><?php echo $Posts['blog_title']?></h2>
	<h5>Blog written by: <?php echo $Posts['blog_author']?></h5>
	<h6>Date: <?php echo $Posts['blog_time']?></h6>
	<a href="">Edit Blog Content</a></br>
	<?php echo $Posts['blog_body']?>
		
		<?php 
		foreach($comments as $comment)
		{
		?>
<?php echo $comment['comment_content']?>
				<?php echo $comment['userName']?>
				<?php echo $comment['comment_time']?>
				Delete

		<?php
		}
		?>

		
</div>

</div>


</article>