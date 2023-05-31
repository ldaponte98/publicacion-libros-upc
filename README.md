<h2>Pasos para ejecutar el proyecto</h2>
<ul>
    <li>El script de la base de datos esta en la ubicacion /database/script y para esto se debe crear la base de datos en MYSQL y luego se importa este script</li>
    <li>Configurar el .env para q conecte bien la base de dato y un dato <b>IMPORTANTE</b>: En el .env se debe configurar en la variable [APP_URL] el dominio donde se despliegue el proyecto ejemplo si el proyecto es desplegado en https://www.google.com entonces este es valor que debe ir en esta variable</li>
    <li>Para descargar las dependencias es con composer update</li>
    <li>En caso de ejecutar en ambiente de desarrollo puede ejecutarse con php artisan serve</li>
</ul>
