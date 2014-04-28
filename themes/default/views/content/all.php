                        <div class="search-wrap">
						<form method="get" action="/godwelling/search" id="search">  
                          <input type="text" id="q" name="q" value="" placeholder="Type to search, then press enter"  class="search-box"/>
                          <input type="submit" value="Search" class="search-btn" />
						  </form>
                        </div>
						<?php if (!Yii::app()->user->isGuest): ?>
						<div class="orange-wrap">
                        	<input type="button" value="Add New Query" class="orange-btn" />
                            
                            <div class="new-query-popup">
                            	<a href="javascript:void(0)" class="close">Close</a>
                            	<div id="tabs">
                                    <ul class="tabs-header">
                                        <li><a href="#query">Queries</a></li>
                                        <li><a href="#suggestion">Suggestion</a></li>
                                        <!--<li><a href="#poll">Poll</a></li>-->
                                        <li><a href="#reviews">Reviews</a></li>
                                    </ul>
									<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'ask',
									'htmlOptions'=>array('class'=>'list_form','enctype'=>'multipart/form-data'),
									'enableAjaxValidation'=>true,
									'enableClientValidation'=>false,
									'clientOptions'=>array('validateOnSubmit'=>true,),
									)); ?>
                                    <div id="query">
										<div class="alert" id="warning" style="display:none">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Hey there!</strong> Before clicking submit button, please fill all the fields.
										</div>
                                    	<ul>
                                        	<li>
                                            	<label>Queries - Short Description</label>
                                                <input type="text" id="query_short"/>
                                            </li>
                                        	<li>
                                            	<label>Queries - Details</label>
                                                <textarea id="query_detail"></textarea>
                                            </li>
                                            <li>
											<?php
												//$categories = Categories::model()->findAll();
												$categories = "";

												$models = Categories::model()->findAll(
												array('order' => 'name'));

												// format models as $key=>$value with listData
												$list = CHtml::listData($models, 
												'id', 'name');
												//print_r($categories);
											?>
											
											<?php echo CHtml::dropDownList('categories', $categories,
											$list,
											array('empty' => 'Select a category',
											'options' => array('selected'=>false)
											)
																			
											);
											?>		

											<?php
											$countries = Countries::model()->findAll();
											$countries = "";

											$models1 = Countries::model()->findAll(
											array('order' => 'nicename'));

											// format models as $key=>$value with listData
											$list1 = CHtml::listData($models1, 
											'id', 'nicename');
											//print_r($categories);
											?>&nbsp;&nbsp;

											<?php echo CHtml::dropDownList('countries', $countries,
											$list1,
											array('empty' => 'Select a country'));
											?>											
                                            	                                                

                                            </li>
                                            <li>
                                            	<div class="radio-group"><input value="0" type="radio" name="ask" id="ask" checked="checked" /> <label>Ask All</label></div>
                                                <div class="radio-group"><input value="1" onclick="loadExpert()" type="radio" name="ask" id="ask" /> <label>Ask Experts</label></div>
											</li>
											<li id="expert" style="display:none">
											<label>Select Expert</label>
											<?php
											$experts = "";
											$models2 = Users::model()->findAll(
											array('order' => 'expert')); 
											$list2 = CHtml::listData($models2, 
											'expert', 'expert');
											echo CHtml::dropDownList('expert', $experts,
											$list2,
											array('empty' => 'Select a expert'));
											?>								
												
											</li>
											<li>											
                                                <div class="radio-group"><input type="checkbox" name="identity" id="identity" style="float:left" /><label>&nbsp;&nbsp;Hide Identity</label></div>
                                            </li>

											<li  style="display:block">								                                        	
                                            	<label>Upload Photo</label>
												<input type="file" alt="image" title="image" name="photo" id="photo">
												
											</li>
											<li id="videoUrl" style="display:block">								                                        	
                                            	<label>Youtube Video</label>
												<input type="text" alt="video" title="video" name="video" id="video">
												<input type="hidden" name="cat" id="cat" value="query">
											</li>
                                            <li><input  type="submit" id="submit-query" value="Submit Query" class="green-btn" /></li>
                                        </ul>
                                    </div>
									<?php $this->endWidget(); ?>
									<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'ask1',
									'htmlOptions'=>array('class'=>'list_form','enctype'=>'multipart/form-data'),
									'enableAjaxValidation'=>true,
									'enableClientValidation'=>false,
									'clientOptions'=>array('validateOnSubmit'=>true,),
									)); ?>
                                    <div id="suggestion">
										<div class="alert" id="warning1" style="display:none">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Hey there!</strong> Before clicking submit button, please fill all the fields.
										</div>
                                    	<ul>
                                        	<li>
                                            	<label>Suggestion - Short Description</label>
                                                <input type="text" id="suggestion_short"/>
                                            </li>
                                        	<li>
                                            	<label>Suggestion - Details</label>
                                                <textarea id="suggestion_detail"></textarea>
                                            </li>
                                            <li>
											<?php
												//$categories = Categories::model()->findAll();
												$categories = "";

												$models = Categories::model()->findAll(
												array('order' => 'name'));

												// format models as $key=>$value with listData
												$list = CHtml::listData($models, 
												'id', 'name');
												//print_r($categories);
											?>
											
											<?php echo CHtml::dropDownList('categories1', $categories,
											$list,
											array('empty' => 'Select a category',
											'options' => array('selected'=>false)
											)
																			
											);
											?>		

											<?php
											$countries = Countries::model()->findAll();
											$countries = "";

											$models1 = Countries::model()->findAll(
											array('order' => 'nicename'));

											// format models as $key=>$value with listData
											$list1 = CHtml::listData($models1, 
											'id', 'nicename');
											//print_r($categories);
											?>&nbsp;&nbsp;

											<?php echo CHtml::dropDownList('countries1', $countries,
											$list1,
											array('empty' => 'Select a country'));
											?>											
                                            	                                                

                                            </li>
                                            <li>
                                            	<div class="radio-group"><input value="0" type="radio" name="ask1" id="ask1" checked="checked" /> <label>Ask All</label></div>
                                                <div class="radio-group"><input value="1" onclick="loadExpert1()" type="radio" name="ask1" id="ask1" /> <label>Ask Experts</label></div>
											</li>
											<li id="expert1" style="display:none">
											<label>Select Expert</label>
											<?php
											$experts = "";
											$models2 = Users::model()->findAll(
											array('order' => 'expert')); 
											$list2 = CHtml::listData($models2, 
											'expert', 'expert');
											echo CHtml::dropDownList('expert1', $experts,
											$list2,
											array('empty' => 'Select a expert'));
											?>								
												
											</li>
											<li>											
                                                <div class="radio-group"><input type="checkbox" name="identity1" id="identity1" style="float:left" /><label>&nbsp;&nbsp;Hide Identity</label></div>
                                            </li>

											<li  style="display:block">								                                        	
                                            	<label>Upload Photo</label>
												<input type="file" alt="image" title="image" name="photo1" id="photo1">
												
											</li>
											<li id="videoUrl" style="display:block">								                                        	
                                            	<label>Youtube Video</label>
												<input type="text" alt="video" title="video" name="video1" id="video1">
												<input type="hidden" name="cat1" id="cat1" value="suggestion">
											</li>
                                            <li><input  type="submit" id="submit-query1" value="Submit Suggestion" class="green-btn" /></li>
                                        </ul>
                                    </div>
									<?php $this->endWidget(); ?>
									
                                    <div id="poll">
                                    	<ul>
                                        	<li>
                                            	<label>Poll - Short Description</label>
                                                <input type="text" />
                                            </li>
                                        	<li>
                                            	<label>Poll - Details</label>
                                                <textarea></textarea>
                                            </li>
                                            <li>
											
                                            	<select  data-placeholder="Category" class="chosen-category" tabindex="1">
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
                                                </select>
                                                
                                                <select data-placeholder="Select Country" class="chosen" tabindex="1">
                                                    <option value=""></option>
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Aland Islands">Aland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                </select>
                                            </li>
                                            <li>
                                            	<div class="radio-group"><input type="radio" name="ask" /> <label>Ask All</label></div>
                                                <div class="radio-group"><input type="radio" name="ask" /> <label>Ask Experts</label></div>
                                                <div class="radio-group"><input type="radio" name="ask" /> <label>Hide Identity</label></div>
                                            </li>
                                            <li class="uploads"><a href="#" class="photo">Upload Photo</a>
                                            	<a href="#" class="video">Upload Video</a>
                                            </li>
                                            <li><input type="submit" value="Submit" class="green-btn" /></li>
                                        </ul>
                                    </div>
                                    <!-- poll ends here -->
									
									<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'ask2',
									'htmlOptions'=>array('class'=>'list_form','enctype'=>'multipart/form-data'),
									'enableAjaxValidation'=>true,
									'enableClientValidation'=>false,
									'clientOptions'=>array('validateOnSubmit'=>true,),
									)); ?>
                                    <div id="reviews">
										<div class="alert" id="warning2" style="display:none">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Hey there!</strong> Before clicking submit button, please fill all the fields.
										</div>
                                    	<ul>
                                        	<li>
                                            	<label>Review - Short Description</label>
                                                <input type="text" id="review_short"/>
                                            </li>
                                        	<li>
                                            	<label>Review - Details</label>
                                                <textarea id="review_detail"></textarea>
                                            </li>
                                            <li>
											<?php
												//$categories = Categories::model()->findAll();
												$categories = "";

												$models = Categories::model()->findAll(
												array('order' => 'name'));

												// format models as $key=>$value with listData
												$list = CHtml::listData($models, 
												'id', 'name');
												//print_r($categories);
											?>
											
											<?php echo CHtml::dropDownList('categories2', $categories,
											$list,
											array('empty' => 'Select a category',
											'options' => array('selected'=>false)
											)
																			
											);
											?>		

											<?php
											$countries = Countries::model()->findAll();
											$countries = "";

											$models1 = Countries::model()->findAll(
											array('order' => 'nicename'));

											// format models as $key=>$value with listData
											$list1 = CHtml::listData($models1, 
											'id', 'nicename');
											//print_r($categories);
											?>&nbsp;&nbsp;

											<?php echo CHtml::dropDownList('countries2', $countries,
											$list1,
											array('empty' => 'Select a country'));
											?>											
                                            	                                                

                                            </li>
                                            <li>
                                            	<div class="radio-group"><input value="0" type="radio" name="ask2" id="ask2" checked="checked" /> <label>Ask All</label></div>
                                                <div class="radio-group"><input value="1" onclick="loadExpert2()" type="radio" name="ask2" id="ask2" /> <label>Ask Experts</label></div>
											</li>
											<li id="expert2" style="display:none">
											<label>Select Expert</label>
											<?php
											$experts = "";
											$models2 = Users::model()->findAll(
											array('order' => 'expert')); 
											$list2 = CHtml::listData($models2, 
											'expert', 'expert');
											echo CHtml::dropDownList('expert2', $experts,
											$list2,
											array('empty' => 'Select a expert'));
											?>								
												
											</li>
											<li>											
                                                <div class="radio-group"><input type="checkbox" name="identity2" id="identity2" style="float:left" /><label>&nbsp;&nbsp;Hide Identity</label></div>
                                            </li>

											<li  style="display:block">								                                        	
                                            	<label>Upload Photo</label>
												<input type="file" alt="image" title="image" name="photo2" id="photo2">
												
											</li>
											<li id="videoUrl" style="display:block">								                                        	
                                            	<label>Youtube Video</label>
												<input type="text" alt="video" title="video" name="video2" id="video2">
												<input type="hidden" name="cat2" id="cat2" value="review">
											</li>
                                            <li><input  type="submit" id="submit-query2" value="Submit Review" class="green-btn" /></li>
                                        </ul>
                                    </div>
									<?php $this->endWidget(); ?>
                                    
                                    <div id="reviews1">
                                    	<ul>
                                        	<li>
                                            	<label>Reviews - Short Description</label>
                                                <input type="text" />
                                            </li>
                                        	
                                            <li>


                                            	<select  data-placeholder="Category" class="chosen-category" tabindex="1">
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
                                                </select>
                                                
                                                <select data-placeholder="Select Country" class="chosen" tabindex="1">
                                                    <option value=""></option>
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Aland Islands">Aland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                </select>
                                            </li>
                                            <li>
                                            	<div class="radio-group"><input type="radio" name="ask" /> <label>Ask All</label></div>
                                                <div class="radio-group"><input type="radio" name="ask" /> <label>Ask Experts</label></div>
                                                <div class="radio-group"><input type="radio" name="ask" /> <label>Hide Identity</label></div>
                                            </li>
                                            <li class="uploads"><a href="#" class="photo">Upload Photo</a>
                                            	<a href="#" class="video">Upload Video</a>
                                            </li>
                                            <li><input  type="submit" value="Submit" class="green-btn" /></li>
                                        </ul>
                                    </div>
                                    
                            	</div>
                       		 </div>
                             <!-- query popup ends here -->
                            
                        </div>
						
						<!--if logged in-->				
										
										
						<?php else: ?>												
							<div class="alert" style="display:none">
								<button type="button" class="close">&times;</button>
								<strong>Hey there!</strong> Before posting a query, you must <?php echo CHtml::link('login', $this->createUrl('./site/login/')); ?> or <?php echo CHtml::link('signup', $this->createUrl('./site/register/')); ?>
							</div>
						<div class="orange-wrap1">
							<input type="button" value="Add New Query" class="orange-btn" />
						</div>	
						<?php endif; ?>
						
                        
                        <div id="posts">
		<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'ask',
				'htmlOptions'=>array('class'=>'list_form'),
				'enableAjaxValidation'=>true,
				'enableClientValidation'=>false,
				'clientOptions'=>array('validateOnSubmit'=>true,),
)); 
$categories = Categories::model()->findAll();

