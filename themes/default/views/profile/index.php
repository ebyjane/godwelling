
<div class="container-12 profile-page">
    	<div class="group">
        	<div class="grid-12 register-mail">
            	<h1>User Profile </h1>
				
				<div align="right" style="padding-right:20px;position:relative;right:0px;top:-45px">
				<?php if (!Yii::app()->user->isGuest && $model->id == Yii::app()->user->id): ?>
				<?php echo CHtml::link('edit your profile', $this->createUrl('/profile/edit')); ?>
				<?php endif; ?>				
				
				</div>
                <div class="register-container clearfix">
                <div class="photo-wrap">
	                    	<?php 
							$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
							$urlarray=explode("/",$url);
							$end=$urlarray[count($urlarray)-2];


							$id = $end;
							$key = "blog-image";
							$image_data = UserMetadata::model()->findByAttributes(array('user_id' => $id, 'key' => $key));
							//echo count($image_data);
							if(count($image_data)>0){
								echo CHtml::image("/uploads/".$image_data->value, NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/uploads/".$image_data->value, 'title' => "/uploads/".$image_data->value)); 
							}else{							
								echo CHtml::image("/uploads/images.jpg", NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/uploads/images.jpg", 'title' => "/uploads/images.jpg")); 
							}
							?>
                	<ul>
                        <li><div class="display-data"><?php echo $contentCount; ?></div><label>Post(s)</label></li>
                        <li><div class="display-data"><?php echo Comments::model()->countByAttributes(array('user_id' => $model->id)); ?></div><label>Total Comments</label></li>
                    </ul>
                </div>
                <div class="clear"></div>
                
               <div class="profile-right">
               <ul>
                	<li><label>Username</label><div class="display-data"><?php echo CHtml::encode($model->name); ?></div></li>
                    <li><label>Gender</label><div class="display-data">Male</div></li>
                    <li><label>Email ID</label><div class="display-data"><?php echo CHtml::encode($model->email); ?></div></li>
                    <li><label>Expert in</label><div class="display-data"><?php echo CHtml::encode($model->expert); ?></div></li>
                    <li><label>Profession</label><div class="display-data"><?php echo CHtml::encode($model->profession); ?></div></li>
                    <li><label>Joined on</label><div class="display-data"><time datetime="<?php echo date(DATE_ISO8601, strtotime($model->created)); ?>">
								<?php echo date('M Y', strtotime($model->created)); ?>
							</time></div></li> 
                </ul>
                <div class="about"><label>About</label>
				<p>
					<?php $about = $model->about; ?>
					<?php if ($about == NULL): ?>
						<?php if (Yii::app()->user->id == $model->id): ?>
							<div class="alert alert-info">
							  <strong>Oops!</strong> It looks like you haven't provided any information about yourself yet.
							  Why don't you <?php echo CHtml::link('edit your profile', $this->createUrl('/profile/edit')); ?>
							  and add siome information?
							</div>
						<?php else: ?>
							<div class="alert alert-info">
							  <strong>Oops!</strong> This user hasn't added any information about themself yet.
							</div>
						<?php endif; ?>
					<?php else: ?>
						<?php $md = new CMarkdownParser(); ?>
						<?php echo $md->safeTransform($about); ?>
					<?php endif; ?>
					</p><br/>
					<label>Posts By This User</label><br/><br/>
					<p>
						<?php $this->widget('cii.widgets.CiiMenu', array('items' => $this->getPostsByAuthor($model->id))); ?>
						<?php echo CHtml::link('more', $this->createUrl('/search') . '?q=user_id:' . $model->id, array('class' => 'login-form-links pull-right')); ?>
					</p>
				</div>
                <div class="clear"></div>
                </div>
                
                </div>
                
            </div>
        </div>
    </div>
    <!-- profile-page ends here -->
</div>
</div>
</div>
<style>
 	main .main-body { margin-left: 0px; }
 	table td, table th { padding: 0px; padding-left: 5px; font-size: 12px; color: #777; }
.sidebar {background:none}	
</style>
<?php $this->widget('ext.timeago.JTimeAgo', array(
    'selector' => ' .timeago',
));
?>