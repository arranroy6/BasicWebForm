<?php
$email_sent = false;

//if the used has clicked the submit button
if (isset($_POST['submit']))
{
  //checks if there is a firstname and email, and if they are not empty. then will submit the form
  if (isset($_POST['firstname'] && $_POST['firstname'] != '' && $_POST['email'] && $_POST['email'] != ''))
  {
    //if the email follows the usual email format eg. blank@blank.blank
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
      $firstname = $_POST['firstname'];
      $surname = $_POST['surname'];
      $mailFrom = $_POST['email'];
      $telephone = $_POST['telephone'];
      $address1 = $_POST['address1'];
      $address2 = $_POST['address2'];
      $city = $_POST['city'];
      $county = $_POST['county'];
      $postcode = $_POST['postcode'];
      $country = $_POST['country'];
      $description = $_POST['description'];
      $file = $_POST['file'];

      $mailTo = 'arranroy6@gmail.com';
      $subject = 'WebForm Email';
      $message = 'Email from: ' . $firstname . ' ' . $surname . ': ' . \n\n . $telephone . \n . $address1 . \n . $address2 . \n . $city . \n . $county . \n . $postcode . \n . $country . \n . $description . \n . $file;
      $headers = 'From: ' . $mailFrom;
      mail($mailTo, $subject, $message, $headers);

      $email_sent = true;
    }
  }

  if (!$email_sent)
  {
    echo <script>alert('Input is invalid. Please make sure your firstname and email address are correct. ')</script>
  }
}
?>