<?php 
/*********

Template Name: Register-Template


*********/
?>
<?php get_header(); ?>
<div id="content">

	<div id="contentleft">
	<?php if ( !is_user_logged_in() ) { ?>
		<div class="form_content">
		<h2 style="color:<?php echo get_option('general_bg'); ?>;">Registration</h2>
		<form id="signup_form" method="post" name="signup_form" action="" >
				<h3 style="color:<?php echo get_option('general_bg'); ?>;">Personal Information</h3>
				<label>First Name</label>
				<input id="fname" type="text" name="fname" placeholder="Name" value="" />
				<label>Last Name</label>
				<input id="lname" type="text" name="lname" placeholder="Last Name" value="" />
				
				<label>Address</label>
				<input id="address" type="text" name="address" placeholder="Your Address" value=""/>
				<label>Apartment</label>
				<input id="apartment" type="text" name="apartment" placeholder="Your Apartment" value=""/>
				<label>Country</label>
				<?php 
				$countries =array("Afghanistan", "Albania", "Algeria", "American Samoa", "Angola", "Anguilla", "Antartica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Ashmore and Cartier Island", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Clipperton Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czeck Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Europa Island", "Falkland Islands (Islas Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern and Antarctic Lands", "Gabon", "Gambia, The", "Gaza Strip", "Georgia", "Germany", "Ghana", "Gibraltar", "Glorioso Islands", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Holy See (Vatican City)", "Honduras", "Hong Kong", "Howland Island", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Ireland, Northern", "Israel", "Italy", "Jamaica", "Jan Mayen", "Japan", "Jarvis Island", "Jersey", "Johnston Atoll", "Jordan", "Juan de Nova Island", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Man, Isle of", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Midway Islands", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcaim Islands", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romainia", "Russia", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Scotland", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and South Sandwich Islands", "Spain", "Spratly Islands", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Tobago", "Toga", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "USA", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands", "Wales", "Wallis and Futuna", "West Bank", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
				
				

				?>   
				<select id="country" name="country" />
					<option value="">Select Country</option>
					<?php foreach($countries as $country){
					?>
					<option value="<?php echo $country; ?>"><?php echo $country; ?></option>
					<?php
					
					}
					 ?>
					
				</select>
				<label>State</label>
				<select id="state" name="state" disabled="disabled"/>
					<option value="">Select State</option>
					<option value="test">State</option>
				</select>
				<label>City</label>
				<input id="city" type="text" name="city" placeholder="Your City" value=""/>
<!--				<label>State</label>
				<input id="state" type="text" name="state" placeholder="Your State" value=""/>
-->				
				<label>Zip Code</label>
				<input id="zip" type="text" name="zip" placeholder="Zip Code" value=""/>
				
				
				<h3 style="color:<?php echo get_option('general_bg'); ?>;">User Information</h3>
				<label>Email</label>
				<input id="email" type="email" name="email" placeholder="Email" value=""/>
				<label>Username</label>
				<input id="username" type="text" name="username" placeholder="Your Username" value=""/>
				<label>Password</label>
				<input id="password" type="password" name="password" placeholder="Password" value=""/>
				<label>Repeat Password</label>
				<input id="repeat_password" type="password" name="repeat_password" placeholder="Repeat Password" value=""/>
				
				<h3 style="color:<?php echo get_option('general_bg'); ?>;">Payment Information</h3>
				<label>Payment Mode</label>
				<select name="payment_head" id="payment_head" class="" >
					<option value="">Select Payment</option>
					<option id="Paypal" value="Paypal">Paypal</option>
					<option id="Check" value="Check">Check</option>
				</select>	
				<div id="paypal_show" class="paypal_details" >
						<label>Paypal ID</label>
						<input id="paypal" type="text" name="paypal" placeholder="Paypal ID" value=""/>
				</div>
<!--				<div id="check_show" class="check_details" >
						<label>Check Details</label>
						<input id="check" type="text" name="check" placeholder="Check" value=""/>
				</div>			
-->		
				
				<input id="signup_button" type="button" name="sign_up" value="Submit">	
		</form>
		<span class="notification"></span>
		</div>
		<?php } else { ?>
		<p>You Are Already Registered <a href="<?php echo get_option('home'); ?>" >Click Here To Go Home</a></p>
		<?php } ?>
		
	</div>
			
<?php //include(TEMPLATEPATH."/sidebar.php");?>
</div>
<?php get_footer(); ?>