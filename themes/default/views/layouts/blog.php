<?php 
$this->beginContent('//layouts/main'); ?>
                	<div class="content-wrap">
					 <?php echo $content; ?>                    
					</div>
	                
                <div class="grid-4 sidebar">
                    
                   <?php 
					if(!Yii::app()->user->isGuest){
					?>
                    <?php } ?>
                    <div class="box advertisement">
                    	<h3>Advertisements</h3>
                        <img src="images/add1.jpg" />
                        <img src="images/add2.jpg" />
                    </div>
                </div>
                <!-- sidebar ends -->
            </div>
        </div>
        </div>
<?php $this->endContent(); ?>



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
			<div class="green-indicator author-indicator">
		<div class="comment-body">
		    			    <p><p><?php echo $val['comment']; ?><p></p>
					</div>
	</div>		
<?php
		}
		}
		?>

                <!-- sidebar ends -->
            </div>
        </div>	

</div>




