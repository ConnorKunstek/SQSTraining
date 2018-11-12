#!/bin/sh

#COLORS
# Reset
Color_Off='\033[0m'       # Text Reset

# Regular Colors
Red='\033[0;31m'          # Red
Green='\033[0;32m'        # Green
Purple='\033[0;35m'       # Purple
Cyan='\033[0;36m'         # Cyan
Blue='\033[0;34m'         # Blue

# # Update packages and Upgrade system
# echo -e "$Green \n Updating System.. $Color_Off"
# sudo apt-get update -y && sudo apt-get upgrade -y

## Find System Changes
echo -e "$Blue \n Getting System Changes $Color_Off"
sudo apt-get update -y
## Install System Changes
echo -e "$Blue \n Installing System Changes $Color_Off"
sudo apt-get upgrade -y
## Installing git
echo -e "$Blue \n Installing Git CLI Tool $Color_Off"
sudo apt-get install git
## Install AMP
echo -e "$Blue \n Installing Apache2 $Color_Off"
sudo apt-get install apache2 apache2-doc apache2-mpm-prefork apache2-utils libexpat1 ssl-cert -y
## Install PHP
echo -e "$Blue \n Installing PHP & Requirements $Color_Off"
sudo apt-get install php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml -y
## Install MySQL
echo -e "$Blue \n Installing MySQL $Color_Off"
sudo apt-get install mysql-server mysql-client libmysqlclient-dev -y
## Install PHPMyAdmin
echo -e "$Blue \n Installing phpMyAdmin $Color_Off"
sudo apt-get install phpmyadmin -y
## verifies core installs
echo -e "$Purple \n Verifying installs$Color_Off"
sudo apt-get install apache2 libapache2-mod-php7.2 php7.2 mysql-server php-pear php7.2-mysql mysql-client mysql-server php7.2-gd -y

# Permissions
echo -e "$Red \n Setting Permissions for /var/www $Color_Off"
sudo chown -R www-data:www-data /var/www
echo -e "$Green Permissions have been set $Color_Off"

# Restart Apache
echo -e "$Red \n Restarting Apache $Color_Off"
sudo service apache2 restart
echo -e "$Green Apache Restarted $Color_Off"


echo -e "$Green \n Cloning SQS Repository --> Branch --> Master $Color_Off"
cd ~/../../var/www/html
sudo git clone https://github.com/ConnorKunstek/SQSTraining.git
