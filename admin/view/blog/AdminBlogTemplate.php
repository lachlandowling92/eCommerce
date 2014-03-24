<article>

<div id="adminBlogContainer">
	<h1 class="center">Blog Admin Page</h1>
	<table width=100%>
		<tr>
			<th>Blog Title</th>
			<th>Blog Author</th>
			<th>Date Posted</th>
			<th>Blog Status</th>
			<th>Edit/Delete</th>
		</tr>
			
		<?php foreach($data as $row)
	{
	$newDate = date("d-m-Y", strtotime($row['blog_time']));
	?>
		<tr>	
			<td><?php echo $row['blog_title']?></td>
			<td><?php echo $row['user_name']?></td>
			<td><?php echo $newDate?></td>
			<td><?php echo $row['blog_status']?></td>
			<td><a href="?location=page6&edit&id=<?php echo $row['blog_id']?>">Edit</a> | Delete</td>
		<?php
	}
	?>
	</table>

</div>


</article>