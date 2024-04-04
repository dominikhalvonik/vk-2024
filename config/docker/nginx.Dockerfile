FROM library/nginx:1.20.1

WORKDIR /var/www/html
COPY ../../../vk-2024/src ./
