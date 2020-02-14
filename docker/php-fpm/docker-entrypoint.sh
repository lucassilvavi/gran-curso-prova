#!/bin/bash where "NU_ANO" = :p0 and "ST_ATIVO" = :p1 and "TP_RECURS
set -e

echo "[ ****************** ] Starting Endpoint of Application [ ****************** ]"

echo "Back - Starting Endpoint of Application"
if ! [ -d "./vendor" ]; then
    echo '====== INSTALLING COMPOSER ======'
    composer install --ignore-platform-reqs  --no-interaction --verbose --no-suggest

    echo '======  SEEDING ======'
    composer cli questoes:seed

fi

exec "$@"

set -- php-fpm

exec "$@"
