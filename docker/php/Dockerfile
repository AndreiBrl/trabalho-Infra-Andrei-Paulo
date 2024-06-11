  # Use a imagem oficial do PHP como base
    FROM php:8.3.4-fpm

    # Instale as dependências necessárias
    RUN apt-get update && apt-get install -y \
        default-mysql-client \
        && docker-php-ext-install pdo pdo_mysql

    # Defina o diretório de trabalho
    WORKDIR /var/www/html

    # Copie os arquivos do projeto para o diretório de trabalho
    COPY . .

    # Exponha a porta 9000
    EXPOSE 9000

    # Comando para iniciar o PHP-FPM
    CMD ["php-fpm"]