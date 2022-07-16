
#! /bin/bash

if [ -f "config/config.php" ]
then
    echo "SERVER STARTS AT PORT 8000"
    cd public
    php -S localhost:8000
else

    echo "Create a new database and then press enter"
    curl -s https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
    composer install
    composer dump-autoload

    touch config/config.php

    $DB_HOST 
	$DB_PORT 
    $DB_PASSWORD
    $DB_USERNAME
    $DB_NAME

    echo 'Enter the given database config file'
	echo 'Enter DB_HOST:'
	read DB_HOST
	echo 'Enter DB_PORT:'
	read DB_PORT 
	echo 'Enter DB_NAME:'
	read DB_NAME 
	echo 'Enter DB_USERNAME:'
	read DB_USERNAME
	echo 'Enter DB_PASSWORD:'
	read DB_PASSWORD

	echo '<?php'>config/config.php
	echo '$DB_HOST= "'$DB_HOST'";'>>config/config.php
	echo '$DB_PORT= "'$DB_PORT'";'>>config/config.php
	echo '$DB_NAME= "'$DB_NAME'";'>>config/config.php
	echo '$DB_USERNAME= "'$DB_USERNAME'";'>>config/config.php
	echo '$DB_PASSWORD= "'$DB_PASSWORD'";'>>config/config.php
	echo '?>'>>config/config.php

	mysql -u $DB_USERNAME -p $DB_NAME<schema/schema.sql

    echo "Starting server at port 8000"
	cd public
	php -S localhost:8000
fi
