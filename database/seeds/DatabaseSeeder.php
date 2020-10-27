<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'descripcion' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'id' => '2',
            'descripcion' => 'Empleado',
        ]);

        DB::table('usuarios')->insert([
            'id' => '2',
            'nombre' => 'Gaston',
            'apellido' => 'Paella',
            'usuario' => 'gPaella',
            'password' => 'donPepe1212',
            'rol_id' => '2'
        ]);

        DB::table('usuarios')->insert([
            'id' => '1',
            'nombre' => 'Clauda',
            'apellido' => 'Moyano',
            'usuario' => 'cMoyano',
            'password' => 'contra213',
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
            'descripcion' => 'Silla de ruedas',
            'precio' => '43000',
            'nroArticulo' => '13',
        ]);

        DB::table('productos')->insert([
            'id' => '2',
            'proveedor_id' => '2',
            'descripcion' => 'Muletas',
            'precio' => '20000',
            //'nroArticulo' => '13',
        ]);

        DB::table('accesorios')->insert([
            'id' => '1',
            'proveedor_id' => '1',
            'descripcion' => 'Cabezal para silla',
            'precio' => '1500',
            'nroArticulo' => '21',
        ]);

        DB::table('accesorios')->insert([
            'id' => '2',
            'proveedor_id' => '2',
            'descripcion' => 'Bateria para silla',
            'precio' => '4545',
            'nroArticulo' => '99',
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
            'nroAfiliado' => '23435'
        ]);

        DB::table('clientes')->insert([
            'id' => '2',
            'nombre' => 'Agustina',
            'apellido' => 'Ravielli',
            'dni' => '30458753',
            'telefono' => '45458900',
            'obra_id' => '2',
            'nroAfiliado' => '23435647'
        ]);

        DB::table('estados')->insert([
            'id' => '1',
            'descripcion' => 'No'
        ]);

        DB::table('facturas')->insert([
            'id' => '1',
            'total_sin_iva' => '32',
            'total_con_iva' => '234',
            'fecha_fac' => '2020/10/23',
            'importe' => '232',
            'fl/ct' => 'fl'
        ]);

        DB::table('pedidos')->insert([
            'id' => '1',
            'clie_id' => '1',
            'suc_id' => '1',
            'estado_id' => '1',
            'usuario_id' => '2',
            'fac_id' => '1',
            'fecha_ingreso_autorizacion' => '2020/10/22',
            'fecha_retiro' => '2020/11/22',
            'importe_fac' => '324235',
            'fl_ct' => 'fl',
            'nro_recibo_proveedor' => '32434',
            'cancelado' => false
        ]);

        DB::table('pedido_items')->insert([
            'id' => '1',
            'producto_id' => '1',
            'pedido_id' => '1',
            'precio' => '43000',
            'porcentajeOS' => '25'
        ]);

        DB::table('pedido_item_accesorios')->insert([
            'id' => '1',
            'pedido_item_id' => '1',
            'accesorio_id' => '1',
        ]);

        DB::table('pedido_item_accesorios')->insert([
            'id' => '2',
            'pedido_item_id' => '1',
            'accesorio_id' => '2',
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
