

<?php 
    $p = "admin";
    echo sha1(md5($p));
    echo "<br>";
//     echo md5(sha1($p));
    echo hash_hmac('sha256', $p, 'a');
?>
	
	
	
	
	