
<h1 align="center">BUSIFY</h1>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Busify

Busify es un proyecto de Laravel que se enfoca en la venta de boletos de viaje online. Proporciona funcionalidades para mostrar y crear viajes, duración de viajes, servicios, sucursales y rutas.


### Instalacion


### Clonar el Repositorio de git

```bash
git clone https://github.com/Jack-Christopher/Busify.git
```

### Moverse al directorio del proyecto

```bash
cd Busify
```

### Descargar Dependencias del Proyecto

Como las dependencias del proyecto las maneja **composer** debemos ejecutar el comando:

```bash
composer install
npm install
```

### Configurar Entorno

La configuración del entorno se hace en el archivo **.env** pero esé archivo no se puede versionar según las restricciones del archivo **.gitignore**, igualmente en el proyecto hay un archivo de ejemplo  **.env.example** debemos copiarlo con el siguiente comando:

```bash
cp .env.example .env
```

Luego es necesario modificar los valores de las variables de entorno para adecuar la configuración a nuestro entorno de desarrollo, por ejemplo los parámetros de conexión a la base de datos.

### Generar Clave de Seguridad de la Aplicación

```bash
php artisan key:generate
```

### Migrar la Base de Datos

el proyecto ya tiene los modelos, migraciones y seeders generados. Entonces lo único que nos hace falta es ejecutar la migración y ejecutar el siguiente comando:

```bash
php artisan migrate:fresh --seed
```

- **migrate:fresh** ejecuta la migración **eliminando** todas las tablas y volviendo a generarlas.
- **--seed** ejecuta los Seeders habilitados

## Características

- Renderizado de un calendario para visualizar los viajes disponibles.
- Funciones para mostrar y crear viajes.
- Controlador, modelo, migración y página relacionados con los viajes.
- Relación y funciones para el modelo "UbigeoZone".
- Relaciones y funciones para el modelo "Ruta".
- Controlador, modelo y página para la duración de los viajes.
- Rutas para los viajes y la duración de los viajes.
- Opciones para los viajes y la duración de los viajes.
- Función para obtener el nombre de "Ubigeo".
- Redireccionamiento para registrar los datos de duración del viaje desde la zona.
- Funciones para mostrar y crear servicios.
- Página para mostrar un servicio específico.
- Página para crear un servicio específico.
- Página para mostrar una sucursal específica.
- Página para crear una sucursal específica.
- Menú lateral con rutas.
- Controlador, modelo, migración y página relacionados con las sucursales.
- Cambios menores.

## Uso

Una vez que hayas configurado e iniciado el proyecto, puedes acceder a él en tu navegador web. Asegúrate de que el servidor de desarrollo esté en ejecución.

El proyecto Busify te permitirá realizar las siguientes acciones:

- Ver y reservar boletos de viaje disponibles.
- Explorar los servicios y sucursales disponibles.
- Crear nuevos viajes, duración de viajes, servicios y sucursales según sea necesario.

## Contribución

Si deseas contribuir al proyecto Busify, sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama para tu contribución.
3. Realiza tus cambios y mejoras en la nueva rama.
4. Asegúrate de que tus cambios sean claros y estén bien documentados.
5. Envía una pull request para revisar tus cambios.

## Licencia

El marco de Laravel es un software de código abierto con licencia bajo la [MIT license](https://opensource.org/licenses/MIT).

