#!/bin/bash


#php bin/console doctrine:database:drop --force
#php bin/console doctrine:database:create

php bin/console doctrine:schema:update --force


php bin/console cache:clear
php bin/console cache:clear -e prod

chmod -R 777 var