#!/bin/bash

echo '======================================'
echo '|'
echo '| Server PHP'
echo '|'
echo '| ©wonowicki 2016'
echo '======================================'
echo ''

echo '======================================'
echo '| Pre Configuration'
echo '======================================'

# Get rid of stdin not tty errors etc - see https://github.com/mitchellh/vagrant/issues/1673
sed -i 's/^mesg n$/tty -s \&\& mesg n/g' /root/.profile

# Set locale
locale-gen en_GB
locale-gen en_GB.utf8

# update apt-get
apt-get update

echo '======================================'
echo '| Installing Apache & PHP'
echo '======================================'

#install apache2, PHP and then MySQL
apt-get -y install apache2
apt-get -y install php5 php5-mysql # php5-mcrypt php5-xdebug

# Enable: ModRewrite, mcrypt
a2enmod rewrite
# php5enmod mcrypt

# Standard charset
sed -i 's/;default_charset = "UTF-8"/default_charset = "UTF-8"/g' /etc/php5/apache2/php.ini

# Conf PHP
PHP_LOG_FILE="/var/log/php.log"
touch "$PHP_LOG_FILE"
chmod 777 "$PHP_LOG_FILE"
sed -i -e s@";error_log = php_errors.log"@"error_log = $PHP_LOG_FILE"@g /etc/php5/apache2/php.ini
sed -i s/"error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT"/"error_reporting = E_ALL"/g /etc/php5/apache2/php.ini
sed -i s/"session.cookie_httponly ="/"session.cookie_httponly = On"/g /etc/php5/apache2/php.ini
sed -i s/";session.cookie_secure ="/"session.cookie_secure = On"/g /etc/php5/apache2/php.ini
sed -i s/"display_errors = Off"/"display_errors = On"/g /etc/php5/apache2/php.ini
unset PHP_LOG_FILE

# Make session directory writable
chmod -R 777 /var/lib/php5

# Link source public to public www
rm -R /var/www
ln -s /vagrant/ /var/www

# Configure default vhost
cat /vagrant/vhost > /etc/apache2/sites-available/000-default.conf

# Restart apache
service apache2 restart

echo '======================================'
echo '| Installing Composer'
echo '======================================'

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/bin/composer

echo '======================================'
echo '| Installing MySQL'
echo '======================================'

THE_PASSWORD="password"
DATABASE_NAME="develop"

echo "mysql-server-5.5 mysql-server/root_password password "$THE_PASSWORD | debconf-set-selections
echo "mysql-server-5.5 mysql-server/root_password_again password "$THE_PASSWORD | debconf-set-selections

apt-get -y install mysql-server

# remove limits on network adapter
sed -i 's/bind-address/#bind-address/' /etc/mysql/my.cnf

# replace key_buffer with key_buffer_size. key_buffer is deprecated (http://kb.parallels.com/en/120461)
sed -i 's/key_buffer\s/key_buffer_size/' /etc/mysql/my.cnf

# add standard config.
cp /vagrant/conf/local.cnf /etc/mysql/conf.d/

sed -i 's/innodb_buffer_pool_size/#innodb_buffer_pool_size/' /etc/mysql/conf.d/local.cnf

# create database

echo "CREATE DATABASE "$DATABASE_NAME | mysql -uroot -p$THE_PASSWORD

service mysql restart

echo "CREATE USER 'user'@'%' IDENTIFIED BY 'pass';" | mysql -uroot -p$THE_PASSWORD
echo "GRANT ALL PRIVILEGES ON "$DATABASE_NAME".* TO 'user'@'%' WITH GRANT OPTION;" | mysql -uroot -p$THE_PASSWORD

# flush privilages
echo "FLUSH PRIVILEGES;" | mysql -uroot -p$THE_PASSWORD

unset THE_PASSWORD
unset DATABASE_NAME

echo '======================================'
echo '| Installing Misc Tools'
echo '======================================'

apt-get -y install nano htop multitail

cd /vagrant
