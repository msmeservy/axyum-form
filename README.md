 
# Axyum Contact Form
## A contact form plugin for WordPress

This plugin can be installed in wordPress and will do the following:

* it will allow you to add a form to any page in WordPress
* The form will allow a user to submit the form through the website with the following information, Name, Email, Phone, Message
* The form is submitted through an Ajax call.
* The form will be email to the administrative email address in the WordPress setting
* I added a hidden honeypot field to prevent spam, so far it's worked pretty well.

## Installation
1. download the zip file
2. extract the folder
3. open the exctracted folder and rename the folder to axyum-form
4. zip the renamed folder back up and this will be the plugin zip file you will install
5. install the plugin through the WordPress Dashboard as normal.
6. on the page where you want the form add the short code "[axyum_form]  (in the brackets it's axyum_form )"

** Note **
In order for this plugin to work you will need to have an SMTP plugin setup as well.  I have had success with WP Mail SMTP https://wpmailsmtp.com/ .  
There is a free version that works fine.  You will need an email to run the SMTP through.  The plugin shows you how to set that up. 
