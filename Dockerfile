FROM php:7.4-apache

# Instala o driver PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Ativa o módulo rewrite do Apache (opcional)
RUN a2enmod rewrite

# Inicia o Apache
CMD ["apache2-foreground"]
