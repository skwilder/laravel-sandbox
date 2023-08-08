#!/bin/sh

service apache2 start

# setting up permissions
chown -R elentra:www-data /var/www/sites/laravel-sandbox.com

/bin/bash
