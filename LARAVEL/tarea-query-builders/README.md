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
- GET `/api/orders-in-range` - Pedidos con total entre $100-$250
- GET `/api/users-starting-with-r` - Usuarios que empiezan con "R"
- `GET /api/order-count/{id}` - Conteo de pedidos por usuario (default: ID 5)
- `GET /api/orders-ordered-by-total` - Pedidos ordenados por total descendente
- `GET /api/total-sum` - Suma total de todos los pedidos
- `GET /api/cheapest-order` - Pedido más económico con nombre de usuario
- `GET /api/orders-grouped-by-user` - Pedidos agrupados por usuario
- `GET /api/run-all-queries` - Ejecutar todas las consultas juntas
## Tecnologías
- Laravel 10+
- MySQL
- Eloquent/Query Builder
