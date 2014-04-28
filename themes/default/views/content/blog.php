<?php $content = &$data; ?>
<?php $meta = Content::model()->parseMeta($content->metadata); ?>
    	<div class="container-12">
        	<div class="group">
            	<div class="grid-8 content-part">
                	<div class="content-wrap">
              
                        
                        <div class="box-wrap queries-wrap">
                        	<div class="image-wrap left">
                        	<?php //echo $content->author->id; 
							$model  = Users::model();
							$id = $content->author->id;
							$key = "blog-image";
							$image_data = UserMetadata::model()->findByAttributes(array('user_id' => $id, 'key' => $key));
							$userDetails = Users::model()->findByAttributes(array('id' => $id));
							//echo count($image_data);
							if(count($image_data)>0){
								echo CHtml::link(CHtml::image("/godwelling/uploads/".$image_data->value, NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/godwelling/uploads/".$image_data->value, 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$content->author->id}/"));
							}else{
								echo CHtml::link(CHtml::image("/godwelling/uploads/images.jpg", NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/godwelling/uploads/images.jpg", 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$content->author->id}/"));
							}	
	
	?>
							<span class="name"><?php echo CHtml::link(CHtml::encode($content->author->displayName), $this->createUrl("/profile/{$content->author->id}/")); ?></span>
                            </div>
                            
                            <div class="question-wrap">
							<h3>
								<a href="<?php echo $this->createUrl('/' . $content->slug); ?>" rel="bookmark">	
								<?php $md = new CMarkdownParser; echo strip_tags($md->safeTransform($content->extract), '<h1><h2><h3><h4><h5><6h><p><b><strong><i>'); ?>
								</a>
							</h3>
                                
                               <div class="date-time-wrap">
                            		<?php echo $content->getCreatedFormatted() ?> | <?php echo CHtml::link(CHtml::encode($content->category->name), Yii::app()->createUrl($content->category->slug)); ?> | <?php echo $content->getCommentCount(); ?> comments</a>
                            	</div>
                            </div>
                            
							<?php 
							if(($content->video!="")||($content->photo!="")){?>

								<?php 
								if($content->video!=""){
								
								$videoURL = explode("=",$content->video);	
															
								?>
								
								<iframe class="video-holder" width="222" height="136" src="//www.youtube.com/embed/<?php echo $videoURL[1]; ?>?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
								<?php } 
								if($content->photo!=""){
								$imageUrl = $content->photo;
								

								
								?>
						
								
								<img style="width:222px;height:136px" src="uploads/<?php echo $imageUrl; ?>" class="video-holder" />
								<?php /*echo CHtml::image("uploads/".$imageUrl, NULL, array('class'=> 'thumb', 'href' => "uploads/".$imageUrl, 'title' => "uploads/".$imageUrl));*/ ?>
						
								<?php } ?>
							
							<?php							
							}else{
							//echo $content->video; 
							?>
							
                            <img src="./themes/default/assets/images/sample-video.jpg" class="video-holder" />
                            
							<?php
							}
							?>
                        
                        
                        </div>
						
						<div class="comments">
	<?php $count = 0;?>
	<?php echo CHtml::link(NULL, NULL, array('name'=>'comments')); ?>
	<div class="post">
		<div class="post-inner">
			<div class="post-header post-header-comments">
				<h3 class="comment-count pull-left left-header"><?php echo Yii::t('comments', 'n==NaN#1 Comment|n==0#No Comments|n==1#{n} Comment|n>1#{n} Comments', $comments); ?></h3>
				
				<div class="likes-container pull-right">
					<div class="likes <?php echo Yii::app()->user->isGuest ?: (Users::model()->findByPk(Yii::app()->user->id)->likesPost($content->id) ? 'liked' : NULL); ?>">     
					    <!--<a href="#" id="upvote" title="Like this post and discussion">
					    	<span class="icon-thumbs-up icon-red"></span>
					        <span class="counter">
					            <span id="like-count"><?php echo $content->like_count; ?></span>
					        </span>      
					    </a>-->
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<?php if (!Yii::app()->user->isGuest): ?>
				<?php if ($data->commentable): ?>
    				<a id="comment-box"></a>
    	                <div id="sharebox" class="comment-box">
    	                    <div id="a">
    	                        <div id="textbox" contenteditable="true" style="height:50px;border:1px solid #cccccc;border-radius: 4px;font-size:13px"></div>
								
    	                        <div id="close"></div>
    	                        <div style="clear:both"></div>
    	                    </div>
    	                    <div id="b" style="color:#999999;margin-top:-55px;font-size:12px;margin-left:5px">Comment on this query</div> 
    	                </div>
    	                <?php $this->widget('bootstrap.widgets.TbButton', array(
    	                    'type' => 'success',
    	                    'label' => 'Submit',
    	                    'url' => '#',
    	                    'htmlOptions' => array(
    	                        'id' => 'submit-comment',
    	                        'class' => 'sharebox-submit',
    	                        'style' => 'display:none; margin-top: 55px;'
    	                    )
    	                )); ?>
    	        <?php endif; ?>
            <?php else: ?>
				<div class="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Hey there!</strong> Before leaving a comment, you must <?php echo CHtml::link('login', $this->createUrl('/login')); ?> or <?php echo CHtml::link('signup', $this->createUrl('/register')); ?>
				</div>
        	<?php endif; ?>
            <div id="comment-container" style="display:none; margin-top: -1px;"></div>
            <div class="comment"></div>
            <div class="clearfix"></div>
		</div>
	</div>
