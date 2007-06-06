<?php
/*

  Copyright (c) 2005 Chainreactionworks.com

  Released under the GNU General Public License
  Original Auhtor:
  Updates by:
  
*/

?>
<tr>
 <td>
<p align="center"><b><span style="font-size:16pt;">Data Feed Input/Output Introduction</span></b></p>
<p>Data feed service is a collection of contributions to allow you to updated 
your products and categories data remotely, and send that data to data listing 
services. It used a number of contributions that have been modified to work 
with small, medium, and large stores. </p>
<p>Contributions:<br>Easy Populate Advance by Tom O'Neill<br>Easy Populate Basic<br>Froogle 
data feed : Calvin K<br> &nbsp;&nbsp;&nbsp;Salemaker for froogle feed: by<br> 
&nbsp;&nbsp;&nbsp;Admin for Froogle Data Feed : Tom O'Neill<br><br> Goals:<br>The 
typical store owner never needs to edit a code or define file directly.The store 
owner does not need a lot of support on how to use program.Combines the functions 
of moving data in and out of store is in one are.Make it flexible enough for 
small, medium and large store to use program effectively.Move program files closer 
to OSC/CRE Loaded standards for look and feel, and coding.<br><br>Parts of 
Data Feed Service:<br>&nbsp;Easy Populate: This is used to update data it allows 
you to updated data remotely on your&nbsp;local computer and upload to the data 
to your on line store. It allows you to&nbsp;&nbsp;build custom queries for 
the data then download the information to your local computer&nbsp;&nbsp;for 
editing, Then upload back to your &nbsp;on-line store.</p>
<p>&nbsp;Data feed:<br>&nbsp;&nbsp;Data feed takes the data with in your catalog 
and prepares it for submission to a feed &nbsp;service and send it to the feed 
service either automatically or manually if you need on completion&nbsp;of building 
the feed.<br>&nbsp;Features added and changes to basic programs.<br> &nbsp;&nbsp;&nbsp;Easy 
populate 2.75 Advance to 2.78:<br>&nbsp;1. Removed the froogle feed from this 
contribution. The froogle function is now &nbsp;handled by separate code files.<br>&nbsp;2. 
Moved EP from catalog side box to Data export/import side box.<br>&nbsp;3. Moved 
function file to admin/includes/function directory to follow OSC standards.<br>&nbsp;4. 
Moved most simple function to function file, export now has all functions removed 
. There is now only one function left in the EPA import file. <br>&nbsp;5. Revised 
admin screens so it was more like the rest of the catalog.<br>&nbsp;6. Inserted 
tep form function rather then html form function (In progress)<br>&nbsp;7. Added 
pop up help for information on how to use EPA.<br>&nbsp;8. Easy Populate Basic 
is for backward compatibility with older versions of EP<br>&nbsp;&nbsp;&nbsp;&nbsp;EP 
advance will import all EPA files of previous version of EPA. <br>&nbsp;9. Export 
screen and Import screen separated into two separate files<br>&nbsp;10. Side 
box changed, so that sub titles are offset.<br>&nbsp;11. Added date time to 
split so each group of splits will be unique and old splits will&nbsp;not be 
lost or over written. &nbsp;&nbsp;example EPA_Split1_2005Sep09-1010.txt.<br>&nbsp;12. 
Program message, error, and output were place in one of three variable so they 
could be output&nbsp:with in the html output section of the files.<br> &nbsp;&nbsp;<br>&nbsp;Items 
fixed or enhanced from EP 2.74 to 2.75 Advance:<br>&nbsp;1. To add products 
the product id should be set to 0, there can be many 0's for product ID's.<br>&nbsp;2. 
You no longer need to change the manufacturers table to change a manufacturers_id 
first&nbsp;manf id to 1 or 0<br>&nbsp;3. No longer adds a empty product, caused 
by not treating the last line as not product.<br>&nbsp;4. Added EP Basic, It 
cannot install any EP Advanced files since they start with EPA a error<br>&nbsp;&nbsp;&nbsp;&nbsp;message 
will be displayed. It can install any file that starts will EPB or older EP files<br>&nbsp;5. 
EP Advanced set up so it can only read files that start with EPA , prevents 
reading older files.<br>&nbsp;6. Delete has been added back into EP for products 
only. &nbsp;This is implemented via a new column call v_action. You must type 
the word &quot;delete&quot; in this column to delete a product.<br>&nbsp;7. 
EP basic was not showing on some site this was to an error in the install of 
the&nbsp;admin_files a new set of admin_files was added to the install.<br>&nbsp;8. 
You can add your own product ID, If your product ID's are based on a system 
other than&nbsp;numbers generated by the shopping cart and auto incremented by 
one. You still cannot&nbsp;&nbsp;use alpha character in product ID. This allows 
for compatibility with some external inventory management systems.<br>&nbsp;9. 
moved configuration of EP to a separate file called epconfigure.php <br><br>&nbsp;Data 
Feed:<br>&nbsp;1. Added language files<br>&nbsp;2. Multiple configurations for 
multiple feed services now available through admin screen<br>&nbsp;3. Configuration 
configured in admin rather then edit a file.<br>&nbsp;4. Feed submission now 
A multiple step process.<br>&nbsp;5. Switched to tep functions for data base 
queries.<br>&nbsp;6. Split file generation and FTP code into two separate files.<br>&nbsp;7. 
Combined Froogle, Yahoo and Bizrite into one package (Not all installed and 
adapted yet)<br>&nbsp;8. added fields for advance feed to products database<br>&nbsp;9. 
added separate sql file for additional info for froogle feed<br>&nbsp;10. Builds 
Category strings before building feed file.<br>&nbsp;11. Help popups added to 
admin screens.<br>&nbsp;12. Added salemaker contribution pricing to price sent 
to price in feed.<br>&nbsp;13. Uses tax zone from store. <br>&nbsp;14. Add the 
fields froogle_type, upc, isbn, manufacturer_product_id to products table and 
products edit screen.<br>&nbsp;15. add froogle specific fields for books, music, 
video to a separate table.<br><br>&nbsp;For EP set up:<br>&nbsp;For Data feeds 
set up:<br>Step 1 <br>&nbsp;To set up this modules data feed service, you must 
first register with the feed services you wish to use.&nbsp;This is described 
in the getting started document. It has links to the feed services &nbsp;and 
what you need to set up the configuration of each service.<br>Step 2<br>Next 
you need to install this contribution this is disturbed in the doc/install.txt 
files<br>Step 3<br>The you will need to configure and run the data feeds this 
is described in the running doc/configureandrun.txt document The file field_spec.txt 
describes the limitation of what can be placed into each field<br><br>&nbsp;Known 
bugs:<br>&nbsp;&nbsp;1. PHP 5 compatibility for import. the problem is either 
how globals are treated or&nbsp;&nbsp;how arrays are used in this contribution<br></p>
 </td>
