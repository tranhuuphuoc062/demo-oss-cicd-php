# Sử dụng Image PHP kèm Apache (Phiên bản 8.0 cho ổn định)
FROM php:8.0-apache

# Cài đặt extension mysqli để kết nối Database (Mặc định Docker PHP chưa có)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy toàn bộ code của bạn vào thư mục web của Apache trong container
COPY . /var/www/html/

# Mở cổng 80 để truy cập web
EXPOSE 80