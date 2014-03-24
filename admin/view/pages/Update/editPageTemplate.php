<?php
//if(isset($_SESSION['username'])):
?>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	theme: "modern",
	plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor"
    ],
	toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
	image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>
<article>
	<h1><?php echo "Edit: " . $data['article_title']; ?></h1>
	<section>			
		<form action="?editPost" method="post">
			<label width="500">Title:</label><br>
			<input width="314" id="title" name="article_title" type="text" style="height:30px; font-size: 20px; width: 700px;" value="<?php echo $data['article_title']; ?>"></input><br><br>
			<label>Content:</label><br>
			<textarea id="content" name="article_body" value="" ><?php echo $data['article_body']; ?></textarea>
			<input type="hidden" name="article_id" value="<?php echo $data['article_id']; ?>">
			<input type="submit" name="editPostSubmit" value="Submit"/>
		</form>
	</section>
</article>

<!--<article>
	<h1><?php echo "Edit: " . $data['article_title']; ?></h1>
	<section>			
		<form action="?editPost" method="post">
			<table width="500" border="1" cellpadding="5">
			  <tr>
				<th width="154" scope="row">Title</th>
				<td width="314"><input id="title" name="article_title" type="text" style="height:30px; font-size: 20px; width: 900px;" value="<?php echo $data['article_title']; ?>"></input></td>
			  </tr>
			  <tr>
				<th scope="row">Content</th>
				<td><textarea id="content" name="article_body" value="" ><?php echo $data['article_body']; ?></textarea></td>
			  </tr>
			  <tr>
				<th scope="row">&nbsp;</th>
				<td><input type="hidden" name="article_id" value="<?php echo $data['article_id']; ?>">
				<input type="submit" name="editPostSubmit" value="Submit"/></td>
			  </tr>
			</table>
		</form>
	</section>
</article>-->

<?php
//else:
?>
<!--<article>
	<h1><?php echo $data['article_title']; ?></h1>
	<section>			
		<p>You are not logged in! Please log in first.</p>			
	</section>
</article>-->
<?php
//endif;
?>