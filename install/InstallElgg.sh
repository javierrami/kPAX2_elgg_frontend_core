#!/bin/bash
#################################################
#
# Script to install and configure Elgg for Kpax.
#
#################################################

# Recomended total system update & upgrade
clear
echo “System Update”
apt-get update
read -rsp $'Press any key to continue...\n' -n1
clear
echo “System Upgrade”
apt-get upgrade
read -rsp $'Press any key to continue...\n' -n1

# Apache
clear
echo "Install Apache"
apt-get install apache2
read -rsp $'Press any key to continue...\n' -n1

# MySQL
clear
echo "Install MySQL"
apt-get install mysql-server
read -rsp $'Press any key to continue...\n' -n1

# PHP
clear
echo "Install PHP"
apt-get install php5 libapache2-mod-php5 php5-mysqlnd
read -rsp $'Press any key to continue...\n' -n1

# Phpmyadmin (future use)
# clear
# echo "Install phpmyadmin"
# apt-get install phpmyadmin
# read -rsp $'Press any key to continue...\n' -n1

# Configure Apache rewrite
clear
echo "Config Apache"
a2enmod rewrite
#  Config /etc/apache2/apache2.conf
#  'AllowOverride None' with 'AllowOverride All'
sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
service apache2 restart
read -rsp $'Press any key to continue...\n' -n1

# Secure MySQL Installation (future use)
# clear
# echo "Secure MySQL"
# mysql_secure_installation
# read -rsp $'Press any key to continue...\n' -n1

# Configure MySQL
clear
echo "Configure MySQL for elgg"
mysql -u root -p -e "CREATE DATABASE elggDB;CREATE USER elgguser IDENTIFIED BY 'elggpassword';GRANT ALL ON elgg.* TO elgguser"
service mysql restart
read -rsp $'Press any key to continue...\n' -n1

# Downloading Elgg and unzip
clear
echo "Downloading Elgg and unzip"
cd /var/www/
wget http://elgg.org/getelgg.php?forward=elgg-2.1.1.zip -O elgg.zip
unzip elgg.zip
read -rsp $'Press any key to continue...\n' -n1

# Move the folder to the web server document directory.
clear
echo "Configure web server"
mv elgg-2.1.1 /var/www/elgg 
read -rsp $'Press any key to continue...\n' -n1

# Setting data directory and writeable by the webserver (www-data = Apache user).
mkdir /var/elggdata
chown www-data:www-data /var/elggdata

# Move config files --> Elgg creates it on install step

# Copy .htaccess --> Confirm path
cp /var/www/elgg/vendor/elgg/elgg/install/config/htaccess.dist /var/www/.htaccess

# Configure settings.php
cp /var/www/elgg/vendor/elgg/elgg/elgg-config/settings.example.php /var/www/elgg/elgg-config/settings.php
cd /var/www/elgg/elgg-config
sed -i 's/{{dbuser}}/elgguser/g' settings.php
sed -i 's/{{dbpassword}}/elggpassword;/g' settings.php
sed -i 's/{{dbname}}/elggDB/g' settings.php
sed -i 's/{{dbhost}}/localhost/g' settings.php
sed -i 's/{{dbprefix}}/elggDB_/g' settings.php
read -rsp $'Press any key to continue...\n' -n1

# Install Elgg
clear
echo "Navigate to http://localhost/elgg/install.php to install"       
echo "Follow the installation wizard"
read -rsp $'Press any key to continue...\n' -n1 


