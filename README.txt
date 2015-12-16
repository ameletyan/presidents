
Regrettably, I could not make deploy my app because of an error from Heroku.  Hence, this
readme will be pretty lengthy.  I am really sorry that I could not make it easier.

1. I have only tested this app on a Ubuntu machine.  Hopefully, you have one available.  A
virtual machine running Ubuntu is also fine.

2. You will need to set up a basic LAMP stack.  To do so, run the following set of commands:

sudo apt-get update
sudo apt-get upgrade
sudo apt-get install apache2
sudo apt-get install php5
sudo apt-get install mysql-server
sudo apt-get install php5-mysql
sudo apt-get install php5-json
sudo apt-get install unzip
sudo apt-get install curl
sudo apt-get install openssl
sudo apt-get install php5-mcrypt
sudo php5enmod mcrypt
sudo apt-get install -y git-core
sudo a2enmod rewrite
sudo service apache2 restart

3. You will need to install composer.  To do so, run the following set of commands:

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

To see if composer installed successfully, run the following command:
composer

4. Now, you will need to import the presidents_db.sql file into your local MySQL user.  Use
a user that has all of the permissions available, like "root".  To import, go to the main
directory of 'presDB/' (directory that has presidents_db.sql) and run the following command:

mysql -u [username] -p presidents_db < presidents_db.sql

5. Before you can actually run the app on localhost, you will need to switch some variables
around in the code.  Open 'presDB/resources/views/layout.blade.php' and change the following:

NOTE: [username] is the MySQL user that you attached presidents_db to and [password] is that
	  user's password

LINE	|	OLD					|	NEW
--------|-----------------------|-------------------
 32		| $username = "artur";  | $username = "[username]";
 33		| $password = "1022";   | $password = "[password]";
 66		| $username = "artur";  | $username = "[username]";
 67		| $password = "1022";   | $password = "[password]";
 
 6. Finally, to run the app on localhost, go to 'presDB/' and run the following command:
 
 php artisan serve
 
 7. Open your favorite browser and go to "localhost:8000".  The app should be running on
 that page.
 
 I have put a semi-official report in the comments section of Moodle.  I plan to keep working on
 the app, but as of now I have done all I need with the database portion.  The rest of the work
 will be related to organization and style.