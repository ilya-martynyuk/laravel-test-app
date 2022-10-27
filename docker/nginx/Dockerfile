FROM nginx:1.15-alpine

RUN apk add --no-cache --virtual .build-deps \
    apache2-utils
COPY ./default.conf /etc/nginx/conf.d/default.conf