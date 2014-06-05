<?php 
$this->beginContent('//layouts/main'); ?>
                	<div class="content-wrap">
					 <?php echo $content; ?>
                    
					</div>
	                
                <div class="grid-4 sidebar">
                	<div class="box">
					<?php
												//$categories = Categories::model()->findAll();
												$categories = "";

												$models = Categories::model()->findAll(
												array('order' => 'name'));

												// format models as $key=>$value with listData
												$list = CHtml::listData($models, 
												'slug', 'name');
												//print_r($categories);
											?>
											
											<?php echo CHtml::dropDownList('categories', $categories,
											$list,
											array('empty' => 'Select a category',
											'options' => array('selected'=>false),
											'class' => 'chosen-category',
											'onchange'=>'javascript: document.location.href=$(this).val();'
											
											)
											
											
																			
											);
											
											
											?>	
                    	<!--<select data-placeholder="Category" class="chosen-category" tabindex="1">
                            <option value=""></option>
                            <option value="">Education &amp; Development</option>
                            <option value="">Entertainment</option>
                            <option value="">Finance &amp; Economy</option>
                            <option value="">Fitness &amp; Style</option>
                            <option value="">Food &amp; Beverage</option>
                            <option value="">Health &amp; Beauty</option>
                            <option value="">Law &amp; Rules</option>
                            <option value="">News &amp; Events</option>
                            <option value="">Pets</option>
                            <option value="">Politics &amp; Government</option>
                            <option value="">Product &amp; Services</option>
                            <option value="">Relationship &amp; Psychology</option>
                            <option value="">Society &amp; Culture</option>
                            <option value="">Sports</option>
                            <option value="">Technology &amp; Gadgets</option>
                            <option value="">Travel &amp; Tourism</option>
                        </select>-->
                    </div>
                    
                    <div class="box">
                    	<h2 class="title">Most Commented</h2>
                        <ul class="group">
						<?php
							$sql = "SELECT content_id, COUNT( * ) AS `num` FROM comments GROUP BY content_id ORDER BY NUM DESC LIMIT 0 , 3";
							$command = Yii::app()->db->createCommand($sql);
							$results1 = $command->queryAll();
						?>
						
						<?php foreach ($results1 as $key=>$value): ?>
						
						<?php 
							$idVal = $value['content_id'];
							$sql = "SELECT title,slug,extract FROM content WHERE id = '".$idVal."'";
							$command = Yii::app()->db->createCommand($sql);
							$results = $command->queryAll();						
							//echo "<li>".$results[0]['title']."</li>";
							//echo "<br/>";
						?>
							<li>
								<a href="<?php echo $this->createUrl('/' . $results[0]['slug']); ?>" rel="bookmark">	
								<?php $md = new CMarkdownParser; echo strip_tags($md->safeTransform($results[0]['title']), '<h1><h2><h3><h4><h5><6h><p><b><strong><i>'); ?>
								</a>
							</li>
						
						<?php endforeach; ?>
                        	<!--<li>Problem with Samsung touch screen with Samsung touch screen</li>
                            <li>How is Iron man 3 movie</li>-->
                            <!--<li><a href="#" class="readmore right">Read more &raquo;</a></li>-->
                        </ul>
                    </div>
					

                    
                    <div class="box">
                    	<h2 class="title most-like">Most Liked Comment</h2>
                        <ul class="group">
						<?php
						 
							$sql = "SELECT content_id, comment FROM `comments` WHERE like_count >0 ORDER BY like_count DESC LIMIT 0 , 3";
							$command = Yii::app()->db->createCommand($sql);
							$results1 = $command->queryAll();
						?>
						
						<?php foreach ($results1 as $key=>$value): ?>
						
						<?php 
							$idVal = $value['content_id'];
							$sql = "SELECT title,slug,extract FROM content WHERE id = '".$idVal."'";
							$command = Yii::app()->db->createCommand($sql);
							$results = $command->queryAll();
						?>
						<li>
								<a href="<?php echo $this->createUrl('/' . $results[0]['slug']); ?>" rel="bookmark">
						<?php $md = new CMarkdownParser; echo strip_tags($md->safeTransform($value['comment']), '<h1><h2><h3><h4><h5><6h><p><b><strong><i>'); ?>		
						<?php 
							//echo $value['comment'];
							//echo "<br/>";
						?>
						</a>
							</li>
						
						<?php endforeach; ?>
                            <!--<li><a href="#" class="readmore right">Read more &raquo;</a></li>-->
                        </ul>
                    </div>
                    <?php 
					if(!Yii::app()->user->isGuest){
					?>
                    <div class="box">
                    	<h2 class="title expert">Questions for Experts</h2>
                        <!--<ul class="group">
                        	<li>Problem with Samsung touch screen with Samsung touch screen</li>
                            <li>How is Iron man 3 movie</li>
                            <li>Problem with Samsung touch screen with Samsung touch screen</li>
                            <li><a href="#" class="readmore right">Read more &raquo;</a></li>
                        </ul>-->
                    </div>
                    <?php } ?>
                    <div class="box advertisement">
                    	<h3>Advertisements</h3>
                        <img src="http://godwelling.com/images/add1.jpg" />
                        <img src="http://godwelling.com/images/add2.jpg" />
                    </div>
                </div>
                <!-- sidebar ends -->
            </div>
        </div>
        </div>
<?php $this->endContent(); ?>