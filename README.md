# Facturación con Laravel y Docker

Este proyecto de Laravel utiliza Docker para facilitar la instalación y ejecución. Sigue estos pasos para poner en marcha la aplicación.

## Instalación

1. Clona el repositorio:

    git clone https://github.com/lukketty2kp/test33.git
    cd test33

Construye y levanta los contenedores Docker:

    docker-compose build
    docker-compose up -d

Esto iniciará los contenedores de PHP, MySQL y otros servicios necesarios.

Accede al contenedor de PHP y ejecuta composer install:


    docker-compose exec project-base_invoice-php bash
    composer install
    
Ejecuta las migraciones y los seeders desde dentro del contenedor:


    php artisan migrate --seed

Esto creará y llenará la base de datos con datos de ejemplo.

Ahora, puedes acceder a la factura utilizando Postman u otro cliente de API:

URL de la factura: http://localhost:8084/invoice
Asegúrate de ajustar la URL según el puerto en el que esté ejecutándose tu aplicación.

¡Listo! Ahora deberías tener la aplicación en ejecución y la factura generada en la URL proporcionada.