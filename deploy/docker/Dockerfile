FROM nginx:1.17.1-alpine

## Remove default Nginx website
RUN rm -rf /usr/share/nginx/html/*

COPY ./deploy/docker/nginx.conf /etc/nginx/nginx.conf

COPY www/ /usr/share/nginx/html

EXPOSE 80

