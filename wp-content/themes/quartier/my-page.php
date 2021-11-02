<form method="POST" action="options.php">
<?php settings_fields( 'my-page' );	//pass slug name of page, also referred
                                        //to in Settings API as option group name
do_settings_sections( 'my-page' ); 	//pass slug name of page
submit_button();
?>
</form>