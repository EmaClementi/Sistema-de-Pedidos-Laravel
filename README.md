# SGP — Sistema de Gestión de Pedidos

Sistema web desarrollado con **Laravel 11** y **PHP 8.2+** para la gestión integral de pedidos, clientes y platos de un negocio gastronómico.

## Tecnologías

- **Backend:** Laravel 11 / PHP 8.2+
- **Frontend:** Bootstrap 5.3, Blade Templates
- **Base de datos:** MySQL
- **Internacionalización:** Middleware propio con sesiones (ES / EN)


## Funcionalidades

- Gestión de **Pedidos** — CRUD completo + actualización de estado
- Gestión de **Clientes** — CRUD completo
- Gestión de **Platos** — CRUD completo
- Gestión de **Detalle de Pedidos**
- Cambio de idioma **Español / Inglés** persistido en sesión
- Páginas informativas: Sobre Nosotros y Contacto
- Diseño responsive con Bootstrap 5

## Internacionalización

El proyecto usa un middleware propio (`LocaleMiddleware`) que lee el idioma de la sesión y lo aplica en cada request. El usuario puede cambiar el idioma desde cualquier página mediante un formulario `POST /locale`.

**Idiomas soportados:** `es` (Español) · `en` (Inglés)

**Cómo funciona:**
1. `LocaleMiddleware` lee `Session::get('locale')` en cada request y llama a `App::setLocale()`
2. `LocaleController` recibe el idioma seleccionado, lo valida y lo guarda en sesión
3. El middleware está registrado globalmente en el grupo `web`

## Instalación local

### Requisitos previos

- PHP 8.2+
- Composer
- MySQL
- Node.js y npm

### Pasos

**Clonar el repositorio**
git clone https://github.com/EmaClementi/Sistema-de-Pedidos-Laravel.git
cd sistema-de-pedidos-laravel

**Instalar dependencias PHP**
composer install

**Instalar dependencias**
npm install && npm run build

**Copiar y configurar el archivo de entorno**
cp .env.example .env
php artisan key:generate

**Configurar la base de datos en .env**
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_pedidos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password

**Ejecutar migraciones y seeders**
php artisan migrate:fresh --seed

**Iniciar el servidor**
php artisan serve

Accedé a [http://localhost:8000](http://localhost:8000)
---
## Migraciones y Seeders

El proyecto incluye migraciones para todas las tablas y seeders con datos de ejemplo.

**Crear tablas y cargar datos de ejemplo**
php artisan migrate:fresh --seed

**Solo migraciones sin datos**
php artisan migrate

**Solo seeders (tablas ya existentes)**
php artisan db:seed

---

## Rutas principales

| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/` | Home |
| POST | `/locale` | Cambiar idioma |
| GET/POST/PUT/DELETE | `/pedidos` | CRUD Pedidos |
| PATCH | `/pedidos/{id}/estado` | Actualizar estado de pedido |
| GET/POST/PUT/DELETE | `/clientes` | CRUD Clientes |
| GET/POST/PUT/DELETE | `/platos` | CRUD Platos |
| GET/POST/PUT/DELETE | `/detalle-pedido` | CRUD Detalle de Pedidos |
| GET | `/nosotros` | Página Sobre Nosotros |
| GET | `/contactos` | Página Contacto |

---

## Estructura del proyecto
````
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── PedidoController.php
│   │   │   ├── ClienteController.php
│   │   │   ├── PlatoController.php
│   │   │   ├── Detalle_pedidoController.php
│   │   │   └── LocaleController.php
│   │   └── Middleware/
│   │       └── LocaleMiddleware.php
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── layouts/
│       ├── components/
│       ├── pedidos/
│       ├── clientes/
│       └── platos/
├── routes/
│   └── web.php
└── public/
    ├── css/
    ├── img/
    └── js/


````
## Autores

Desarrollado por **Emanuel Clementi** y **Virginia Cifarelli** para las asiganturas POO y EDI3 de la Tecnicatura Superior en Analisis, Desarrollo y Programacion de Aplicaciones
