# Dockerfile
FROM php:8.1-apache

# Cài extension PHP cần thiết
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Bật .htaccess nếu cần
RUN a2enmod rewrite

# Copy toàn bộ mã nguồn vào thư mục web của Apache
COPY . /var/www/html/

# Sửa quyền
RUN chown -R www-data:www-data /var/www/html
