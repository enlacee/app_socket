<?
	$emailAddressFromCMS = "sean@seandempsey.com, iceman101184@gmail.com";

	//if (strstr($emailAddressFromCMS, ',')){
		$emailArray = explode(",", $emailAddressFromCMS);

		foreach ($emailArray as $index => $email){
			echo $email . "<br />\n";
		}
	//}
	print_r($emailArray);
?>
