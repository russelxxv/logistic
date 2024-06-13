#!/bin/sh

cd /var/www/app-source
role=${CONTAINER_ROLE:-app}

# Creating env file if not exists
if [ ! -f '.env' ]; then
    echo "ENV File is not exists"
fi

echo "role: $role"

echo "Done"
exec docker-php-entrypoint "$@"