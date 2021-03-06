<?php

$errorCode = 0;

$errors = [
	// 0: No error
	// site errors
	1 => 'Incorrect username or password.',
	2 => 'One or more required fields were not filled out.',
	3 => 'The provided email address is already in use.',
	4 => 'One or more fields contained invalid data.',
	5 => 'We need donor information from you before you can do that.',
	6 => 'We need donee information from you before you can do that.',
	7 => 'Supplied passwords do not match.',
	8 => 'Your input did not match the captcha.',
	9 => 'Incorrect password.',
	10 => 'The url is either invalid or you have already activated your account.',
	11 => 'Invalid action. Please use the link that has been sent to your email.',
	12 => 'No tax receipt was generated because no donations have been 
			recieved since the last time you requested a tax receipt.',
	13 => 'No new requests by donees have been made or the inventory has not changed
			since the last time a report was generated. Therefore no new report was created.',
	// generic HTML status codes
	401 => 'You must be logged in to an active account to access the specified resource.',
	403 => 'You are not currently permitted to access the specified resource.',
	404 => 'The specified resource was not found.',
	418 => 'Cannot brew coffee: I am a teapot.',
	419 => 'Cannot display webpage: I am a fox.',
	420 => 'Please wait a few minutes and try again.',
	498 => 'Token mismatch. Please go back and try again.',
	499 => 'Token not supplied. Please go back and try again.',
];

$messageCode = 0;

$messages = [
	// 0: no message
	1 => '', // generic success
	2 => 'Your information has been updated.',
	3 => 'You have successfully registered an account. Please use the email activation
			link that was just sent to your email to finish activating your account.',
	4 => 'You are now logged in.',
	5 => 'Your account has been activated, you can now login!',
	6 => 'Thank you for your donation. Your tax receipet document 
			has been sent to your registered email address.',
	7 => 'Password recovery instructions have been sent to your email address.',
	8 => 'You have successfully reset your password.',
	9 => 'Donation allocation report has been sent to your email.',
];

if (isset($_GET['err'])) {
	$err = htmlspecialchars($_GET['err']);

	if (array_key_exists($err, $errors)) {
		$msg = $errors[$err];
		$errorCode = $err;
	} else {
		$err = $err ? " ($err)" : '';
		$msg = "An undefined error$err has occured.";
	}
	?>
	<div class="alert alert-danger">
		<b>Error!</b> <?= $msg ?>
	</div>
	<?php
}

if (isset($_GET['msg'])) {
	$msg = htmlspecialchars($_GET['msg']);

	if (array_key_exists($msg, $messages)) {
		$txt = $messages[$msg];
		$messageCode = $msg;
	}
	// else: undefined message
	?>
	<div class = "alert alert-success">
		<b>Success!</b> <?= $txt ?>
	</div>
	<?php
}
