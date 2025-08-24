# Stage 1: Build assets with Node
FROM node:18 AS frontend
WORKDIR /app

# Copy only files needed for npm install first (to leverage Docker caching)
COPY package*.json vite.config.js ./
RUN npm ci

# Copy the rest of the source code and build assets
COPY resources ./resources
RUN npm run build

# Stage 2: PHP + Nginx image
FROM richarvey/nginx-php-fpm:latest
WORKDIR /var/www/html

# Copy the entire Laravel app
COPY . .

# Copy the built Vite assets from stage 1
COPY --from=frontend /app/public/build ./public/build

# Image configs
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
