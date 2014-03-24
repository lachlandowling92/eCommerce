<?php
if($data != null):
?>

<article>
	<h1><?php echo $data['article_title']; ?></h1>
	<section style="border:1px solid #000; padding: 10px;">			
			<p><?php echo $data['article_body']; ?></p>
			
			
	</section>
</article>
<?php
else:
	?>

<article>
	<h1>Articles</h1>
	<p>Page not found! Please try going back to the previous page you were on.</p>
</article>
	
<?php
endif;
?>