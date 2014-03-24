		<nav>
		<?php
		try 
	{
		include (SERVERROOT . "includes/connection.php"); //Include pdo

		//Select all data from blog_posts, between limit1 and limit2
		$sql = "SELECT * FROM admin_nav
				ORDER BY menu_id ASC";
		$resultSet = $pdo -> query($sql);
		$menuItems = $resultSet->fetchAll();
	} 
	catch (PDOException $e) 
	{
		return null;
	}
	
	$i = 0;
	?>
	<ul class="menu">
			<!-- display links for all menu items -->
				
	<?php
	foreach($menuItems as $menuItem)
	{		
	?>
		<li>
			<?php
			if($menuItem['location'] != NULL && $menuItem['action'] != NULL)
			{
			?>
			<a href="<?php echo SITEROOT . '?' . $menuItem['location'] . '&action=' . $menuItem['action']; ?>">
				<?php echo $menuItem['menu_link_title']; ?>
			</a>
			<?php
			}
			else if($menuItem['location'] != NULL && $menuItem['action'] == NULL)
			{
			
			//Pulls out the forum admin link, and appends the forum session id to it
			?>
				<?php if(strstr($menuItem['location'], 'forum')): 
						define('IN_PHPBB', true);
						global $db, $cache, $config, $user, $phpbb_root_path, $phpEx, $template, $auth;
						$phpbb_root_path = './forum/';
						$phpEx = "php";
						include_once($phpbb_root_path.'common.'.$phpEx);

						$user->session_begin();
						$auth->acl($user->data);
						$user->setup();
					?>
						<a href="<?php echo SITEROOT . (strstr($menuItem['location'], 'forum')) . "?sid=" . $user->data['session_id'];?>">
							<?php echo $menuItem['menu_link_title']; ?>
						</a>
				<?php else: ?>
						<a href="<?php echo SITEROOT . $menuItem['location'];?>">
							<?php echo $menuItem['menu_link_title']; ?>
						</a>
					
				<? endif;
			}
			else
			{
			?>
				<a href="<?php echo SITEROOT?>">
					<?php echo $menuItem['menu_link_title']; ?>
				</a>
			<?php
			}
			?>
		</li>
		<?php
		$i++;
	}
		?>
		</nav>
		<?php echo "\n" ?>