# Usa PHP + Apache
FROM php:8.2-apache

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    libsqlite3-dev unzip git curl \
    zip unzip \
    && docker-php-ext-install pdo pdo_sqlite

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ativar mod_rewrite (Laravel precisa)
RUN a2enmod rewrite

# Mudar DocumentRoot para /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia o projeto
COPY . /var/www/html

# Instala dependências PHP do Laravel
RUN composer install --optimize-autoloader --no-dev

# Dá permissões corretas
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 775 storage bootstrap/cache

# Expõe porta 80 (Apache)
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]

