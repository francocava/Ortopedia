<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => '1',
            'nombre' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'id' => '2',
            'nombre' => 'Empleado',
        ]);

        DB::table('usuarios')->insert([
            'id' => '2',
            'nombre' => 'Gaston',
            'apellido' => 'Paella',
            'usuario' => 'gPaella',
            'password' => Hash::make('123456'),
            'rol_id' => '2'
        ]);

        DB::table('usuarios')->insert([
            'id' => '1',
            'nombre' => 'Claudia',
            'apellido' => 'Moyano',
            'usuario' => 'cMoyano',
            'password' => Hash::make('123456'),
            'rol_id' => '1'
        ]);


        DB::table('obras_sociales')->insert([
            'id' => '1',
            'nombre' => 'OSDE',
        ]);

        DB::table('obras_sociales')->insert([
            'id' => '2',
            'nombre' => 'Osecac',
        ]);

        DB::table('obras_sociales')->insert([
            'id' => '3',
            'nombre' => 'Pami',
        ]);


        DB::table('sucursales')->insert([
            'nombre' => 'Floresta',
        ]);

        DB::table('sucursales')->insert([
            'nombre' => 'Moron',
        ]);


        DB::table('proveedores')->insert([
            'id' => '1',
            'nombre' => 'Medicare',
        ]);

        DB::table('proveedores')->insert([
            'id' => '2',
            'nombre' => 'Health Bros.',
        ]);

        DB::table('formas_pagos')->insert([
            'id' => '1',
            'tipo' => 'Efectivo',
        ]);

        DB::table('formas_pagos')->insert([
            'id' => '2',
            'tipo' => 'Credito',
        ]);


        DB::table('productos')->insert([
            'id' => '1',
            'proveedor_id' => '1',
            'nombre' => 'Silla de ruedas',
            'precio' => '43000',
            'nro_articulo' => '13',
        ]);

        DB::table('productos')->insert([
            'id' => '2',
            'proveedor_id' => '2',
            'nombre' => 'Muletas',
            'precio' => '20000',
            //'nroArticulo' => '13',
        ]);

        DB::table('accesorios')->insert([
            'id' => '1',
            'proveedor_id' => '1',
            'nombre' => 'Cabezal para silla',
            'precio' => '1500',
            'nro_articulo' => '21',
        ]);

        DB::table('accesorios')->insert([
            'id' => '2',
            'proveedor_id' => '2',
            'nombre' => 'Bateria para silla',
            'precio' => '4545',
            'nro_articulo' => '99',
        ]);

        DB::table('accesorio_producto')->insert([
            'accesorio_id' => '1',
            'producto_id' => '1'
        ]);

        DB::table('accesorio_producto')->insert([
            'accesorio_id' => '2',
            'producto_id' => '1'
        ]);

        DB::table('clientes')->insert([
            'id' => '1',
            'nombre' => 'Franco',
            'apellido' => 'Cava',
            'dni' => '39458753',
            'telefono' => '45458989',
            'obra_id' => '1',
            'nro_afiliado' => '23435'
        ]);

        DB::table('clientes')->insert([
            'id' => '2',
            'nombre' => 'Agustina',
            'apellido' => 'Ravielli',
            'dni' => '30458753',
            'telefono' => '45458900',
            'obra_id' => '2',
            'nro_afiliado' => '23435647'
        ]);


        DB::table('pedidos')->insert([
            'id' => '1',
            'cliente_id' => '1',
            'sucursal_id' => '1',
            'usuario_id' => '2',
            'fecha_ingreso_autorizacion' => '2020/10/22',
            'fecha_retiro' => '2020/11/22',
            'importe' => '9090',
            'nro_recibo_proveedor' => '32434',
            'observaciones' => 'Du hast mich',
            'confirmado' => '1',
        ]);

        DB::table('facturas')->insert([
            'id' => '1',
            'pedido_id' => '1',
            'fecha_fac' => '2020/10/23',
            'importe' => '232',
        ]);

        DB::table('pedido_items')->insert([
            'id' => '1',
            'producto_id' => '1',
            'pedido_id' => '1',
            'precio_item' => '43000',
            'porcentaje_os' => '25'
        ]);

        DB::table('pedido_items')->insert([
            'id' => '2',
            'producto_id' => null,
            'accesorio_id' => '1',
            'pedido_id' => '1',
            'precio_item' => '1500',
            'porcentaje_os' => '30'
        ]);

        DB::table('pedido_items')->insert([
            'id' => '3',
            'producto_id' => null,
            'accesorio_id' => '2',
            'pedido_id' => '1',
            'precio_item' => '4545',
            'porcentaje_os' => '20'
        ]);

        DB::table('cobros')->insert([
            'id' => '1',
            'pedido_id' => '1',
            'forma_pago_id' => '2',
            'monto' => '3455'
        ]);

        DB::table('pagos')->insert([
            'id' => '1',
            'pedido_id' => '1',
            'proveedor_id' => '1',
            'forma_pago_id' => '1',
            'monto' => '3455'
        ]);
    }
}
