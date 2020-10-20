#!/usr/bin/env bash

echo "User ID: ${USER_ID:-0}, Group ID: ${GROUP_ID:-0}"

if [ ${USER_ID:-0} -ne 0 ] && [ ${GROUP_ID:-0} -ne 0 ]; then
  deluser www-data
  if getent group www-data ; then delgroup www-data; fi
  addgroup -S -g ${GROUP_ID:-0} www-data
  adduser -S -u ${USER_ID:-0} www-data
  install -d -m 0755 -o www-data -g www-data /home/www-data
fi