</tr> 
<tr>
  <td>
 <b>Error and status messages</b>
  </td>
 </tr>
 <tr>
 <td>
  All messages except the result of an import will appear near the top of the for, Blue background 
  is for normal messages, red back ground for errors. <br>
  <img src="<?php echo DIR_WS_LANGUAGES . $language ;?>/help/ep/images/epa_msg.gif" border="0" >
  </td>
</tr>
<tr>
  <td>
 <b>Import result</b>
  </td>
 </tr>
 <tr>
 <td>
 The Import result will now appear below the admin screen<br>
  <img src="<?php echo DIR_WS_LANGUAGES . $language ;?>/help/ep/images/import_results.gif" border="0" >
  </td>
</tr>

<tr>
  <td>
 <b>Help while using the admin screens</b>
  </td>
 </tr>
 <tr>
 <td>
 You will notice a <img src="images/icon_info.gif" border="0" > through out the admin screens This
 is individual help for each setting or input you could use. It will display a pop up window with
 help.<br>
  <img src="<?php echo DIR_WS_LANGUAGES . $language ;?>/help/ep/images/item_help.gif" border="0" >
  </td>
</tr>
<tr>
 <td>
&nbsp; &nbsp; <a href="data.php?selected_box=data"> <img src="includes/languages/english/images/buttons/button_return.gif"></a>
  </td>
</tr>

