#!/usr/bin/perl
#
# Openmoko distributor subscription cgi - (c) 2008 by OpenMoko, Inc.
# Author: Joachim Steiger <roh@openmoko.org>
#
# based upon
## OpenMoko order.cgi - (C) 2007 by OpenMoko, Inc.
## Author: Harald Welte <laforge@openmoko.org>
#
# Please don't take this code seriously, and please deprecate it soon.
#

use strict;

use CGI qw/:standard/;
use CGI::Carp 'fatalsToBrowser';
use HTML::Template;
use Net::SMTP;
use Locale::Country;

$CGI::POST_MAX = 10240;
$CGI::DISABLE_UPLOADS = 1;

my $q = new CGI;

my %params = $q->Vars();
my $tmpl;

$tmpl = HTML::Template->new(filename => 'distributor_signup_done.tmpl', die_on_bad_params => 0);

if (!defined $tmpl) {
	die "template error\n";
}


# put all query values into template variables
sub query_to_tmpl()
{
	for my $k (keys %params) {
		$tmpl->param($k => $params{$k});
	}
}

# send mail about order to RT
sub send_mail()
{
	my $from = "distributor\@openmoko.com";

	my @data;
	push(@data, "From: $from\n");
	push(@data, "To: distributor\@openmoko.com\n");
	push(@data, "Subject: OpenMoko Distributor signup request\n");
	push(@data, "User-Agent: OpenMoko distributor signup CGI v0.01\n");
	push(@data, "\n");

	push(@data, "Requestor: $params{'contact_email'}\n");
	push(@data, "CF.{distrib_co_name}: $params{'company_name'}\n");
	push(@data, "CF.{distrib_co_region}: $params{'company_regions'}\n");
	push(@data, "CF.{distrib_co_url}: $params{'company_url'}\n");
	push(@data, "CF.{distrib_co_descr}: $params{'company_description'}\n");
	push(@data, "CF.{distrib_addr}: $params{'shipping_address1'}\n");
	push(@data, "CF.{distrib_addr2}: $params{'shipping_address2'}\n");
	push(@data, "CF.{distrib_addr_zip}: $params{'shipping_zip'}\n");
	push(@data, "CF.{distrib_addr_city}: $params{'shipping_city'}\n");
	push(@data, "CF.{distrib_addr_state}: $params{'shipping_state'}\n");
	push(@data, "CF.{distrib_addr_country}: $params{'shipping_country'}\n");
	push(@data, "CF.{distrib_addr_phone}: $params{'shipping_phone'}\n");
	push(@data, "CF.{distrib_addr_fax}: $params{'shipping_fax'}\n");
	push(@data, "CF.{distrib_billaddr}: $params{'billing_address1'}\n");
	push(@data, "CF.{distrib_billaddr2}: $params{'billing_address2'}\n");
	push(@data, "CF.{distrib_billaddr_zip}: $params{'billing_zip'}\n");
	push(@data, "CF.{distrib_billaddr_city}: $params{'billing_city'}\n");
	push(@data, "CF.{distrib_billaddr_state}: $params{'billing_state'}\n");
	push(@data, "CF.{distrib_billaddr_country}: $params{'billing_country'}\n");
	push(@data, "CF.{distrib_billaddr_phone}: $params{'billing_phone'}\n");
	push(@data, "CF.{distrib_billaddr_fax}: $params{'billing_fax'}\n");
	push(@data, "CF.{distrib_contact_name}: $params{'contact_name'}\n");
	push(@data, "CF.{distrib_contact_email}: $params{'contact_email'}\n");
	push(@data, "CF.{distrib_contact_phone}: $params{'contact_phone'}\n");
	push(@data, "CF.{distrib_contact_fax}: $params{'contact_fax'}\n");
	push(@data, "\n");

	push(@data, "Corporate Information:\n");
	push(@data, "Company Name: $params{'company_name'}\n");
	push(@data, "Regions Served: $params{'company_regions'}\n");
	push(@data, "Website: $params{'company_url'}\n");
	push(@data, "Description: $params{'company_description'}\n");
	push(@data, "\n");
	
	push(@data, "Shipping Address:\n");
	push(@data, "Addr1: $params{'shipping_address1'}\n");
	push(@data, "Addr2: $params{'shipping_address2'}\n");
	push(@data, "ZIP: $params{'shipping_zip'}\n");
	push(@data, "City: $params{'shipping_city'}\n");
	push(@data, "State: $params{'shipping_state'}\n");
	my $shipping_country = code2country($params{'shipping_country'});
	push(@data, "Country: $shipping_country [$params{'shipping_country'}]\n");
	push(@data, "Phone: $params{'shipping_phone'}\n");
	push(@data, "Fax: $params{'shipping_fax'}\n");
	push(@data, "\n");

	if ($params{'billing_address1'} eq '') {
		push(@data, "Billing Address equals Shipping Address\n");
	} else {
		push(@data, "Billing Address:\n");
		push(@data, "Addr1: $params{'billing_address1'}\n");
		push(@data, "Addr2: $params{'billing_address2'}\n");
		push(@data, "ZIP: $params{'billing_zip'}\n");
		push(@data, "City: $params{'billing_city'}\n");
		push(@data, "State: $params{'billing_state'}\n");
		my $billing_country = code2country($params{'shipping_country'});
		push(@data, "Country: $billing_country [$params{'billing_country'}]\n");
		push(@data, "Phone: $params{'billing_phone'}\n");
	        push(@data, "Fax: $params{'billing_fax'}\n");
	}
	push(@data, "\n");

	push(@data, "Contact Information:\n");
	push(@data, "Name: $params{'contact_name'}\n");
	push(@data, "email: $params{'contact_email'}\n");
	push(@data, "Phone: $params{'contact_phone'}\n");
	push(@data, "Fax: $params{'contact_fax'}\n");
	push(@data, "\n");

	my $smtp = Net::SMTP->new(Host => 'localhost', Debug => 1);

	$smtp->mail($from);
	$smtp->to('distributor@openmoko.com');
	$smtp->data(\@data);
	$smtp->quit();
}


