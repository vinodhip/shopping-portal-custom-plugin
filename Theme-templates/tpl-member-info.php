<?php 
/*********

Template Name: Member-Info-Template


*********/
?>

<?php get_header(); ?>
<div id="content">

	<div id="contentleft">
		<h1 style="color:<?php echo get_option('general_bg'); ?>;"><?php echo get_the_title(); ?></h1>
		<?php if ( is_user_logged_in() ) {?>
		<?php $current_user = wp_get_current_user(); 
		$user = get_user_by( 'id', $current_user->ID );
		$user_mailId = $user->data->user_email;
		$updated_values = get_user_meta($current_user->ID);
//		echo '<pre>';
//		print_r($updated_values);
//		echo '</pre>';
		?>
		<div class="form_content">
		<form id="edit_data" method="post" name="edit_data" action="" >
		<h3 style="color:<?php echo get_option('general_bg'); ?>;">Personal Information</h3>
				<label>First Name</label>
				<input id="fname_update" type="text" name="fname_update" placeholder="First Name" value="<?php if(isset($updated_values['first_name'][0]) !=''){echo $updated_values['first_name'][0];} ?>" />
				<label>Last Name</label>
				<input id="lname_update" type="text" name="lname_update" placeholder="Last Name" value="<?php if(isset($updated_values['last_name'][0]) !=''){echo $updated_values['last_name'][0];} ?>" />
				
				<label>Address</label>
				<input id="address_update" type="text" name="address_update" placeholder="Your Address" value="<?php if(isset($updated_values['user_address'][0]) !=''){echo $updated_values['user_address'][0];} ?>"/>
				<label>Apartment</label>
				<input id="apartment_update" type="text" name="apartment_update" placeholder="Your Apartment" value="<?php if(isset($updated_values['user_apartment'][0]) !=''){echo $updated_values['user_apartment'][0];} ?>"/>
				
				<?php /*?><label>State</label>
				<input id="state_update" type="text" name="state_update" placeholder="Your State" value="<?php if(isset($updated_values['user_state'][0]) !=''){echo $updated_values['user_state'][0];} ?>"/><br /><?php */?>
				
				<!--added new start-->	
				<label>Country</label>
				<?php 
				$countries =array("Afghanistan", "Albania", "Algeria", "American Samoa", "Angola", "Anguilla", "Antartica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Ashmore and Cartier Island", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Clipperton Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czeck Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Europa Island", "Falkland Islands (Islas Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern and Antarctic Lands", "Gabon", "Gambia, The", "Gaza Strip", "Georgia", "Germany", "Ghana", "Gibraltar", "Glorioso Islands", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Holy See (Vatican City)", "Honduras", "Hong Kong", "Howland Island", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Ireland, Northern", "Israel", "Italy", "Jamaica", "Jan Mayen", "Japan", "Jarvis Island", "Jersey", "Johnston Atoll", "Jordan", "Juan de Nova Island", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Man, Isle of", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Midway Islands", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcaim Islands", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romainia", "Russia", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Scotland", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and South Sandwich Islands", "Spain", "Spratly Islands", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Tobago", "Toga", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "USA", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands", "Wales", "Wallis and Futuna", "West Bank", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
				
				

				?>   
				
				<select id="country" name="country"/>
					<option value="">Select Country</option>
				
					<?php foreach($countries as $country){
					?>
					<option value="<?php echo $country; ?>" <?php if(isset($updated_values['user_country'][0]) !=''){
					if($updated_values['user_country'][0]==$country) {
					echo "selected";
					} }?> ><?php echo $country; ?></option>
					<?php
					
					}
					 ?>
				</select>
				
				<label>State</label>
				<select id="state" name="state" disabled="disabled"/>
					<option value="">Select State</option>
					<?php if(isset($updated_values['user_state'][0]) !=''){?>
					<option value="<?php echo $updated_values['user_state'][0];?>" selected="selected" ><?php echo $updated_values['user_state'][0];?></option>
						<?php } ?>
				</select>
			<!--added new end-->	
				
				
                <label>City</label>
				<input id="city_update" type="text" name="city_update" placeholder="Your City" value="<?php if(isset($updated_values['user_city'][0]) !=''){echo $updated_values['user_city'][0];} ?>"/>
				<label>Zip Code</label>
				<input id="zip_update" type="text" name="zip_update" placeholder="Zip Code" value="<?php if(isset($updated_values['user_zip'][0]) !=''){echo $updated_values['user_zip'][0];} ?>"/>
				
				<h3 style="color:<?php echo get_option('general_bg'); ?>;">User Information</h3>
				<label>Email</label>
				<input id="email_update" type="email" name="email_update" placeholder="Email" value="<?php echo $user_mailId; ?>"/>
				<label>Email Confirmation</label>
				<input id="email_conf_update" type="email" name="email_conf_update" placeholder="Email Confirmation" value="<?php echo $user_mailId; ?>"/>
				
				<label>Password</label>
				<input id="password_update" type="password" name="password_update" placeholder="Password" value=""/>
				<label>Repeat Password</label>
				<input id="repeat_password_update" type="password" name="repeat_password_update" placeholder="Repeat Password" value=""/>
				
				<h3 style="color:<?php echo get_option('general_bg'); ?>;">Payment Information</h3>
				<label>Payment Mode</label>
				<select name="payment_head" id="payment_head" class="" >
					<option value="">Select Payment</option>
					<option id="Paypal" value="Paypal" <?php if(isset($updated_values['user_paypal_check_radio'][0]) =='Paypal'){echo "selected";} ?>>Paypal</option>
					<option id="Check" value="Check" <?php if(isset($updated_values['user_paypal_check_radio'][0]) =='Check'){echo "selected";} ?>>Check</option>
				</select>	
				<div id="paypal_show" class="paypal_details" >
						<label>Paypal ID</label>
						<input id="paypal_id_update" type="text" name="paypal_id_update" placeholder="Paypal ID" value="<?php if(isset($updated_values['user_paypal'][0]) !=''){echo $updated_values['user_paypal'][0];} ?>"/>
				</div>
				<input id="edit_button" type="button" name="edit_button" value="Update">	
		</form>
		<span class="notification"></span>
		</div>
		<?php } else { ?>
		<p>Please <a href="<?php echo get_option('home'); ?>/login/" >Login</a> To View Store Page</p>
		<?php } ?>
	</div>
	

</div>

<?php get_footer(); ?>