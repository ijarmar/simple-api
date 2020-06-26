FROM composer

ARG SECRET
ARG OMDBAPIKEY

EXPOSE 8000

COPY . /app/backend
WORKDIR /app/backend

RUN composer install

ENV SECRET=$SECRET
ENV OMDBAPIKEY=$OMDBAPIKEY

CMD ["php", "-S", "0.0.0.0:8000", "router.php"]