</div>
                    
                </div>
                <!-- content part ends -->




<div class="content" data-attr-id="<?php echo $content->id; ?>">
<div id="content-container"></div>
	<div class="post">
		<?php if (Cii::get(Cii::get($meta, 'blog-image', array()), 'value', '') != ""): ?>
			<p style="text-align:center;"><?php echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>
		<?php endif; ?>
		<div class="post-inner">
	<div style="float:left;width:50px;position:relative">
	
	<?php //echo $content->author->id; 
							$model  = Users::model();
							$id = $content->author->id;
							$key = "blog-image";
							$image_data = UserMetadata::model()->findByAttributes(array('user_id' => $id, 'key' => $key));
							$userDetails = Users::model()->findByAttributes(array('id' => $id));
							//echo count($image_data);
							if(count($image_data)>0){
								echo CHtml::link(CHtml::image("/godwelling/uploads/".$image_data->value, NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/godwelling/uploads/".$image_data->value, 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$content->author->id}/"));
							}else{
								echo CHtml::link(CHtml::image("/godwelling/uploads/images.jpg", NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/godwelling/uploads/images.jpg", 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$content->author->id}/"));
							}	
	
	?>
	</div>	

			<div class="post-header" style="position:relative;float:left;width:100%">
				<h3 class="pull-left"><?php /*echo CHtml::link(CHtml::encode($content->title), Yii::app()->createUrl($content->slug));*/ ?></h3>
				<div class="likes-container likes-container--topfix pull-right">
					<div class="likes <?php echo Yii::app()->user->isGuest ?: (Users::model()->findByPk(Yii::app()->user->id)->likesPost($content->id) ? 'liked' : NULL); ?>">     
					    <!--<a href="#" id="upvote" title="Like this post and discussion">
					    	<span class="icon-thumbs-up icon-red"></span>
					        <span class="counter">
					            <span id="like-count"><?php echo $content->like_count; ?></span>
					        </span>      
					    </a>-->
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			
			
				<?php
					$md = new CMarkdownParser;
					$dom = new DOMDocument();
					$dom->loadHtml('<?xml encoding="UTF-8">'.$md->safeTransform($content->content));
					$x = new DOMXPath($dom);

					foreach ($x->query('//a') as $node)
					{
						$element = $node->getAttribute('href');

						// Don't follow links outside of this site, and always open them in a new tab
						if ($element[0] !== "/")
						{
							$node->setAttribute('rel', 'nofollow');
							$node->setAttribute('target', '_blank');
						}
					}

					echo $dom->saveHtml();
				?>
                <div class="clearfix"></div>
                

            
		</div>
	    <div style="clear:both;"><br /></div>
	</div>
</div>

<div class="comments">
	<?php $count = 0;?>
	<?php echo CHtml::link(NULL, NULL, array('name'=>'comments')); ?>
	<div class="post">
		<div class="post-inner">
			<div class="post-header post-header-comments">
				<h3 class="comment-count pull-left left-header"><?php echo Yii::t('comments', 'n==NaN#1 Comment|n==0#No Comments|n==1#{n} Comment|n>1#{n} Comments', $comments); ?></h3>
				
				<div class="likes-container pull-right">
					<div class="likes <?php echo Yii::app()->user->isGuest ?: (Users::model()->findByPk(Yii::app()->user->id)->likesPost($content->id) ? 'liked' : NULL); ?>">     
					    <!--<a href="#" id="upvote" title="Like this post and discussion">
					    	<span class="icon-thumbs-up icon-red"></span>
					        <span class="counter">
					            <span id="like-count"><?php echo $content->like_count; ?></span>
					        </span>      
					    </a>-->
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<?php if (!Yii::app()->user->isGuest): ?>
				<?php if ($data->commentable): ?>
    				<a id="comment-box"></a>
    	                <div id="sharebox" class="comment-box">
    	                    <div id="a">
    	                        <div id="textbox" contenteditable="true" style="height:50px;border:1px solid #cccccc;border-radius: 4px;font-size:13px"></div>
								
    	                        <div id="close"></div>
    	                        <div style="clear:both"></div>
    	                    </div>
    	                    <div id="b" style="color:#999999;margin-top:-55px;font-size:12px;margin-left:5px">Comment on this query</div> 
    	                </div>
    	                <?php $this->widget('bootstrap.widgets.TbButton', array(
    	                    'type' => 'success',
    	                    'label' => 'Submit',
    	                    'url' => '#',
    	                    'htmlOptions' => array(
    	                        'id' => 'submit-comment',
    	                        'class' => 'sharebox-submit',
    	                        'style' => 'display:none; margin-top: 55px;'
    	                    )
    	                )); ?>
    	        <?php endif; ?>
            <?php else: ?>
				<div class="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Hey there!</strong> Before leaving a comment, you must <?php echo CHtml::link('login', $this->createUrl('/login')); ?> or <?php echo CHtml::link('signup', $this->createUrl('/register')); ?>
				</div>
        	<?php endif; ?>
            <div id="comment-container" style="display:none; margin-top: -1px;"></div>
            <div class="comment"></div>
            <div class="clearfix"></div>
		</div>
	</div>
