<div class="login-container">
	<div class="sidebar">
		<div class="well-span">
			<h4><div style="font-weight:bold">Register An Account</div></h4><br/>
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
						'id'					=>	'login-form',
						'focus'					=>'	input[type="text"]:first',
						'enableAjaxValidation'	=>	true
					)); ?>
				<div class="login-form-container">
					<div id="jsAlert" class="alert alert-warning" style="display:none">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<div id="jsAlertContent"></div>
					</div>
					<?php if (!Yii::app()->user->isGuest): ?>
						<div class="alert alert-info" style="margin-top: 20px;">
						  	<button type="button" class="close" data-dismiss="alert">&times;</button>
						  	<strong>Heads Up!</strong> Looks like you're already logged in as <strong><?php echo Yii::app()->user->displayName; ?></strong>. You should <strong><?php echo CHtml::link('logout', $this->createUrl('/logout')); ?></strong> before logging in to another account.
						</div>
					<?php else: ?>
						<?php if ($model->hasErrors()): ?>
							<div class="alert alert-error" style="margin-bottom: -5px;">
							  	<button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Oops!</strong> Looks like there were a few errors in your submission.
							</div>
							<br/>
						<?php endif; ?>
						<?php echo $form->TextField($model, 'email', array('id'=>'email', 'placeholder'=>'Email Address')); ?>
						<br/>
						<?php echo $form->TextField($model, 'displayName', array('id'=>'email', 'placeholder'=>'Username')); ?>
						<br/>
						<?php echo $form->PasswordField($model, 'password', array('id'=>'password', 'placeholder'=>'Password')); ?>
						<div id ="password_strength_1" class="password_strength_container">
							<div class="password_strength_bg"></div>
							<div class="password_strength" style="width: 0%;"></div>
							<div class="password_strength_separator" style="left: 25%;"></div>
							<div class="password_strength_separator" style="left: 50%;"></div>
							<div class="password_strength_separator" style="left: 75%;"></div>
							<div class="password_strength_desc"></div>
							<div class="clearfix"></div>
						</div>
						<?php echo $form->PasswordField($model, 'password2', array('id'=>'password', 'placeholder'=>'Password (again)', 'id' => 'password2')); ?>
						<div id ="password_strength_2" class="password_strength_container">
							<div class="password_strength_bg"></div>
							<div class="password_strength" style="width: 0%;"></div>
							<div class="password_strength_separator" style="left: 25%;"></div>
							<div class="password_strength_separator" style="left: 50%;"></div>
							<div class="password_strength_separator" style="left: 75%;"></div>
							<div class="password_strength_desc"></div>
							<div class="clearfix"></div>
						</div>
						<div class="login-form-links">By clicking Register, you agree to godwelling <?php echo CHtml::link('Terms and Conditions', Yii::app()->createUrl('/site/terms'), array('class' => 'login-form-links','style' => 'text-decoration:underline')); ?> <br/><br/></div>
					</div>
					<div class="login-form-footer">
						<?php echo CHtml::link('Login', Yii::app()->createUrl('/login'), array('class' => 'login-form-links')); ?>
						<span class="login-form-links"> | </span>
						<?php echo CHtml::link('Forgot password', Yii::app()->createUrl('/forgot'), array('class' => 'login-form-links')); ?><br/>
						<?php $this->widget('bootstrap.widgets.TbButton', array(
								'buttonType' => 'submit',
	    	                    'type' => 'success',
	    	                    'label' => 'Register',
	    	                    'htmlOptions' => array(
	    	                        'id' => 'submit-comment',
	    	                        'class' => 'sharebox-submit',
	    	                        'style' => 'margin-top: 4px'
	    	                    )
	    	                )); ?>
    	            <?php endif; ?>
    	            <?php if (Yii::app()->user->isGuest): ?>
	    	            <?php $config = Yii::app()->getModules(false); ?>
	    	            <?php if (count(Cii::get($config, 'hybridauth', array())) >= 1): ?>
	    	            <div class="clearfix" style="border-bottom: 1px solid #aaa; margin: 15px;"></div>
							<!--<span class="login-form-links">Or register with one of these social networks</span>-->
	    	        	<?php endif; ?>
	    	        	<div class="clearfix"></div>
	    	        	<div class="social-buttons">
		    	            <?php foreach (Cii::get(Cii::get($config, 'hybridauth', array()), 'providers', array()) as $k=>$v): ?>
								<?php if (Cii::get($v, 'enabled', false) == 1): ?>
									<?php echo CHtml::link(NULL, $this->createUrl('/hybridauth/'.$k), array('class' => 'social-icons ' . strtolower($k))); ?>
								<?php endif; ?>
		    	        	<?php endforeach; ?>
		    	        </div>
		    	    <?php endif; ?>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
<div style="clear:both"></div>
</div>
</div>
</div>


<style type="text/css">
.sidebar{background:none}
</style>
<?php $asset=Yii::app()->assetManager->publish(YiiBase::getPathOfAlias('webroot.themes.default.assets')); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset .'/js/zxcvbn.js'); ?>
<?php Yii::app()->clientScript->registerScript('password_strength_meter', '
$(document).ready(function() {
	if ($("#password").val().length > 0)
		setTimeout(function() { $("#password, #password2").keyup(); }, 200);
});

$("#password, #password2").keyup(function() { 
    var element = $(this).attr("id") == "password" ? "password_strength_1" : "password_strength_2";
    var score = zxcvbn($(this).val()).score;

    if (score <= 1 || $(this).val().length <= 8)
    	$("#" + element).find(".password_strength").removeClass("great").removeClass("good").removeClass("poor").css("width", "25%");
    if (score == 2)
    	$("#" + element).find(".password_strength").removeClass("great").removeClass("good").removeClass("poor").addClass("poor").css("width", "50%");
    else if (score == 3)
    	$("#" + element).find(".password_strength").removeClass("great").removeClass("good").removeClass("poor").addClass("good").css("width", "75%");
    else if (score == 4)
    	$("#" + element).find(".password_strength").removeClass("great").removeClass("good").removeClass("poor").addClass("great").css("width", "100%");
    else
    	$("#" + element).find(".password_strength").removeClass("great").removeClass("good").removeClass("poor").css("width", "25%");
});

// Override the submit form to display password issues
$("form").submit(function(e) { 
	$("#jsAlert").hide();

	if ($("#password").val().length < 8)
	{
		$("#jsAlertContent").text("Your password must be at least 8 characters.").parent().slideDown();
		e.preventDefault();
		return false;
	}

	if ($("#password2").val() != $("#password").val())
	{
		$("#jsAlertContent").text("Your passwords do not match!").parent().slideDown();
		e.preventDefault();
		return false;
	}

	return true;
});
', CClientScript::POS_END);