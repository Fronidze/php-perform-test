FROM nginx:alpine
WORKDIR /app

COPY .docker/nginx/cors.conf /etc/nginx/cors.conf
#COPY .docker/nginx/_nginx.conf /etc/nginx/_nginx.conf
COPY .docker/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf
COPY app/public /app/public