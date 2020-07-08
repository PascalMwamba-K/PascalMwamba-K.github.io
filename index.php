<?php

require 'includes/config.php';
require 'includes/aboutPage.class.php';


$profile = new AboutPage($info);

if(array_key_exists('json',$_GET)){
	$profile->generateJSON();
	exit;
}
else if(array_key_exists('vcard',$_GET)){
	$profile->downloadVcard();
	exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Jeune congolais passionné par les nouvelles technologies. Spécialisé dans la conception et le développement des applications informatiques web et mobiles." />

        <title>PdevLab</title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="assets/css/styles.css" />
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>

		<section style="margin-top:20px" id="infoPage">
	
    		<img src="<?php echo $profile->photoURL()?>" alt="<?php echo $profile->fullName()?>" width="164" height="164" />

            <header>
                <h1 style="font-size:40px"><?php echo $profile->fullName()?></h1>
                <h2><?php echo $profile->tags()?></h2>
            </header>
            
            <p class="description"><?php echo nl2br($profile->description())?></p>
            
            <a href="<?php echo $profile->facebook()?>" class="grayButton facebook">Nous suivre sur Facebook</a>
            <a href="<?php echo $profile->LinkedIn()?>" class="grayButton vcard">Nous suivre sur LinkedIn</a>
            
            <ul class="vcard">
                <li class="fn"><?php echo $profile->fullName()?></li>
                <li class="org"><?php echo $profile->company()?></li>
                <li class="tel"><?php echo $profile->cellphone()?></li>
                <li><a class="url" href="<?php echo $profile->website()?>"><?php echo $profile->website()?></a></li>
            </ul>
            
		</section>     
          
    </body>
</html>
