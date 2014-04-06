<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css"  />
    
  	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/custom.modernizr.js"></script>
  	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.0.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.colorbox-min.js"></script>
     
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

    <header>
        <div class="row">
            <div class="large-12 small-12 columns social_wrap">
            	<ul>
                	<li><a href="#" class="facebook" title="Facebook">Facebook</a></li>
                    <li><a href="#" class="twitter" title="Twitter">Twitter</a></li>
                    <li><a href="#" class="linkedin" title="Linkedin">Linkedin</a></li>
                    <li class="last"><a href="#" class="gplus" title="Googleplus">Googleplus</a></li>            
                </ul>
            </div>
        </div>
        <!-- ***** header row ends here ********** -->   
    </header>
    
    <div class="row">
        <div class="large-12 small-12 columns logo_row">
        	<a class="large-8 small-12 columns logo">
            	Dwelling
            </a>
            
            <div class="large-4 small-12 columns header_login">
            	<ul class="login-wrap clearfix">
                	<li class="login">
					<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					),
					));
					if(Yii::app()->user->isGuest){
					?>

					<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/boxlogin" class="iframe">Login</a> |</li>
                    <li class="signup"><a href="#" class="iframe">Signup</a></li><?php }?>
                </ul>
                <div class="clear"></div>
            
                
                <div class="search-wrap">
                	<form>
                    <div class="row collapse">
                    	<div class="small-10 columns"><input type="text" placeholder="Search..." /></div>
                        <div class="small-2 columns"><a href="#" class="button prefix search-btn">Search</a></div>
                    </div>
                    </form>
                </div>
                
            </div>
            
        </div>
    </div>
    
    <nav>
    	<div class="row">
        	<div class="large-12 small-12 columns nav-bar">
		<?php $url = $_SERVER['REQUEST_URI']; 
		$urlarray=explode("/",$url);
		$end=$urlarray[count($urlarray)-1];
		if($end=='advice'){$advice=array('class'=>'active');}else{$advice="";}
		if($end=='buy'){$buy=array('class'=>'active');}else{$buy="";}
		if($end=='events'){$events=array('class'=>'active');}else{$events="";}
		if($end=='about'){$about=array('class'=>'active');}else{$about="";}
		if($end=='contact'){$contact=array('class'=>'active');}else{$contact="";}
		?>	
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Ask for Advice', 'url'=>array('/site/advice'),'linkOptions'=>$advice),
				array('label'=>'Buy & Sell', 'url'=>array('/site/buy'),'linkOptions'=>$buy),
				array('label'=>'Events', 'url'=>array('/site/events'),'linkOptions'=>$events),
				array('label'=>'About Us', 'url'=>array('/site/about'),'linkOptions'=>$about),
				array('label'=>'Contact Us', 'url'=>array('/site/contact'),'linkOptions'=>$contact),
			),
		)); ?>				
            </div>
        </div>
    </nav>

	<?php echo $content; ?>

	<div class="clear"></div>

	<footer>
    	<div class="row">
        	<div class="large-7 small-12 columns">
            	<p><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/about">About us </a> |  <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/terms">Terms & condition </a> |  <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/privacy">Privacy Policy </a> |  <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/contact">Contact us</a>
            </div>
            <div class="large-5 small-12 columns">
            	<p>Copyright &copy; Dweling, All rights reserved</p>
            </div>
        </div>
    </footer>
    
   

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? '<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation.min.js"></script>
 
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.alerts.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.clearing.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.cookie.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.dropdown.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.forms.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.joyride.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.magellan.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.orbit.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.placeholder.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.reveal.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.section.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.tooltips.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.topbar.js"></script>
  

  
  <script>
    $(document).foundation();
	$(".iframe").colorbox({iframe:true, width:"60%", height:"67%"});
  </script>
</body>
</html>
