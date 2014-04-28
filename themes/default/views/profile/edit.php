<?php Yii::import('ext.redactor.*'); ?>
<div class="container-12 register-mail-wrap">
    	<div class="group">
        	<div class="grid-12 register-mail">
            	<h1>Continue from Registering Mail</h1>
				<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
				'id'=>'profile-form',
				)); ?>
				<?php echo $form->errorSummary($model); ?>	
			
                <div class="register-container clearfix">
                <ul>
					<li><?php echo $form->textFieldRow($model,'email',array('class'=>'span12','maxlength'=>255)); ?>  
					</li>
					<li>
					<?php echo $form->passwordFieldRow($model,'password',array('value'=>'', 'class'=>'span12', 'style'=>'width:240px','maxlength'=>64, 'placeholder' => 'change password for the user here.')); ?> </li>
                    <li><?php echo $form->textFieldRow($model,'displayName',array('class'=>'span12','maxlength'=>255)); ?> </li>
					
                    <li><label>Gender</label>
                    	<div class="gender-wrap">
                        	<input type="radio" name="gender" /> Male
                            <input type="radio" name="gender" /> Female
                        </div>
                    </li>
                    <li><label>Country</label>
<?php
$countries = Countries::model()->findAll();

$models = Countries::model()->findAll(
                 array('order' => 'nicename'));
 
// format models as $key=>$value with listData
$list = CHtml::listData($models, 
                'id', 'nicename');
?>					
										<?php echo CHtml::dropDownList('countries', $countries,
              $list,
              array('empty' => 'Select a country', 'class' => 'chosen', 'tabindex' => '1' ));
?>
                    </li>
					<li><?php echo $form->textFieldRow($model,'expert',array('class'=>'span12','maxlength'=>255)); ?> </li>
                    <li><?php echo $form->textFieldRow($model,'profession',array('class'=>'span12','maxlength'=>255)); ?> </li>
                    <li><?php echo $form->textAreaRow($model, 'about', array('class' => 'span12')); ?></li>
                </ul>
                <div class="photo-upload-wrap">

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
                    'title' => '',
                    'headerIcon' => '',
                    'htmlOptions' => array(
						'class' => 'contentSidebar'
					)
                )); 
				//$path = '/';
				//$folder=Yii::app()->getBasePath() .'/../uploads' . $path;
				//echo $folder;
				?>
                <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
								array(
								        'id'=>'uploadFile',
								        'config'=>array(
								           'debug'=>false,
							               'action'=>Yii::app()->createUrl('/profile/badges/id/'. $model->id),
							               'allowedExtensions'=>array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
							               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
							               'minSizeLimit'=>1,
							               'template'=>'<div id="uploadFile"><ul class="qq-upload-list" style="display:none;">
							               </ul><div class="qq-upload-drop-area" style="display:none;"></div><a class="btn btn-small btn-primary qq-upload-button ">Upload</a>
							               </div>',	
							               'onComplete' => "js:function(id, fileName, response) {
							               		if (response.success)
							               		{
												    $('#noimage').hide();
							               			$('#new-attachment').before('<span class=\"thumb-container thumb-center\"><span class=\"thumb-inner\"><span class=\"thumb-img\"><img class=\"thumb\" href=\"/godwelling/'+ response.filepath +'\" src=\"/godwelling/'+ response.filepath +'\" style=\"left: 25px; top: 25px;\"></span><span class=\"thumb-strip\"></span><span class=\"thumb-icon\"></span></span></span>').after('<li id=\"new-attachment\" style=\"display:none;\">');
							               			$('.thumb').thumbs();
													$('.thumb').colorbox({rel:'thumb'});
													$('#new-attachment-img').show().attr('id', 'thumb');
							               		}
										   }"
								        )
								)); ?></h5>
					   	<div style="clear:both;"></div>
						<div class="image-holder ">

							<?php foreach ($attachments as $attachment): ?>
							    <div class="image-ctrl" id="<?php echo $attachment->key; ?>">
    								<?php echo CHtml::image("/godwelling/uploads/".$attachment->value, NULL, array('class'=> 'thumb', 'href' => "/godwelling/uploads/".$attachment->value, 'title' => "/godwelling/uploads/".$attachment->value)); ?>
                                    <span class="delete-button icon icon-remove" id="<?php echo $attachment->key; ?>"></span>
                                     <!--<span class="star-button icon icon-star-empty" id="<?php echo $attachment->key; ?>"></span>-->
                                </div>
							<?php endforeach; ?>
										<?php
				if(count($attachments)<=0){
				?>
                	<div id="noimage" style='display:""'><img src="../themes/default/assets/images/photo-avatar.png" /></div>
				<?php } ?>								
							<li id="new-attachment" style="display:none;"></li>
							<br/><br/>
						
						</div>
					<div class="clearfix"></div>
		         <?php $this->endWidget(); ?>				
				

                    <!--<input type="button" value="Upload Photo" class="gray-btn" />-->
					
				<?php $this->beginWidget('bootstrap.widgets.TbBox', array(

                )); 
				//$path = '/';
				//$folder=Yii::app()->getBasePath() .'/../uploads' . $path;
				//echo $folder;
				?>
                <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
								array(
								        'id'=>'uploadFile',
								        'config'=>array(
								           'debug'=>false,
							               'action'=>Yii::app()->createUrl('/profile/badges/id/'. $model->id),
							               'allowedExtensions'=>array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
							               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
							               'minSizeLimit'=>1,
							               'template'=>'<div id="uploadFile"><ul class="qq-upload-list" style="display:none;">dadadsadsa
							               </ul><div class="qq-upload-drop-area" style="display:none;"></div><a class="btn btn-small btn-primary qq-upload-button" >Upload</a>
							               </div>',	
							               'onComplete' => "js:function(id, fileName, response) {
							               		if (response.success)
							               		{
													 $('#noimage').hide();
							               			$('#new-attachment').before('<span class=\"thumb-container thumb-center\"><span class=\"thumb-inner\"><span class=\"thumb-img\"><img class=\"thumb\" href=\"/godwelling/'+ response.filepath +'\" src=\"/godwelling/'+ response.filepath +'\" ></span><span class=\"thumb-strip\"></span><span class=\"thumb-icon\"></span></span></span>').after('<li id=\"new-attachment\" style=\"display:none;\">');
							               			$('.thumb').thumbs();
													$('.thumb').colorbox({rel:'thumb'});
													$('#new-attachment-img').show().attr('id', 'thumb');
							               		}
										   }"
								        )
								)); ?></h5>
					   	<div style="clear:both;"></div>
					<div class="clearfix"></div>
		         <?php $this->endWidget(); ?>	
				 
                </div>
                </div>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType' => 'submit',
					'type' => 'success',
					'label' => 'Save & Continue',
					'htmlOptions' => array(
						'id' => 'submit-comment',
						'class' => 'green-btn full',
						'style' => 'margin-top: -4px'
					)
				)); ?>
                <!--<input type="submit" class="green-btn full" value="Save &amp; Continue" />-->
            </div>
        </div>
    </div>
	</div>
	</div>
	</div>
	<?php $this->endWidget(); ?>
    <!-- register-mail-wrap ends here -->

