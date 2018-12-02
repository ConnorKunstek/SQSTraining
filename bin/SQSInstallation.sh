#!/bin/sh

# Reset
Color_Off='\033[0m'       # Text Reset

# Colors
Red='\033[0;31m'          # Red
Green='\033[0;32m'        # Green
Purple='\033[0;35m'       # Purple
Blue='\033[0;34m'         # Blue

# Constraints
HOSTPATH="/var/http/www"  # Default Apache2 root folder
GITPATH=$(which git)    # Default git root folder

# Dependencies
APACHREQ="apache2 apache2-doc apache2-mpm-prefork apache2-utils libexpat1 ssl-cert" # Required Apache Installs
PHPREQ="php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml" # Required PHP Installs
MYSQLREQ="php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml" # Required MySQL Installs
VERIFYREQ="apache2 libapache2-mod-php7.2 php7.2 mysql-server php-pear php7.2-mysql mysql-client mysql-server php7.2-gd" # Verifies Installs are correctly installed

# Database Variables
DEMO="DEMO-V1.sql;"
VANILLA="VANILLA-V1.sql;"
SANDBOX="SANDBOX-V1.sql;"
## Function Setup

##
# Function setup_demo()
# Params:
# Choses populates demo database
##
setup_demo () {
  echo -e "$Green Starting Setup.. $Color_Off"
  echo -e "Please login to as admin user to MySQL"
  read -p 'Username: ' mysqluser
  read -sp 'Password: ' mysqlpw
  mysql --user="$mysqluser" --password="$mysqlpw" --execute="CREATE DATABASE sqs_web_demo;"
  mysql --user="$mysqluser" --password="$mysqlpw" --database="sqs_web_demo" --execute="use sqs_web_demo; source $DEMO"
  echo -e "$Green Done. $Color_Off"
}

##
# Function setup_vanilla()
# Params:
# Choses populates vanilla database
##
setup_vanilla () {
  echo -e "$Green Starting Setup.. $Color_Off"
  echo -e "Please login to as admin user to MySQL"
  read -p 'Username: ' mysqluser
  read -sp 'Password: ' mysqlpw
  mysql --user="$mysqluser" --password="$mysqlpw" --execute="CREATE DATABASE sqs_web_vanilla;"
  mysql --user="$mysqluser" --password="$mysqlpw" --database="sqs_web_vanilla" --execute="use sqs_web_vanilla; source $VANILLA;"
  echo -e "$Green Done. $Color_Off"
}

##
# Function setup_vanilla()
# Params:
# Choses populates sandbox database
##
setup_sandbox () {
  echo -e "$Green Starting Setup.. $Color_Off"
  echo -e "Please login to as admin user to MySQL"
  read -p 'Username: ' mysqluser
  read -sp 'Password: ' mysqlpw
  mysql --user="$mysqluser" --password="$mysqlpw" --execute="CREATE DATABASE sqs_web_sandbox;"
  mysql --user="$mysqluser" --password="$mysqlpw" --database="sqs_web_sandbox" --execute="use sqs_web_sandbox; source $SANDBOX"
  echo -e "$Green Done. $Color_Off"
}
##
# Function setup_db()
# Params: dbch
# Choses which database dump file to setup
##
setup_db () {
  echo 'Which of these? (Choose corresponding number)'
  read -p 'VANILLA(1) | SANDBOX(2) | DEMO(3): ' dbch
  if [ $dbch == "1" ]; then
    echo "Vanilla Chosen"
    setup_vanilla
  elif [ $dbch == "2" ]; then
    echo "Sandbox Chosen"
    setup_sandbox
  elif [ $dbch == "3" ]; then
    echo "Demo Chosen"
    setup_demo
  else
    echo "Invalid Choice"
  fi
}

##
# Function init_installdb()
# Params:
# Choses starts database setup
##
init_installdb () {
  ## Asks User if they want to set up the database
  read -p 'Would you like to setup a predefined database? - y/n: ' userch
  if [ $userch == "y" ]; then
    setup_db
  fi
}


echo -e "Choose Setup you would like\n1 - Full Install \n2 - Setup Database"
read -p 'Choice: ' installch
if [ $installch == "1" ]; then
  ## ----------------------------------------------------Start OF FULL INSTALL
  # Update packages and Upgrade system
  echo -e "$Green \n Updating System.. $Color_Off"
  sudo apt-get update -y && sudo apt-get upgrade -y

  ## Find System Changes
  echo -e "$Green \n Getting System Changes $Color_Off"
  sudo apt-get update -y
  ## Install System Changes
  echo -e "$Blue \n Installing System Changes $Color_Off"
  sudo apt-get upgrade -y
  # Checks if Git is Installed
  if [ "$GITPATH" == "/usr/bin/git" ]; then
    echo -e "$Purple Git Already Installed $Color_Off"
  else
    ## Installing git
    echo -e "$Blue \n Installing Git CLI Tool $Color_Off"
    sudo apt-get install git
  fi

  ## Install AMP
  echo -e "$Blue \n Installing Apache2 $Color_Off"
  # sudo apt-get install apache2 apache2-doc apache2-mpm-prefork apache2-utils libexpat1 ssl-cert -y
  sudo apt-get install $APACHEREQ -y

  ## Install PHP
  echo -e "$Blue \n Installing PHP & Requirements $Color_Off"
  # sudo apt-get install php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml -y
  sudo apt-get install $PHPREQ -y

  ## Install MySQL
  echo -e "$Blue \n Installing MySQL $Color_Off"
  # sudo apt-get install mysql-server mysql-client libmysqlclient-dev -y
  sudo apt-get install $MYSQLREQ -y

  ## Verifies core installs
  echo -e "$Purple \n Verifying installs$Color_Off"
  # sudo apt-get install apache2 libapache2-mod-php7.2 php7.2 mysql-server php-pear php7.2-mysql mysql-client mysql-server php7.2-gd -y
  sudo apt-get install $VERIFYREQ -y

  ## Checks if the path to Apache's root host exists to pull repo
  if [ -d "$HOSTPATH" ]; then
    echo -e "$Green Found $HOSTPATH $Color_Off"
    echo -e "$Green \n Cloning SQS Repository --> Branch --> Master $Color_Off"
    sudo git clone https://github.com/ConnorKunstek/SQSTraining.git $HOSTPATH
  else
    echo -e "$Red ERROR: $HOSTPATH NOT FOUND $Color_Off"
    echo -e "Please try to reinstall Apache"
  fi

  ## Sets Permissions
  echo -e "$Red \n Setting Permissions for /var/www $Color_Off"
  sudo chown -R www-data:www-data /var/www
  echo -e "$Green Permissions have been set $Color_Off"

  ## Restart Apache
  echo -e "$Red \n Restarting Apache $Color_Off"
  sudo service apache2 restart
  echo -e "$Green Apache Restarted $Color_Off"

  ## Setting up database
  init_installdb
  ## ----------------------------------------------------END OF FULL INSTALL
elif [ $installch == "2" ]; then
  setup_db
else
  echo "Invalid Choice. Please Run it again"
fi
