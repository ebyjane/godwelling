<div class="login-container">
	<div class="sidebar">
		<div class="well-span">
			<h4><div style="font-weight:bold">Login to Your Account</div></h4><br/>
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
						'id'					=>	'login-form',
						'focus'					=>'	input[type="text"]:first',
						'enableAjaxValidation'	=>	true
					)); ?>
				<div class="login-form-container">
					<?php if (!Yii::app()->user->isGuest): ?>
						<div class="alert alert-info" style="margin-top: 20px;">
						  	<button type="button" class="close" data-dismiss="alert">&times;</button>
						  	<strong>Heads Up!</strong> Looks like you're already logged in as <strong><?php echo Yii::app()->user->displayName; ?></strong>. You should <strong><?php echo CHtml::link('logout', $this->createUrl('/logout')); ?></strong> before logging in to another account.
						</div>
					<?php else: ?>
						<?php if ($model->hasErrors()): ?>
							<div class="alert alert-error" style="margin-bottom: -5px;">
							  	<button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Oops!</strong> We weren't able to log you in using the provided credentials.
							</div>
							<br/>
						<?php endif; ?>
						<?php echo $form->TextField($model, 'username', array('id'=>'email', 'placeholder'=>'Email Address')); ?><br/>
						<?php echo $form->PasswordField($model, 'password', array('id'=>'password', 'placeholder'=>'Password')); ?>
					</div>
					<div class="login-form-footer">
						<?php echo CHtml::link('Register', Yii::app()->createUrl('/register'), array('class' => 'login-form-links')); ?>
						<span class="login-form-links"> | </span>
						<?php echo CHtml::link('Forgot password', Yii::app()->createUrl('/forgot'), array('class' => 'login-form-links')); ?>
					</div>
					<div class="login-form-footer">
						<?php $this->widget('bootstrap.widgets.TbButton', array(
								'buttonType' => 'submit',
	    	                    'type' => 'success',
	    	                    'label' => 'Submit',
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
							<span class="login-form-links">Or sign in with one of these social networks</span>
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
main .sidebar .well h4:before, main .sidebar .well-span h4:before {
    color: #7DAF27;
    content: "";
	padding-left:20px;
}
.login-wrap .login a {
    background-position: 0 -21px;
}
#login-icon{
position:relative;
left:-360px;
}
</style>