<?php 
$asset="/godwelling/images/df937e1b"; ?>
<?php Yii::app()->clientScript->registerCssFile($asset . '/css/jquery.tags.css'); ?>
<?php Yii::app()->clientScript->registerCssFile($asset . '/css/colorbox.css'); ?>
<?php Yii::app()->clientScript->registerCssFile($asset . '/css/jquery.thumbs.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.tags.min.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.thumbs.min.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.colorbox.min.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.gridster.js'); ?>
<?php Yii::app()->clientScript->registerScript('admin_promoted_image', 'setTimeout(function() { $("img.thumb").css("left", 0).css("right", 0).css("top", 0); $("#blog-image").find(".star-button").removeClass("icon-star-empty").addClass("icon-star"); $("#blog-image").find(".thumb-container").addClass("transition"); }, 500);'); ?>
	<?php Yii::app()->clientScript->registerScript('admin_thumbs', '$(".thumb").thumbs();'); ?>
	<?php Yii::app()->clientScript->registerScript('admin_colorbox', '$(".thumb").colorbox({rel:"thumb"});'); ?>
	<?php Yii::app()->clientScript->registerScript('admin_promote', '$(".star-button").click(function() { 
		var id = $(this).attr("id");
		$.post("../../godwelling/profile/promoteImage/id/'.$model->id.'", { id : ' . $model->id . ', key : id }, function() {
	        $(".image-ctrl").find(".thumb-container").css("border-color", "").removeClass("transition");
	        $("div[id*=\'" + id + "\']").find(".thumb-container").addClass("transition");
	        $(".star-button").addClass("icon-star-empty").removeClass("icon-star");
	        $("div[id*=\'" + id + "\']").find(".star-button").removeClass("icon-star-empty").addClass("icon-star");
	    });
	});'); ?>
	<?php Yii::app()->clientScript->registerScript('admin_delete', '$(".delete-button").click(function() {
	    var element = $(this);
	    $.post("../../godwelling/profile/removeImage/id/'.$model->id.'", { id : ' . $model->id . ', key : $(this).attr("id") }, function () {
	        element.parent().fadeOut();
	    });
	})'); ?>
	
	<link rel="stylesheet" type="text/css" href="../assets/style-fa69c3ff.css" />
<style>
	main .login-container { width: 80%; }
	main .main-body { margin-left: 80px; }
	#cboxMiddleLeft{background:none}
	#cboxMiddleRight{background:none}
	#cboxTopCenter{background:none}
	#cboxBottomCenter{background:none}
	#cboxPrevious{display:block !important}
	#cboxNext{display:block !important;right:0px;left:none;}
	#cboxNext{left:none}
	
.sidebar {background:none}

.bootstrap-widget-header {
    background: none;
    border: 0px solid #D5D5D5;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    height: 70px;
    position: relative;
}
.bootstrap-widget-content {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 0px solid #D5D5D5;
    border-radius: 5px;
    padding: 0px;
}


.photo-upload-wrap img {
    height: 160px;
    width: 160px;
}

.thumb-container {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: none repeat scroll 0 0 #FFFFFF;
    border-color: #CCCCCC #AAAAAA #AAAAAA #CCCCCC;
    border-image: none;
    border-style: solid;
    height: 160px;
    padding: 3px 3px 3px 3px;
    width: 160px;
}
.thumb-center img, .thumb-strip, .thumb-icon {
    position: none;
}



	
</style>