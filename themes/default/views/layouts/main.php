<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<!-- stylesheet includes -->
<?php
 $baseUrl = Yii::app()->theme->baseUrl;		  
?>		
<link rel="shortcut icon" href="<?php echo $baseUrl;?>/assets/images/favicon.ico" type="image/x-icon">

	    <?php $asset=Yii::app()->assetManager->publish(YiiBase::getPathOfAlias('webroot.themes.default.assets')); ?>
	    <?php Yii::app()->clientScript->registerMetaTag('text/html; charset=UTF-8', 'Content-Type', 'Content-Type', array(), 'Content-Type')
                                      ->registerMetaTag($this->keywords, 'keywords', 'keywords', array(), 'keywords')
                                      ->registerMetaTag(strip_tags($this->params['data']['extract']), 'description', 'description', array(), 'description')
                                      ->registerCssFile($asset .'/css/main.css')
		                              ->registerCoreScript('jquery')
								      ->registerScriptFile($asset .'/js/script.js'); ?>	
									  
</head>

<body>
	<div class="header">
    	<div class="social-bar">
        	<div class="container-12">
                <div class="group">
                    <ul class="offset-9 grid-3">
                        <li>
						<a href="https://www.facebook.com/pages/Godwellingcom/241208609383565" class="facebook">Facebook</a>
						</li>
                        <li><a href="https://twitter.com/GoDwellingWeb" class="twitter">Twitter</a></li>
                        <li><a href="http://www.linkedin.com/company/3592842?trk=tyah&trkInfo=tas%3Agodwe%2Cidx%3A1-1-1" 
						class="linkedin">Linkedin</a></li>
                        <li><a href="https://plus.google.com/u/1/b/111538487115466987695/111538487115466987695/posts" class="gplus">gplus</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- social bar ends -->
        
        <div class="container-12 header2">
        	<div class="group">
            	<div class="grid-3">
                	<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="logo">Godwelling</a>
                </div>
                <div class="offset-3 grid-6">
                	<div class="left login-wrap">
					<?php 
					if(!Yii::app()->user->isGuest){
					?>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/logout" class="gray-btn login-btn">Logout</a>
					<?php
					}


					if(Yii::app()->user->isGuest){
					?>					
                    	<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/login" class="gray-btn login-btn">Login</a>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/register" class="gray-btn signup-btn">Signup</a><?php }?>
                    </div>
                    <div class="left chosen-wrap">
                    	<select data-placeholder="Select Country" class="chosen" tabindex="1">
                            <option value=""></option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Aland Islands">Aland Islands</option>
                            <option value="Albania">Albania</option>
                        </select>
                    </div>
					<?php 
					if(!Yii::app()->user->isGuest){
					?>					
                    <div class="right profile-pic">
<?php 

		$id = Yii::app()->user->id;
		$displayName = Yii::app()->user->displayName;
		
		$attachmentCriteria = new CDbCriteria(array(
		    'condition' => "user_id = {$id} AND (t.key LIKE 'upload-%' OR t.key = 'blog-image')",
		    'order'     => 't.key ASC',
		    'group'     => 't.value'
		));
        
		$attachments = $id != NULL ? UserMetadata::model()->findAll($attachmentCriteria) : NULL;		

foreach ($attachments as $attachment): ?>
							    <div class="image-ctrl" id="<?php echo $attachment->key; ?>">
    								<?php echo CHtml::image("/godwelling/uploads/".$attachment->value, NULL, array('class'=> 'thumb', 'width' => '40', 'height' => '40', 'href' => "/godwelling/uploads/".$attachment->value, 'title' => "/godwelling/uploads/".$attachment->value)); ?><br/>
									<?php echo $displayName; ?>
                                </div>
							<?php endforeach; ?>
										<?php
				if(count($attachments)<=0){
				?>
                	<div id="noimage" style='display:""'><img src="./themes/default/assets/images/avatar-profile.png" alt="profile picture" /></div>
				<?php } ?>		
                    	<!--<img src="./themes/default/assets/images/avatar-profile.png" alt="profile picture" />-->
                        <!--<span class="notification">12</span>-->
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>
        <!-- header2 ends here -->
        
        <div class="nav-bar">
        	<div class="container-12">
            	<div class="group">
                    <ul class="grid-12">
                        <li><a href="#">Queries</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- navbar ends here -->
    </div>
    <!-- header ends -->
    
    	<div class="container-12">
        	<div class="group">
            	<div class="grid-8 content-part">
                	
					 <?php echo $content; ?>
                    
					
                <!-- content part ends -->

    	<!-- content part ends here -->
        <div style="clear:both"></div>
		</div>
		</div>
		</div>
        <div class="footer">
        	<div class="container-12">
            	<div class="group">
                	<div class="grid-6">
                    	<ul>
                        	<li><a href="#">Terms &amp; Condition</a> | </li>
                            <li><a href="#">Privacy Policy</a> | </li>
                            <li><a href="#">Contact us</a> </li>
                        </ul>
                    </div>
                    <div class="grid-6">
                    	<p class="right">Copyright @ Godweling, All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    
    <script type="text/javascript" src="<?php echo $asset; ?>/js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $asset; ?>/js/required.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
			$(".chosen, .chosen-category").chosen();
		});
  	</script>
</body>
</html>