$models = Categories::model()->findAll(
                 array('order' => 'name'));
 
// format models as $key=>$value with listData
$list = CHtml::listData($models, 
                'id', 'name');

?>
		<?php $this->endWidget(); ?>
		<br/>

<div id="posts">
<?php foreach($data as $content): ?>

<?php 
if($content->content!=""){?>
    <div class="post">
	
<?php 
$this->renderPartial('//content/_post', array('content' => $content)); ?>
    </div>
<?php } ?>
	
<?php  endforeach; ?>
</div>
<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    /*'itemSelector' => '#posts div.post',*/
    'loadingText' => 'Loading...',
    'donetext' => 'This is the end of dweling questions..',
    'pages' => $pages,
)); ?>

</div>

                        

                        
                        <div class="box-wrap reviews-wrap">
                        	<div class="image-wrap left">
                        		<img src="./themes/default/assets/images/avatar-author.png" />
                                <span class="name">Eby jane</span>
                            </div>
                            
                            <div class="question-wrap">
                            	<h3>Which is the best smart phone in India?</h3>
                             
                                <div class="date-time-wrap">
                            		March 10, 2014 | Technology | 3 comments
                            	</div>
                            </div>
                            
                            <div class="review-widget">
                            	<h2 class="review-count">3.5</h2>
                                <ul class="star-wrap group">
                                	<li class="full"></li>
                                    <li class="full"></li>
                                    <li class="full"></li>
                                    <li class="half"></li>
                                    <li class="empty"></li>
                                </ul>
                                <span class="review-rating">124 rating</span>

                            </div>

                            <div class="comment-wrap">
                            	<img src="./themes/default/assets/images/avatar-commenter.png" class="left comment-img" />
                                <div class="comment-text">
                                	<h4>Chetan Kadur - <small> 2 days ago</small></h4>
                                	<p>Great post! I would say that if you've neglected your blog for an extended period(2 months +), why not rally new and existing readers around a re-launch.</p>
                                    <ul class="comment-action group">
                                    	<li><a href="#" class="reply">Reply</a></li>
                                        <li><a href="#" class="flag">Flag</a></li>
                                        <li><a href="#" class="like">Like</a></li>
                                        <li><a href="#" class="dislike">Dislike</a></li>	
                                    </ul>
                                </div>
                                <div class="group"></div> 
                            </div>
                        </div>
						
						
						
                        <!-- reviews wrap ends -->
                        </div>

						
