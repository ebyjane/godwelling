<main class="main">


<?php $content = &$data; ?>
<?php $meta = Content::model()->parseMeta($content->metadata); ?>

    	<div class="container-12">
        	<div class="group">
            	<div class="grid-8 content-part">
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
								echo CHtml::link(CHtml::image("/uploads/".$image_data->value, NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/uploads/".$image_data->value, 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$content->author->id}/"));
							}else{
								echo CHtml::link(CHtml::image("/uploads/images.jpg", NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/uploads/images.jpg", 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$content->author->id}/"));
							}	
	
	?>
							<span class="name"><?php echo CHtml::link(CHtml::encode($content->author->displayName), $this->createUrl("/profile/{$content->author->id}/")); ?></span>
                            </div>
							
							                            <div class="question-wrap">
                                <h3>
									<div style="padding-bottom:10px"><a style="font-size:12px;" href="<?php echo $this->createUrl('/' . $content->slug); ?>" rel="bookmark">	
									<?php $md = new CMarkdownParser; echo strip_tags($md->safeTransform($content->title), '<h1><h2><h3><h4><h5><6h><p><b><strong><i>'); ?>
									</a>
									</div>
									
									<?php
									$content->content = str_replace ("\n","<br/>",$content->content);
									?>
									
									
									<div style="font-size:12px">
									<?php 
									echo $content->content;
									//$md = new CMarkdownParser; echo strip_tags($md->safeTransform($content->content), '<h1><h2><h3><h4><h5><6h><b><strong><i>'); ?>

									</div>

								</h3>
                                
                            </div>
                            
                            <div class="question-wrap">
                                
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
							
                            <!--<img src="./themes/default/assets/images/sample-video.jpg" class="video-holder" />-->
                            
							<?php
							}
							?>
                        
                        
                        </div>
						
												<div class="comments">
	<?php $count = 0;?>
	<?php echo CHtml::link(NULL, NULL, array('name'=>'comments')); ?>
	<div class="post">
		<div class="post-inner">

			<div class="clearfix"></div>
			<?php if (!Yii::app()->user->isGuest): ?>
				<?php if ($data->commentable): ?>
    				<a id="comment-box"></a>
    	                <div id="sharebox" class="comment-box">
    	                    <div id="a">
    	                        <div id="textbox" contenteditable="true"></div>
    	                        <div id="close"></div>
    	                        <div style="clear:both"></div>
    	                    </div>
    	                    <div id="b" style="color:#999">Comment on this post</div> 
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
</div>
</div>
<div class="content" data-attr-id="<?php echo $content->id; ?>">
<div id="content-container"></div>
	<div class="post">
		<?php if (Cii::get(Cii::get($meta, 'blog-image', array()), 'value', '') != ""): ?>
			<p style="text-align:center;"><?php echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>
		<?php endif; ?>
	    <div style="clear:both;"><br /></div>
	</div>
</div>


</main>
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
main .post .post-inner .post-header-comments {
    margin-top: 10px;
}
main #sharebox, main [id*="sharebox-"] {
    border: 1px solid #DDDDDD;
}
main [id*="sharebox-"] {
    float: left;
    width: 87%;
}
main #sharebox #a, [id*="sharebox-"] [id*="a-"] {
    color: #000000;
    display: none;
    padding: 10px;
    position: relative;
}
main #sharebox #b, [id*="sharebox-"] [id*="b-"] {
    cursor: text;
    min-height: 15px;
    padding: 10px;
}
main #sharebox #close, #sharebox #textbox, [id*="sharebox-"] [id*="close-"], [id*="sharebox-"] [id*="textbox-"] {
    float: left;
}
main #sharebox #textbox, [id*="sharebox-"] [id*="textbox-"] {
    min-height: 50px;
    outline: medium none;
    width: 99%;
	font-size:12px;
}
main #sharebox #close, [id*="sharebox-"] [id*="close-"] {
    background: url("ac992187/css/../images/admin/bg.png") no-repeat scroll -33px -31px rgba(0, 0, 0, 0);
    cursor: pointer;
    height: 9px;
    margin: 1px;
    position: absolute;
    right: 11px;
    top: 11px;
    width: 9px;
}
main .comment-box-inline {
    margin-top: 5px;
    width: 93%;
}
main .sharebox-submit {
    background: none repeat scroll 0 0 #9ECA80;
    border-radius: 2px;
    color: #FFFFFF;
    cursor: pointer;
    float: right;
    font-size: 80%;
    font-weight: bold;
    margin-top: 5px;
    text-align: center;
}
main .comment-form {
    display: none;
    height: 40px;
    margin-bottom: 0;
    margin-top: 10px;
    padding-left: 50px;
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
        $.post("/comment/comment", 
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

