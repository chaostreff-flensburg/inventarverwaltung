##################################################
# SETUP: PHP Dev Image
##################################################
FROM sourceboat/docker-laravel:0.14.0 as dev

COPY --chown=www-data docker/app/modules/ /home/app/modules/
RUN chmod -R +x /home/app/modules

RUN composer selfupdate
RUN apk update && apk add npm

COPY docker/app/entrypoint.sh /root/
RUN chmod +x /root/entrypoint.sh


##################################################
# SETUP: PHP Prod Image
##################################################
FROM dev as intermediary

RUN rm -Rf /opt/app/vendor
RUN composer install --no-dev --no-interaction --no-progress

RUN npm install
RUN npm run prod

##################################################
# SETUP: PHP Prod Image
##################################################
FROM sourceboat/docker-laravel:0.14.0 as prod

COPY ./ ./

COPY --from=intermediary /opt/app/vendor/ ./vendor/
COPY --from=intermediary /opt/app/public/js/ ./public/js/
COPY --from=intermediary /opt/app/public/css/ ./public/css/
COPY --from=intermediary /opt/app/public/favicon.* ./public/
COPY --from=intermediary /opt/app/public/mix-manifest.json ./public/

RUN touch /app/storage/logs/laravel.log && \
    touch /app/storage/logs/worker.log && \
    chown www-data:www-data -R /app/storage && \
    chown www-data:www-data -R /app/bootstrap/cache
