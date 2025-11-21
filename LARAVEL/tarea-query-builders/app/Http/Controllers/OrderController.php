<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * 1. POST - Inserta registros en las tablas de usuarios y pedidos
     */
    public function insertSampleData()
    {
        try {
            DB::beginTransaction();

            // Primero limpiar tablas si existen datos (en orden correcto por foreign keys)
            DB::table('orders')->delete();
            DB::table('users')->delete();

            // Insertar usuarios y obtener sus IDs reales
            $users = [
                ['name' => 'Roberto García', 'email' => 'roberto@email.com', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Rosa Martínez', 'email' => 'rosa@email.com', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Carlos López', 'email' => 'carlos@email.com', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Rafael Sánchez', 'email' => 'rafael@email.com', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'María Rodríguez', 'email' => 'maria@email.com', 'created_at' => now(), 'updated_at' => now()],
            ];

            DB::table('users')->insert($users);

            // Obtener los IDs reales de los usuarios recién insertados
            $insertedUsers = DB::table('users')->get();
            
            // Mapear nombres a IDs reales
            $userIds = [];
            foreach ($insertedUsers as $user) {
                $userIds[$user->name] = $user->id;
            }

            // Insertar pedidos usando los IDs reales
            $orders = [
                ['user_id' => $userIds['Roberto García'], 'product' => 'Laptop', 'quantity' => 1, 'total' => 1200.00, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $userIds['Roberto García'], 'product' => 'Mouse', 'quantity' => 2, 'total' => 50.00, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $userIds['Rosa Martínez'], 'product' => 'Tablet', 'quantity' => 1, 'total' => 300.00, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $userIds['Rosa Martínez'], 'product' => 'Teclado', 'quantity' => 1, 'total' => 150.00, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $userIds['Carlos López'], 'product' => 'Monitor', 'quantity' => 1, 'total' => 200.00, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $userIds['Rafael Sánchez'], 'product' => 'Smartphone', 'quantity' => 1, 'total' => 800.00, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $userIds['María Rodríguez'], 'product' => 'Auriculares', 'quantity' => 3, 'total' => 75.00, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $userIds['María Rodríguez'], 'product' => 'Cargador', 'quantity' => 2, 'total' => 40.00, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $userIds['Rosa Martínez'], 'product' => 'Impresora', 'quantity' => 1, 'total' => 180.00, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $userIds['Carlos López'], 'product' => 'Webcam', 'quantity' => 1, 'total' => 90.00, 'created_at' => now(), 'updated_at' => now()],
            ];

            DB::table('orders')->insert($orders);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Datos de muestra insertados correctamente',
                'data' => [
                    'users_count' => count($users),
                    'orders_count' => count($orders),
                    'user_ids_mapping' => $userIds // Para debugging
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al insertar datos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * 2. GET - Recupera todos los pedidos asociados al usuario
     */
    public function getUserOrders($userId = null)
    {
        // Si no se proporciona userId, usar 2 por defecto
        $userId = $userId ?? 2;
        
        $orders = DB::table('orders')->where('user_id', $userId)->get();
        
        return response()->json([
            'success' => true,
            'user_id' => $userId,
            'total_orders' => $orders->count(),
            'data' => $orders
        ]);
    }

    /**
     * 3. GET - Obtén la información detallada de los pedidos con usuarios
     */
    public function getOrdersWithUserInfo()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name', 'users.email')
            ->get();

        return response()->json([
            'success' => true,
            'total_orders' => $orders->count(),
            'data' => $orders
        ]);
    }

    /**
     * 4. GET - Pedidos cuyo total esté en el rango de $100 a $250
     */
    public function getOrdersInRange()
    {
        $orders = DB::table('orders')
            ->whereBetween('total', [100, 250])
            ->get();
        
        return response()->json([
            'success' => true,
            'range' => '100-250',
            'total_orders' => $orders->count(),
            'data' => $orders
        ]);
    }

    /**
     * 5. GET - Usuarios cuyos nombres comiencen con la letra "R"
     */
    public function getUsersStartingWithR()
    {
        $users = DB::table('users')
            ->where('name', 'LIKE', 'R%')
            ->get();
        
        return response()->json([
            'success' => true,
            'total_users' => $users->count(),
            'data' => $users
        ]);
    }

    /**
     * 6. GET - Total de registros en pedidos para usuario
     */
    public function getOrderCountForUser($userId = null)
    {
        $userId = $userId ?? 5;
        
        $count = DB::table('orders')
            ->where('user_id', $userId)
            ->count();
        
        return response()->json([
            'success' => true,
            'user_id' => $userId, 
            'order_count' => $count
        ]);
    }

    /**
     * 7. GET - Pedidos con usuarios ordenados por total descendente
     */
    public function getOrdersWithUsersOrderedByTotal()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name', 'users.email')
            ->orderBy('orders.total', 'desc')
            ->get();
            
        return response()->json([
            'success' => true,
            'total_orders' => $orders->count(),
            'data' => $orders
        ]);
    }

    /**
     * 8. GET - Suma total del campo "total" en pedidos
     */
    public function getTotalSum()
    {
        $totalSum = DB::table('orders')->sum('total');
        
        return response()->json([
            'success' => true,
            'total_sum' => $totalSum
        ]);
    }

    /**
     * 9. GET - Pedido más económico con nombre del usuario
     */
    public function getCheapestOrder()
    {
        $cheapestOrder = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name')
            ->orderBy('orders.total', 'asc')
            ->first();
            
        return response()->json([
            'success' => true,
            'data' => $cheapestOrder
        ]);
    }

    /**
     * 10. GET - Producto, cantidad y total agrupados por usuario
     */
    public function getOrdersGroupedByUser()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('users.name', 'orders.product', 'orders.quantity', 'orders.total')
            ->get()
            ->groupBy('name');
            
        return response()->json([
            'success' => true,
            'total_users' => $orders->count(),
            'data' => $orders
        ]);
    }

    /**
     * 11. GET - Ejecutar todas las consultas
     */
    public function runAllQueries()
    {
        $results = [];

        // 2. Pedidos del usuario con ID 2
        $userForTesting = DB::table('users')->where('name', 'Rosa Martínez')->first();
        $results['user_orders'] = DB::table('orders')->where('user_id', $userForTesting->id)->get();

        // 3. Pedidos con información de usuarios
        $results['orders_with_users'] = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name', 'users.email')
            ->get();

        // 4. Pedidos en rango $100-$250
        $results['orders_in_range'] = DB::table('orders')
            ->whereBetween('total', [100, 250])
            ->get();

        // 5. Usuarios que empiezan con "R"
        $results['users_starting_with_r'] = DB::table('users')
            ->where('name', 'LIKE', 'R%')
            ->get();

        // 6. Conteo de pedidos para usuario
        $userForCount = DB::table('users')->where('name', 'María Rodríguez')->first();
        $results['order_count_user'] = DB::table('orders')
            ->where('user_id', $userForCount->id)
            ->count();

        // 7. Pedidos con usuarios ordenados por total
        $results['orders_ordered_by_total'] = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name', 'users.email')
            ->orderBy('orders.total', 'desc')
            ->get();

        // 8. Suma total de pedidos
        $results['total_sum'] = DB::table('orders')->sum('total');

        // 9. Pedido más económico
        $results['cheapest_order'] = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name')
            ->orderBy('orders.total', 'asc')
            ->first();

        // 10. Pedidos agrupados por usuario
        $results['orders_grouped_by_user'] = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('users.name', 'orders.product', 'orders.quantity', 'orders.total')
            ->get()
            ->groupBy('name');

        return response()->json([
            'success' => true,
            'message' => 'Todas las consultas ejecutadas correctamente',
            'data' => $results
        ]);
    }
}