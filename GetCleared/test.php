<?php 

            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "support@getcleared.in";
            $to = "test-rp10eb17w@srv1.mail-tester.com";
            $subject = "GetCleared Account verification";
            $message = "<h2>Email verification - GetCleared</h2>
            <h4>Tap on the below link to verify your account</h4>
            <a href='https://getcleared.in/emailverification.php?'>Verify Account</a>
            <h5>For any support revert back to this mail</h5>
            <p>With Regards</p>
            <p>Kiran Maruthi Kuna</p>
            <p>Developer - GetCleared.in</p>";
            $headers = "From:" . $from."\r\n";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type: text/html;charset=UTF-8"."\r\n";
            if(mail($to,$subject,$message, $headers)) {
        		echo "Mail sent success";
            } else {
            	echo "Not sent";	
            }
?>