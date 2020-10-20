#!/usr/bin/env bash
echo "Running entrypoint script..."

cd /opt/app

# startup commands
php /usr/local/bin/startup-commands.php | bash

exec "$@"
