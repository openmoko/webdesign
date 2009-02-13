
<?php

    // require file that contains functions
    require 'functions.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico" />

<!--[if lte IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if IE 7]>
<link href="css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]--> 

<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<link href="js/facebox/facebox.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/facebox/facebox.js"></script>
<style type="text/css">
    #facebox .popup .body {
        border: 10px solid #000000;
        width: 480px;
        height: 730px;
    }
    
    #facebox {
        top: 20px !important;
    }
	.popup a.close {
		display:block !important;
		height:18px;
		width:64px;
		position: relative;
		top: 40px;
		right: 20px;
		clear: left;
		float: right;
	}
</style>
<title>openmoko.com | Products</title>
</head>

<body>

	<div id="wrapper">
    
    	<div id="header">
            <div id="logo">
            	<a href="index.html"><span class="hide">openmoko</span></a>
            </div><!-- end #logo -->
            
        	<div id="navigation">
            	<ul>
                    <li class="selected"><a href="product.html"><span>Products</span></a> / 
                    <a href="product.html">Neo FreeRunner</a> / 
                    <a href="#">Flickr</a></li>
                    <li><a href="download.html"><span>Download</span></a></li>
                    <li><a href="opportunities.html"><span>Opportunities</span></a></li>
                    <li><a href="distributors.html"><span>Store</span></a></li>
                </ul>
            </div><!-- end #navigation -->
            
            <div class="clear"></div>
                        
        </div><!-- end #header -->
        
        <div id="container">
        
        
        
        	<div class="featured-product">
            
            	<div class="featured-image"> 
                </div><!-- end .featured-image -->   
                
                <div class="featured-txt">
                	<h2>Unleash Yourself</h2>
                  <p>Introducing the Neo FreeRunner</p>
                  
                   <ul>
                    	<li>Free and Open Source Code</li>
                        <li>Free and Open Wifi</li>
                        <li>Unleash Your Creativity</li>
                    </ul>

              </div><!-- end .featured-txt --> 
                
                <div class="featured-button">
                <a href="http://us.direct.openmoko.com/products/neo-freerunner">Buy it now</a>
                </div><!-- end .featured-button -->
                
            </div><!-- end .featured-product -->
            
            
            
            <div class="product-footer">
            
                <ul class="sub-nav">
                    <li><a href="product.html">Technical Specifications</a></li>
                    <li><a href="product-include.html">What’s Included?</a></li>
                    <li><a href="product-dboard.html">DBoard</a></li>
                    <li class="selected"><a href="product-flickr.php">Flickr</a></li>
                    <li><a href="product-youtube.php">YouTube</a></li>
                    <li><a href="product-qa.html">Questions &amp; Answers</a></li>
                </ul><!-- end .sub-nav -->
            
            
            <div class="wrap">
            
                <h2 class="title">Top 45 Community Pictures Tagged: <i>"Openmoko + FreeRunner"</i></h2>
            
            	<div class="gallery">
					<?php disp_flickrthumbs(); ?>
                </div>
    
                    
                    <div class="clear">
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                    </div>
                
                </div><!-- end .wrap -->

            
            	
            	<div class="clear"></div>
                
            </div><!-- end .product-footer -->
            
        </div><!-- end #container -->
        
        <div id="footer">
        	<ul>
                <li><a href="about-index.html">About</a></li>
                <li><a href="press.html">Press</a></li>
                <li><a href="http://support.openmoko.com" target="_blank">SUPPORT</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            
            <div id="top"><a href="#logo">Top</a></div><!-- end #top -->
            
            <div class="clear"></div>
            
        </div><!-- end #footer -->    </div><!-- end .wrapper -->
    <div class="legal"><p>Copyright &#169; 2008 Openmoko Inc. | <a href="terms-use.html" target="_blank">Terms of Use</a> | <a href="privacy-policy.html" target="_blank">Privacy Policy</a> | </p></div><!-- end .legal -->
	
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('a[rel*=facebox]').facebox()
        })
    </script>
</body>
</html>


