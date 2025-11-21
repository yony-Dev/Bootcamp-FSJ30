# Tarea Query Builders - Laravel

## Descripción
Implementación de consultas SQL en Laravel usando Query Builder para gestionar usuarios y pedidos.

## Instalación
1. `composer install`
2. Configurar .env con base de datos
3. `php artisan migrate`
4. `php artisan serve`

## Endpoints
- POST `/api/insert-data` - Insertar datos de prueba
- GET `/api/user-orders/{id}` - Pedidos por usuario
- GET `/api/orders-with-users` - Pedidos con info de usuarios
- ... [listar todas las rutas]

## Tecnologías
- Laravel 10+
- MySQL
- Eloquent/Query Builder
