<?php
 	
 #see regions support http://help.mandrill.com/entries/21694286-How-do-I-add-dynamic-content-using-editable-regions-in-my-template-
 #the simple way way to use is to tag a span or a div and replace all content in the email
 
 	
 require_once 'Mandrill.php';
 $mandrill = new Mandrill($config['madrill_api']); //insert your API KEY
    
 $message = array('subject' => 'My subject', 'from_email' => 'info@test.com', 'to' => array( array('email' => 'info@wiseguystechnologies.com')));



#this is the email that is sent when someone is invited.
#send_name -> This is the persons name you are sending it too (mc:edit="send_name" - this is how email is tagged in mandrill)
#edit_url -> Is the URl the user should go to signup, then go to person profile ready to edit  
#           (mc:edit="edit_url" - this is how email is tagged in mandrill)
#view_url -> Just a URL they can view to see who it is  (mc:edit="view_url" - this is how email is tagged in mandrill)

$template_name = 'External Invite Email';
$template_content = array( array('name' => 'send_name', 'content' => 'Hi '.'big poppa' .' , thanks for signing up.'),
                           array('name' => 'edit_url', 'content' => "<a href='http://google.com' 'class='mcnButton' title='Help Build' target='_blank' style='font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;'>Help Build Blakes Profile</a>"),
                            array('name' => 'view_url', 'content' => "<a href='http://www.google.com' target='_blank'>View Profile</a>")
);

$response = $mandrill -> messages -> sendTemplate($template_name, $template_content, $message);//for sending email via mandrill




echo 'Script Complete';