</div>
<style type="text/css">
main .post .blog-meta{
padding-left:50px;
}
main .likes-container--topfix {
    margin-top: 0px;
    position: absolute;
    right: 0;
    top: -27px;
}
main #sharebox #b, [id*="sharebox-"] [id*="b-"] {
    cursor: text;
    min-height: 15px;
    padding: 10px;
}
main #sharebox, main [id*="sharebox-"] {
    border: 1px solid #DDDDDD;
}
#textbox{
    border: 1px solid #CCCCCC;
    border-radius: 4px;
    padding: 5px;
    width: 98%;
}	

</style>


<?php Yii::app()->clientScript->registerScript('comment-box', '
    $("#b").click( function () {
        $(this).html("");
        $("#a").slideDown("fast");
        $("#submit-comment").show();
        setTimeout(function() {
            $("#textbox").focus();
        }, 100);
    });
    $("#textbox").keydown( function() {
        if($(this).text() != "")
            $("#submit-comment").css("background","#3b9000");
        else
            $("#submit-comment").css("background","#9eca80");
        });
    $("#close").click( function () {
        $("#b").html("Comment on this post");
        $("#textbox").html("");
        $("#a").slideUp("fast");
        $("#submit-comment").hide();
    });
    
    $("#submit-comment").click(function(e) {
        e.preventDefault();
        if ($("#textbox").text() == "")
            return;
        $.post("/godwelling/comment/comment", 
        	{ 
        		"Comments" : 
        		{ 
        			"comment" : $("#textbox").text(), 
        			"content_id" : $(".content").attr("data-attr-id") 
        		}
        	}, 
        	function(data) { 
        		$("#textbox").text("");  
        		$("#comment-container").prepend(data);
        		$("div#comment-container").children(":first").fadeIn();
        		$("#close").click();
        		$(".comment-count").text((parseInt($(".comment-count").text().replace(" Comment", "").replace(" Comments", "")) + 1) + " Comments");
				if($(".comment-count").text() == "NaN Comments"){
					$(".comment-count").text("1 Comment"); 
				}
        	}
        );
    });
')->registerScript('likeButton', '
	$("[id ^=\'upvote\']").click(function(e) {
		e.preventDefault();

		$.post("' . $this->createUrl('/content/like/id/' . $content->id) . '", function(data, textStatus, jqXHR) {
			if (data.status == undefined)
				window.location = "' . $this->createUrl('/login') . '"

			if (data.status == "success")
			{
				var count = parseInt($("#like-count").text());
				if (data.type == "inc")
					$("[id ^=\'like-count\']").text(count + 1).parent().parent().parent().addClass("liked");
				else
					$("[id ^=\'like-count\']").text(count - 1).parent().parent().parent().removeClass("liked");
			}
		});
		return false;
	});
')->registerScript('fetchComments', '
	$.post("' . $this->createUrl('/comment/getComments/id/' . $content->id) . '", function(data) {
		$("#comment-container").html(data);
		$(".comment").show();
		$("#comment-container").fadeIn();
		$(".rounded-img").load(function() {
		    $(this).wrap(function(){
		      return \'<span class="\' + $(this).attr(\'class\') + \'" style="background:url(\' + $(this).attr(\'src\') + \') no-repeat center center; width: \' + $(this).width() + \'px; height: \' + $(this).height() + \'px;" />\';
		    });
		    $(this).css("opacity","0");
		});

		// Flag option
		$("[class ^=\'flag\']").click(function() {
			if ($(this).hasClass("flagged"))
				return;

			var element = $(this);
			$.post("comment/flag/id/" + $(this).attr("data-attr-id"), function() {
				$(element).addClass("flagged").text("flagged");
			});
		});

		// Reply button
		$("[class ^=\'reply\']").click(function() { 
			$(this).parent().parent().parent().find("#comment-form").slideToggle(200); 
		});
	});
');

$this->widget('ext.timeago.JTimeAgo', array(
    'selector' => ' .timeago',
));
?>