<script type="text/javascript">
function loadExpert(){
//alert("inside function");
document.getElementById('expert').style.display = "block";
}
function loadExpert1(){
//alert("inside function");
document.getElementById('expert1').style.display = "block";
}
function loadExpert2(){
//alert("inside function");
document.getElementById('expert2').style.display = "block";
}

function openvideobox(){
//alert("inside video function");
document.getElementById('videoUrl').style.display = "block";
document.getElementById('videobutton').style.display = "none";
return false;
}
function testClick(idVal){
	//alert('test click');
	//alert(idVal);
	var id = idVal.split("-");		
	var url = "/comment/like/id/"+id[2];
	var idData = id[2];
	//alert(idData);

	$.post("/godwelling/comment/like/id/"+idData, function(data, textStatus, jqXHR) {
	//alert(data.status);
		if (data.status == undefined)
			window.location = "<?php echo $this->createUrl('/login'); ?>"

		if (data.status == "success")
		{
			var count = parseInt($("#"+idVal).text());
			
			
			if (data.type == "inc"){
				var j = $("#"+idVal);
				var n = parseInt(j.text(), 10);
				j.text(n + 1);			
				//$("#"+idVal).text(count + 1).parent().parent().parent().addClass("liked");
				}
			else{
				var j = $("#"+idVal);
				var n = parseInt(j.text(), 10);
				j.text(n - 1);
				//$("#"+idVal).text(count - 1).parent().parent().parent().removeClass("liked");
				}
		}
	});
	//break;
	return false;					
}

