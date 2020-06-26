FROM composer

EXPOSE 8000

COPY . /app/backend
WORKDIR /app/backend

RUN composer install

CMD ["php", "-S", "0.0.0.0:8000", "router.php"]