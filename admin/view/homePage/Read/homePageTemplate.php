<?php
function ellipsis($text, $max = 150, $append = '&#8230;') {
	if (strlen($text) <= $max)
		return $text;
	$out = substr($text, 0, $max);
	if (strpos($text, ' ') === FALSE)
		return $out . $append;
	return preg_replace('/\w+$/', '', $out) . $append;
}

if($data != null):
?>


<article>
	<h1><a href="?editSlideshow">Slideshow Editor</a></h1>

	<h1>Content</h1>
	<table width="100%" border="1" cellpadding="5">
	  <tr>
		<th width="20%"scope="row">Title</td>
		<th width="30%">Created</td>
		<th width="30%">Last Modified</td>
		<th width="10%">Action</td>
	  </tr>
	  
	  

	<?php foreach($data as $row){ ?>
		<tr>
		<td scope="row"><a class="articleTitle" href="?home_articleId=<?php echo $row['article_id']; ?>"><?php echo $row['article_title']; ?></td>
		<!--<td><?php //echo $content; ?></td>-->
		<td><span class="articleDateTime">
					<?php
					$datetime = strtotime($row['article_time']);
					$mysqldate = date("g:ia, l jS F Y", $datetime);
					echo "Posted on " . $mysqldate;
				 	?>
			 	</span></td>
		<td><span class="articleDateTime">
					<?php
					$datetime = strtotime($row['article_last_modified']);
					$mysqldate = date("g:ia, l jS F Y", $datetime);
					echo "Modified on " . $mysqldate;
				 	?>
			 	</span></td>
		 <td><a href="?editHome=<?php echo $row['article_id']; ?>">Edit</a></td>
	  </tr>
		<?php
	}

	?>
	</table>
	
	
	<?php foreach($data as $row): ?>
	<section>
		<article>
			<h3></a></h3>
			<p></p>
			
			<p>
				
 			</p>
		</article>
	</section>
	
	<?php endforeach; ?>
</article>
<?php
else:
	?>

<article>
	<h1>Content</h1>
	<p>No posts found. Please try adding one.</p>
</article>

<?php
endif;
?>