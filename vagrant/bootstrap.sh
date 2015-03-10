#!/bin/sh
apt-get update
apt-get install curl
apt-get install -y php5-cli php5-curl
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
cd /home/vagrant/dev-analyzer
composer install
cp app/parameters.php.dist app/parameters.php
cd /home/vagrant/dev-analyzer/web
nohup php -S 10.0.0.10:8000 > /dev/null 2>&1 &
