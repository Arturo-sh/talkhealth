

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

  if ($_GET["module"]=="search" || $_GET["module"]=="form_search") { ?>
    <li class="active">
      <a href="?module=search"><i class="fa fa-folder"></i> Buscar </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=search"><i class="fa fa-folder"></i> Buscar </a>
      </li>
  <?php
  }

	?>
	</ul>
<?