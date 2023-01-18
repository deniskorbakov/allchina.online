<?php
if (isset($_POST['appetizer_button'])) {
   	
setcookie ("user", "", time() - (10 * 365 * 24 * 60 * 60));
setcookie ("email", "", time() - (10 * 365 * 24 * 60 * 60));



header("Refresh:0; url=aut.php");
}
?>