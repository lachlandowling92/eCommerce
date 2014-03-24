<!-- Main Menu -->
<?php
	include ("includes/connection.php"); //Include pdo
		
	try {
		//Select all data from blog_posts, between limit1 and limit2
		$sql = "SELECT * FROM topMenu
				WHERE subHeader IS 
				NULL";
		$resultSet = $pdo -> query($sql);
		$menuItems = $resultSet->fetchAll();

		//Select all data from blog_posts, between limit1 and limit2
		$sql2 = "SELECT * FROM topMenu
				WHERE subHeader != 'NULL'";
		$resultSet2 = $pdo -> query($sql2);
		$subMenuItems = $resultSet2->fetchAll();
	} 
	catch (PDOException $e) {
		return null;
	}
	

		
		?>
		<div id="navCont">
			<nav id="nav">
				<input type='checkbox' id='toggle'/>
				<label for='toggle' class='toggle'></label>
				<ul class="menu">
					<?php
						$i = 0;
						foreach($menuItems as $key => $row){
						$menuItemArray[$i] = array('menuItemName'=> $row['menuName'], 'menuLinkAddress'=> $row['menuLink']);
					?>
					<li>
						<a href="<?php echo SITEROOT . $menuItemArray[$i]['menuLinkAddress']; ?>"><?php echo $menuItemArray[$i]['menuItemName']; ?></a>		
						<!--
						<ul>
							<?php
							foreach($subMenuItems as $key => $subMenuRow)
							{
								if($subMenuRow['subHeader'] == $row['menuId'])
								{
									$subMenuItemArray = array('menuItemName'=> $subMenuRow['menuName'], 'menuLinkAddress'=> $subMenuRow['menuLink']);
									?>
									<li>
										<a href="<?php echo SITEROOT . $subMenuItemArray['menuLinkAddress'] ?>"><?php echo $subMenuItemArray['menuItemName'];?></a>
									</li>
								<?php
								}
							}							
							?>
						</ul>
					-->
					</li>
					<?php
						$i++;
						}
					?>
				</ul>
			</nav>
		</div>
	</header>
</head>