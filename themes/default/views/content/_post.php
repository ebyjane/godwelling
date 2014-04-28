<?php 
//echo "content value = ".$content->content;
$meta = Content::model()->parseMeta($content->metadata); 
Yii::import('ext.jqPrettyPhoto');

?>

<div id="content-container"></div>

	<?php if (Cii::get(Cii::get($meta, 'blog-image', array()), 'value', '') != ""): ?>
		<p style="text-align:center;"><?php echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>

		
	<?php endif; ?>
	

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
					if(!Yii::app()->user->isGuest){
					?>
						<div class="review-widget">
						<h2 class="review-count"><div id='mystar_voting_<?php echo $content->id ?>'>0</div></h2>
							<div style="padding-left:60px">
								<?php
									$this->widget('CStarRating',array(
									'name'=>'rating_'.$content->id,
									'callback'=>'
									function(){
									$.ajax({
									type: "POST",
									url: "'.Yii::app()->createUrl('content/starRatingAjax').'",
									data: "star_rating=" + $(this).val(),
									success: function(data){
									$("#mystar_voting_'.$content->id.'").html(data);
									}})}'
									));
									echo "<br/>";
									//echo "<div id='mystar_voting'></div>";
								?>
							</div>
						<span class="review-rating">0 rating</span>

						</div>
					<?php
					}


					if(Yii::app()->user->isGuest){
					?>					
						<div class="review-widget">
						<h2 class="review-count"><div id='mystar_voting_<?php echo $content->id ?>'>8.5</div></h2>
							<div style="padding-left:60px">
								<?php
									$this->widget('CStarRating',array(
									'name'=>'rating_'.$content->id,
									'value'=>'7',
									'readOnly'=>true,
									'callback'=>'
									function(){
									$.ajax({
									type: "POST",
									url: "'.Yii::app()->createUrl('content/starRatingAjax').'",
									data: "star_rating=" + $(this).val(),
									success: function(data){
									$("#mystar_voting_'.$content->id.'").html(data);
									}})}'
									));
									echo "<br/>";
									//echo "<div id='mystar_voting'></div>";
								?>
							</div>
						<span class="review-rating">1 rating</span>

						</div>
					<?php }?>							

                           
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
							
							
													<?php 
						$comments = Comments::model()->findAllByAttributes(array('content_id' => $content->id));
						
						if(count($comments)>0){
						
						
						$criteria=new CDbCriteria;
						$criteria->order = 'created DESC';
						$criteria->limit = 2;
						$criteria->addCondition('content_id ='.$content->id)
								 ->addCondition('approved = 1');

						$itemCount = Comments::model()->count($criteria);
						$pages=new CPagination($itemCount);
						$pages->pageSize=$pageSize;

						$criteria->offset = $criteria->limit*($pages->getCurrentPage());
						$comments = Comments::model()->findAll($criteria);
						
						/*$comments = Comments::model()->findAllByAttributes(array('content_id' => $content->id));*/
						
		//print_r($comments);
		foreach($comments as $k=>$val){
		?>
                            <div class="comment-wrap">
	<?php //echo $content->author->id; 
							$model  = Users::model();
							$id = $val['user_id'];
							$key = "blog-image";
							$image_data = UserMetadata::model()->findByAttributes(array('user_id' => $id, 'key' => $key));
							//echo count($image_data);
							$userDetails = Users::model()->findByAttributes(array('id' => $id));
							
							if(count($image_data)>0){
								echo CHtml::link(CHtml::image("/godwelling/uploads/".$image_data->value, NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/godwelling/uploads/".$image_data->value, 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$id}/"));
							}else{
								echo CHtml::link(CHtml::image("/godwelling/uploads/images.jpg", NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/godwelling/uploads/images.jpg", 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$id}/"));
							}	
	
	?>
                                <div class="comment-text">
								
								<h4><?php if ($val['id'] != 0): ?>
												<span class="icon-share-alt"></span> <?php echo CHtml::encode($userDetails->displayName); ?>
								<?php endif; ?>
								
                                	<small> <time class="timeago" datetime="<?php echo date(DATE_ISO8601, strtotime($val['created'])); ?>">
									<?php echo Cii::formatDate($val['created']); ?>
								</time></small></h4>
                                	<p><?php echo $val['comment']; ?></p>
                                    <ul class="comment-action group">
                                    	<!--<li><a href="#" class="reply">Reply</a></li>
                                        <li><a href="#" class="flag">Flag</a></li>-->
                                        <li><a onclick=testClick("like-count-<?php echo $val['id']; ?>"); style="cursor:pointer"   id="upvote" title="Like this post and discussion" href="#" class="like">Like</a></li>
                                        <li><a onclick=dislike("dislike-count-<?php echo $val['id']; ?>"); style="cursor:pointer"   id="upvote" title="Dislike this post and discussion" href="#" class="dislike">Dislike</a></li>	
										<li><a href="#" style="text-decoration:none"><span id="like-count-<?php echo $val['id']; ?>">&nbsp;&nbsp;<?php echo $val['like_count']; ?> 
								</span> Like</a></li>
                                        <li><a href="#" style="text-decoration:none"><span id="dislike-count-<?php echo $val['id']; ?>"><?php echo $val['dislike_count']; ?></span> Dislike</a></li>	
                                    </ul>
                                </div>
                                <div class="group"></div> 
                            </div>
		<?php } } ?>					
                        </div>	

    <div style="clear:both;"><br /></div>



