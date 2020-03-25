<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Powyższe trzy metatagi muszą być umieszczone *na samym początku* nagłówka.
      Pozostałą treść *trzeba* umieścić poniżej tych tagów. -->
    <link rel="icon" href="http://zmziaja.pl/wp-content/uploads/2018/03/favicon.ico">
    <title>
		<?php
			wp_title( '|', true, 'right' );
			bloginfo('name');
		?>
    </title>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
  </head>
  <body>
		<?php if ( is_home() && is_front_page() ) : ?>
			<header class="front-page">
		<?php else : ?>
			<header class="page">
		<?php endif; ?> 
				<div class="beltLogo">
					<img src="http://zmziaja.pl/wp-content/uploads/2018/02/logo.png" alt="logo" class="logo">
				</div>
				<img src="http://zmziaja.pl/wp-content/uploads/2018/02/zapraszamy.png" alt="welcome" class="blockWelcome textWelcome">
				<p class="blockWelcome textUnderWelcome">lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
				<div class="beltMenu">
					<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="800">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" 
									data-toggle="collapse" 
									data-target="#bs-example-navbar-collapse-1" 
									aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>	
						</div>
						<!-- Menu options -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul id="menu" class="nav navbar-nav navbar-right main_menu">
								<li class="menuInserts"><a style="color:#a20d10 !important; font-weight: 600;" href="/">strona główna</a></li>
								<div class="menuSeparator hidden-xs"></div>
								<li class="menuInserts"><a href="/offer/#sectionOffer">oferta</a></li>
								<div class="menuSeparator hidden-xs"></div>
								<li class="menuInserts"><a href="/about_company_more/#aboutCompany">o firmie</a></li>
								<div class="menuSeparator hidden-xs"></div>
								<li class="menuInserts"><a href="/news/#sectionNews">aktualności</a></li>
								<div class="menuSeparator hidden-xs"></div>
								<li class="menuInserts"><a href="/contact/#blockContactDetails">kontakt</a></li>
							</ul>
							<?php
								wp_nav_menu(array(
										'theme_location' => 'main-menu',
										'menu_class' => 'nav navbar-nav'
								));
							?>
						</div>
					</nav> 
				</div>
			</header>