# start http header output
print $q->header();

#print Dump;

# check parameters for validity 

my @err = undef;

if ($params{'company_name'} eq '') {
	push(@err, 'Company name is mandatory');
}

if ($params{'company_regions'} eq '') {
        push(@err, 'Company regions is mandatory');
}

if ($params{'company_url'} eq '') {
        push(@err, 'Company url is mandatory');
}

if ($params{'company_description'} eq '') {
        push(@err, 'Company description is mandatory');
}

if ($params{'shipping_address1'} eq '') {
	push(@err, 'Shipping address is mandatory');
}

if ($params{'shipping_zip'} eq '') {
        push(@err, 'Shipping zip is mandatory');
}

if ($params{'shipping_city'} eq '') {
	push(@err, 'Shipping city/location is mandatory');
}

if ($params{'shipping_country'} eq '') {
	push(@err, 'Shipping country is mandatory');
}

if ($params{'shipping_phone'} eq '') {
	push(@err, 'Shipping phone is mandatory');
}

if ($params{'contact_name'} eq '') {
        push(@err, 'Contact name is mandatory');
}

if ($params{'contact_email'} eq '') {
        push(@err, 'Contact email is mandatory');
}

if ($params{'contact_phone'} eq '') {
        push(@err, 'Contact phone is mandatory');
}


if ($#err) {
	print $q->start_html(-title => 'OpenMoko Distributor signup form', -author => 'webmaster@openmoko.org');
	for my $e (@err) {
		print $q->h3($e);
		print $q->br();
		print "\n";
	}
	print $q->end_html();
	exit 0;
}

query_to_tmpl();

# send mail to RT
send_mail();


print $tmpl->output();

