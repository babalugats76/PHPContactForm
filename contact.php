<!DOCTYPE html>
<html>
   <head>
      <title>Contact Form - James Colestock</title>
      <link rel="stylesheet" type="text/css" href="css/contact.css">
   </head>
   <body>
      <div id="content">
         <?php
            /* If the type of web request is POST (web forms normally are POSTs) */
            if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
              
                /* Used to debug what the form is posting */
                /* echo "Here are the values posted by the form:"         . "<br>";
                   echo "Name: "    . htmlspecialchars($_POST["name"])    . "<br>";
                   echo "Email: "   . htmlspecialchars($_POST["email"])   . "<br>";
                   echo "Message: " . htmlspecialchars($_POST["message"]) . "<br>"; */
              
                /* Email "headers" are used to define the type and contents of an email */
                $headers  = "From: WRHS Contact Form <noreply@wheatridgehighschool>\r\n";
                $headers .= "Reply-To: " . strip_tags($_POST["email"]) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html";
            
                /* Hard-code to email account you check */ 
                $to = 'james@colestock.com';
                $subject = 'Contact Request';
            
                /* Customize the body of the email here */
                $message = "<html><body>";
                $message .= "<h4>From: " . strip_tags($_POST["name"]) . "</h4>";
                $message .= "<h4>Message: " . $_POST["message"] . "</h4>";
                $message .= "</body></html>";
            
                /* Use PHP's mail function to send the email (the function takes four "arguments") */
                if (!mail($to, $subject, $message, $headers)) {
                    echo "<p class='error'>Sorry dawg, couldn't send that email...my bad...</p>";
                } else {
                    echo "<p class='success'>Thanks for contacting me!  I will get back with you shortly...</p>";
                }
                
            }   
         ?>
         
         <!-- Custom header image below --> 
         <img id="header" src="images/send-me-an-email-434x175.png"/>
         
         <!-- HTML contact form that POSTs to the current page -->
         <form id="contact" action="" enctype="application/x-www-form-urlencoded" method="post">
            <div class="form-row">
               <label for="name">Name:</label>
               <input id="name" name="name" type="text" required autofocus>
               </input>
            </div>
            <div class="form-row">
               <label for="email">Email:</label>
               <input id="email" name="email" type="email" required>
               </input>
            </div>
            <div class="form-row">
               <label for="message">Message:</label>
               <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="form-row">
               <input id="submit" name="submit" type="submit" value="Submit" />
            </div>
         </form>
      </div>
   </body>
</html>