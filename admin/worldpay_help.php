
If you have installed a previous version of Worldpay 4.0, you must uninstall that version first.  To do this, go to the admin control, select payments and click the red button beside Worldpay.  Follow the instructions below to upgrade.

THE FOLLOWING INSTALLATIONS INSTRUCTIONS ARE FOR THE BASIC FUNCTIONALITY OF USING WORLDPAY 
- IF YOU WANT TO USE MD5 OR PRE-AUTH, YOU ARE OWN YOUR OWN!

1. Backup everything - That is Catalog, and database.
2. You do not need to do this edit as it is now hard coded
3. Go to the worldpay admin screen (www.worldpay.com/admin)
4. Enter the name and password given to you from Worldpay
5. In the WorldPay admin screen first enter the Callback URL as follows:

************************************************************************
IMPORTANT: CALLBACK URL MUST BE SET EXACTLY - INCLUDING CASE - to:

If you ARE using SSL for the checkout procedure 

  https://<wpdisplay item="MC_callback">

If you are NOT using SSL for the checkout procedure 

  http://<wpdisplay item="MC_callback">

NOTE: THIS IS DIFFERENT TO EARLIER RELEASES OF THIS CONTRIBUTION.

************************************************************************

6. Make these additional changes in the WorldPay Admin if not already set:

  Check Callback Enabled? - ie ensure that it is ticked.
  Check Use callback response? - ie ensure that it is ticked.

  Ensure Callback suspended is unchecked - this automatically selects if callback fails.

  Do not use callback passwords - it is not enabled!

6. Make sure you have Backed up your cart and data.

7. Extract the files in this archive to the relevant locations.  The location pathnames have
been saved in the archive.

Note that there are 2 Language files (one for the Payment Screens and one for the Callback), 
plus 2 other key program files.

8. Log onto your site, and go to the Admin section and activate Worldpay payment type, by 
clicking on the red button. Enter your Worldpay ID and the mode (100=test credit card is 
authorised, 101=test credit card is not authorised and 0=live)

9. Test using mode 100 or 101 first. If you use Pre-Authorisation, and wish to use it select
True, followed by E to pre-authorise all transactions.
