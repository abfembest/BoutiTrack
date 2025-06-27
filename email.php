<?php
			$to = "jobukabray@gmail.com";
            $subject = "Payment made for transaction";
            $body = "Hi test person, This is test email.

            			<a href= 'jobukng.com'>Kindly click here to visit us </a>";
            $header = "From: JOBUKNG.com";
 
            if ( mail($to, $subject, $body, $header)) {
              echo("Success");
           } else {
              echo("Failed");
           }

?>           