function dislike(idVal){
	//alert('test click');
	//alert(idVal);
	var id = idVal.split("-");		
	var url = "/comment/dislike/id/"+id[2];
	var idData = id[2];
	//alert(idData);

	$.post("/godwelling/comment/dislike/id/"+idData, function(data, textStatus, jqXHR) {
	//alert(data.status);
		if (data.status == undefined)
			window.location = "<?php echo $this->createUrl('/login'); ?>"

		if (data.status == "success")
		{
			var count = parseInt($("#"+idVal).text());
			if (data.type == "inc"){
			var j = $("#"+idVal);
			var n = parseInt(j.text(), 10);
			j.text(n + 1);
			//$("#"+idVal).text(count + 1).parent().parent().parent().addClass("liked");
				}
			else{
			var j = $("#"+idVal);
			var n = parseInt(j.text(), 10);
			j.text(n - 1);
				//$("#"+idVal).text(count - 1).parent().parent().parent().removeClass("liked");
				}
		}
	});
	//break;
	return false;					
}
</script>



       						
<?php Yii::app()->clientScript->registerScript('ask-question', '
    $("#textbox").keydown( function() {
        if($("textarea#textbox").val() != "")
            $("#submit-comment").css("background","#3b9000");
        else
            $("#submit-comment").css("background","#9eca80");
        });

    $("#submit-query2").click(function(e) {
	alert("i clicked submit button");
				alert("we are here");
        e.preventDefault();
        if (($("#review_short").val() == "")||($("textarea#review_detail").val() == "")||($("#categories2 :selected").val() == "")||($("#countries2 :selected").val() == "")){
			$("div#warning2").fadeIn();
            return;
		}	
			alert($("#countries2 :selected").val());

			
		var formData = new FormData($("#ask2")[0]);	
		$.ajax({url:"'.Yii::app()->getUrlManager()->createUrl('/content/upload2').'",
		type: "POST",
        data: formData,
		datatype:"json",
		success:function(result){
		//$("#div1").html(result);
		alert(result);
		},
		cache: false,
        contentType: false,
        processData: false
    });
		
        $.post("/godwelling/content/content", 
        	{ 
        		"Content" : 
        		{ 
        			"content" : $("textarea#review_detail").val(),
					"title" : $("#review_short").val(),
					"categories" : $("#categories2 :selected").val(),
					"countries" : $("#countries2 :selected").val(),
					"ask" :   $("input:radio[name=ask2]:checked").val(),
					"expert": $("#expert2 :selected").val(),
					"identity" : $("#identity2").is(":checked"),
					"photo" : $("#photo2").val(),
					"cat" : $("#cat2").val(),
					"video" : $("#video2").val()
        		}
        	}, 
        	function(data) { 
				alert(data);
        		$("#suggestion_short").text("");  
        		$("#content-container").prepend(data);
        		$("div#content-container").children(":first").fadeIn();
        		$(".close").click();
				
        		/*$(".comment-count").text((parseInt($(".comment-count").text().replace(" Comment", "").replace(" Comments", "")) + 1) + " Comments");*/
        	}
        );
    });	
		
    $("#submit-query1").click(function(e) {
	alert("i clicked submit button");
				alert("we are here");
        e.preventDefault();
        if (($("#suggestion_short").val() == "")||($("textarea#suggestion_detail").val() == "")||($("#categories1 :selected").val() == "")||($("#countries1 :selected").val() == "")){
			$("div#warning1").fadeIn();
            return;
		}	
			alert($("#countries1 :selected").val());

			
		var formData = new FormData($("#ask1")[0]);	
		$.ajax({url:"'.Yii::app()->getUrlManager()->createUrl('/content/upload1').'",
		type: "POST",
        data: formData,
		datatype:"json",
		success:function(result){
		//$("#div1").html(result);
		alert(result);
		},
		cache: false,
        contentType: false,
        processData: false
    });
		
        $.post("/godwelling/content/content", 
        	{ 
        		"Content" : 
        		{ 
        			"content" : $("textarea#suggestion_detail").val(),
					"title" : $("#suggestion_short").val(),
					"categories" : $("#categories1 :selected").val(),
					"countries" : $("#countries1 :selected").val(),
					"ask" :   $("input:radio[name=ask1]:checked").val(),
					"expert": $("#expert1 :selected").val(),
					"identity" : $("#identity1").is(":checked"),
					"photo" : $("#photo1").val(),
					"cat" : $("#cat1").val(),
					"video" : $("#video1").val()
        		}
        	}, 
        	function(data) { 
				alert(data);
        		$("#suggestion_short").text("");  
        		$("#content-container").prepend(data);
        		$("div#content-container").children(":first").fadeIn();
        		$(".close").click();
				
        		/*$(".comment-count").text((parseInt($(".comment-count").text().replace(" Comment", "").replace(" Comments", "")) + 1) + " Comments");*/
        	}
        );
    });		
    
    $("#submit-query").click(function(e) {
	//alert("i clicked submit button");
				//alert("we are here");
        e.preventDefault();
        if (($("#query_short").val() == "")||($("textarea#query_detail").val() == "")||($("#categories :selected").val() == "")||($("#countries :selected").val() == "")){
			$("div#warning").fadeIn();
            return;
		}	
			//alert($("#countries :selected").val());

			
		var formData = new FormData($("#ask")[0]);	
		$.ajax({url:"'.Yii::app()->getUrlManager()->createUrl('/content/upload').'",
		type: "POST",
        data: formData,
		datatype:"json",
		success:function(result){
		//$("#div1").html(result);
		alert(result);
		},
		cache: false,
        contentType: false,
        processData: false
    });
		
        $.post("/godwelling/content/content", 
        	{ 
        		"Content" : 
        		{ 
        			"content" : $("textarea#query_detail").val(),
					"title" : $("#query_short").val(),
					"categories" : $("#categories :selected").val(),
					"countries" : $("#countries :selected").val(),
					"ask" :   $("input:radio[name=ask]:checked").val(),
					"expert": $("#expert :selected").val(),
					"identity" : $("#identity").is(":checked"),
					"photo" : $("#photo").val(),
					"cat" : $("#cat").val(),
					"video" : $("#video").val()
        		}
        	}, 
        	function(data) { 
				//alert(data);
        		$("#query_short").text("");  
        		$("#content-container").prepend(data);
        		$("div#content-container").children(":first").fadeIn();
        		$(".close").click();
				
        		/*$(".comment-count").text((parseInt($(".comment-count").text().replace(" Comment", "").replace(" Comments", "")) + 1) + " Comments");*/
        	}
        );
    });
')->registerScript('likeButton', '
	$("[id ^=\'upvote\']").click(function(e) {
		/*e.preventDefault();
		var idVal = $(this).find("span").find("span").attr("id");
		var id = idVal.split("-");		
		var url = "/comment/like/id/"+id[2];

		$.post("/godwelling/comment/like/id/"+id[2], function(data, textStatus, jqXHR) {
			if (data.status == undefined)
				window.location = "' . $this->createUrl('/login') . '"

			if (data.status == "success")
			{
				var count = parseInt($("#"+idVal).text());
				
				if (data.type == "inc"){
					$("#"+idVal).text(count + 1).parent().parent().parent().addClass("liked");
					}
				else{
					$("#"+idVal).text(count - 1).parent().parent().parent().removeClass("liked");
					}
			}
		});
		return false;*/
	});
')->registerScript('fetchContent', '
	$.post("' . $this->createUrl('/content/getContent/id/' . $content->id) . '", function(data) {
	//alert(data);

	});
');

$this->widget('ext.timeago.JTimeAgo', array(
    'selector' => ' .timeago',
));			

?>



				