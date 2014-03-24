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
	<h1><?php echo $data['article_title']; ?></h1>
	<section>			
	<h1>Add a Page</h1>
		<form action="?addPost" method="post">
			<label width="500">Title:</label><br>
			<input width="314" id="title" name="article_title" type="text" style="height:30px; font-size: 20px; width: 700px;"></input><br><br>
			<label>Content:</label><br>
			<textarea id="content" name="article_body"></textarea>
			<input type="submit" name="addPostSubmit" value="Submit"/>
		</form>
	</section>
</article>

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