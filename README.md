# Sistema de Administración Residencial (Residence Link)

Este proyecto es un sistema de administración estándar que permite gestionar zonas, propiedades y usuarios (administradores). Incluye funcionalidades para un dashboard administrativo y cuenta con soporte para autenticación y autorización mediante roles.

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

- **PHP** 8.1 o superior
- **Composer**
- **MySQL**
- **Node.js y NPM** (opcional, si necesitas compilar assets)
- **Git** (para clonar el repositorio)

## Instalación

### Clonar el repositorio

Clona el repositorio en tu máquina local:
```bash
git clone https://github.com/rodrilavez/residence-link
cd residence-link
```

### Instalar dependencias

Usa Composer para instalar las dependencias del proyecto:
```bash
composer install
```

### Configurar variables de entorno

Crea el archivo `.env` desde el ejemplo proporcionado:
```bash
cp .env.example .env
```

Luego, configura las siguientes variables en el archivo `.env`:

- `DB_CONNECTION=sqlite`

### Generar la clave de la aplicación

Genera una clave única para tu aplicación Laravel:
```bash
php artisan key:generate
```

### Migrar y poblar la base de datos

Ejecuta las migraciones y los seeders para configurar la base de datos con datos iniciales:
```bash
php artisan migrate --seed
```

Esto creará:

- **Usuarios**
- **Zonas**
- **Propiedades**

## Usuarios Generados por el Seeder

### Administrador

- **Email:** `admin@example.com`
- **Contraseña:** `password`

## Uso del Proyecto

### Iniciar el servidor

Inicia el servidor de desarrollo de Laravel:
```bash
php artisan serve
```

### Acceder a la aplicación

Abre tu navegador y ve a:
```text
http://127.0.0.1:8000
```

### Iniciar sesión

Usa las credenciales proporcionadas para el administrador para acceder al dashboard administrativo.

## Funcionalidades del Proyecto

### Gestión de Zonas

- Crear, editar, listar y eliminar zonas.

### Gestión de Propiedades

- Crear, editar, listar y eliminar propiedades vinculadas a zonas.

### Gestión de Usuarios

- Roles predefinidos: administrador. (Crea guardias y residentes).

## Despliegue en Producción

Para optimizar el proyecto para producción:

### Ejecución de optimizaciones
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Compilación de assets
```bash
npm run build
```

## Tecnologías Usadas

- **Backend:** Laravel 11
- **Frontend:** Blade, Livewire
- **Base de Datos:** MySQL
- **Autenticación:** Laravel Sanctum

