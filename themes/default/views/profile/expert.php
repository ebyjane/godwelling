<div class="container-12 register-mail-wrap">
    	<div class="group">
        	<div class="grid-12 register-mail">
            	<h1>Continue from Registering Mail</h1>
                <div class="register-container clearfix">
                <ul>
                	<li><label>First Name</label><input type="text" placeholder="First name" /></li>
                    <li><label>Last Name</label><input type="text" placeholder="Last name" /></li>
                    <li><label>Godwelling User Name</label><input type="text" placeholder="<?php echo CHtml::encode($model->name); ?>" /></li>
                    <li><label>Gender</label>
                    	<div class="gender-wrap">
                        	<input type="radio" name="gender" /> Male
                            <input type="radio" name="gender" /> Female
                        </div>
                    </li>
                    <li><label>Country</label>
                    	<select data-placeholder="Select Country" class="chosen" tabindex="1">
                            <option value=""></option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Aland Islands">Aland Islands</option>
                            <option value="Albania">Albania</option>
                        </select>
                    </li>
                    <li><label>Your Expert field</label>
                    	<select data-placeholder="Category" class="chosen-category" tabindex="1">
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
                    </li>
                    <li><label>Profession</label><input type="text" placeholder="Profession" /></li>
                    <li><label>About</label><textarea placeholder="About"></textarea></li>
                </ul>
                <div class="photo-upload-wrap">
                	<img src="../themes/default/assets/images/photo-avatar.png" />
                    <input type="button" value="Upload Photo" class="gray-btn" />
                </div>
                </div>
                <input type="submit" class="green-btn full" value="Save &amp; Continue" />
            </div>
        </div>
    </div>
	</div>
	</div>
	</div>
    <!-- register-mail-wrap ends here -->