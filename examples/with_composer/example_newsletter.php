<?php
/*
 * This example shows, how to create a single newsletter and send it to all recipients in a given list.
 */
namespace NL2GO;

require_once '../../vendor/autoload.php';

//TODO
$authKey = "your auth key here";
$userEmail = "login email address";
$userPassword = "login password";


$api = new Newsletter2Go_REST_Api($authKey, $userEmail, $userPassword);
$api->setSSLVerification(false);

$lists = $api->getLists();
var_dump($lists);

//TODO
$currentListId = "put a list id here";

$html = "<html><body>Hello World</body></html>";

//create new  mailing
$result = $api->createNewsletter($currentListId, "default", "Name Test", "from@example.org", "Subject Test", $html, null); 

$newsletter_id = $result->value[0]->id; #maybe save this id to GET the reports later

$data = array(

	"list_selected" => true #select whole recipient list (addressbook)
	
);

//send newsletter to the whole list (addressbook)
$result = $api->sendNewsletter($newsletter_id, $data);
var_dump($result);


