#!/usr/bin/perl

use strict;
use warnings;
use CGI;

# Create a CGI object
my $cgi = CGI->new;

# Get the URL to redirect to (change this URL accordingly)
my $redirect_url = "http://91.134.253.23:8091/bookstore/build/home.html";

# Print the necessary headers for redirection
print $cgi->redirect(-uri => $redirect_url, -status => 302);
