<div id="main" role="main">
<h1 class="center">Blog Admin Page</h1>
<table width="100%">
<tr><thead><th>Video Title</th>
<th>Video URL</th>
<th>Video Description</th>
</thead>
<tbody>
	<?php
		foreach($data as $row){
			echo '<tr>';
			
			echo '<td>';
			echo $row['video_title'];
			echo '</td>';
			
			echo '<td>';
			echo $row['video_link'];
			echo '</td>';
			
			echo '<td>';
			echo $row['video_description'];
			echo '</td>';
	
			echo '</tr>';
		}
	?>
	</tbody>
</table>
</div><!--End Main Div-->