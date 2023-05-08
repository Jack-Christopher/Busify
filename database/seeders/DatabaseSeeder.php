<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createRoles();
        $this->createPermissions();
        $this->assignPermissionsToRoles();

        
    }

    public function createRoles(): void
    {
        // creation of roles
        $roles = [
            'super-admin',
            'admin-sistema',
            'admin-sucursal',
            'admin-sede',
            'cajero',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }

    public function createPermissions(): void
    {
        // creation of permissions
        $permissionList = [
            // BOLETAJE
            ['Boletos y reservas'],
            ['Boletos con fecha abierta', 'Boletos por reintegro', 'Boletos por devolución'],
            ['Relación de documentos', 'Documentos anulados'],
            ['Manifiesto de pasajeros', 'Hoja de embarque', 'Hoja de ruta y Manifiesto MTC'],
            ['Números faltantes'],
            ['Consolidado de ventas'],
            ['Flujo de caja', 'Facturación electrónica'],
    
            // FINANZAS
            ['Cuentas por cobrar'],
            ['Planilla de cobranzas', 'Relación de documentos'],
            ['Estado de cuentas corrientes'],
    
            // ENCOMIENDAS
            ['Carga y encomiendas', 'Relación de documentos', 'Documentos con-sin referencias'],
            ['Manifiesto de carga', 'Entrega de carga-documentos'],
            ['Números faltantes', 'Consolidado de ventas', 'Flujo de caja'],
            ['Facturación electrónica'],
    
            // GERENCIA
            ['Registro de Ventas por Boletaje', 'Registro de Ventas por Encomiendas'],
            ['Recaudación de por salida'],
            ['Estadísticas por cliente', 'Estadísticas por omnibus por Boletaje', 'Estadísticas por omnibus por Encomiendas', 'Estadísticas por turnos'],
            ['Gráfico de barras por Boletaje', 'Gráfico de barras por Boletaje-Rutas', 'Gráfico de barras por Encomiendas', 'Control de tripulación'],
            ['Detalle de ventas', 'Resume de ventas', 'Liquidación por día'],
            ['Estadísticas de carga agrupado', 'Liquidaciones', 'Cálculo de comisiones por buses', 'Configuración de libros y cuentas contables', 'Exportar transferencias', 'Importar transferencias'],
    
            // ADMINISTRACIÓN
            ['Configuración de salidas'],
            ['Sucursales', 'Zonas', 'Puntos de entrega', 'Ubigeo'],
            ['Servicios', 'Comisionistas', 'Croquis-Planos', 'Omnibus', 'Productos y conceptos'],
            ['Clientes por Boletaje', 'Clientes por Encomiendas'],
            ['Docs. de identidad', 'Personal', 'Cargos'],
            ['Docs. Boletaje Encomiendas', 'Condiciones de documento'],
            ['Formatos de impresión'],
    
            // ÚTILES
            ['Cambiar de usuario', 'Administrador de accesos'],
            ['Consola de mensajes', 'Calculadora'],
            ['Corrector-Cambio de correlativo Boletaje', 'Eliminar-Anular Boletajes', 'Corrector de numeración y fechas de encomiendas', 'Series por sucursal', 'Series por terminal PC', 'Recálculo de viajes por cliente'],
            ['Registro de auditoría', 'Registro de bloqueos'],
            ['Opciones de sistema'],
            ['Temas de escritorio'],
    
            // AYUDA
            ['Temas de ayuda'],
            ['Registrar clave de validación'],
            ['Acerca de'],
        ];

        foreach ($permissionList as $permission) {
            foreach ($permission as $name) {
                Permission::create(['name' => $name]);
            }
        }
    }

    public function assignPermissionsToRoles(): void
    {
        $superAdmin = Role::findByName('super-admin');
        $superAdmin->givePermissionTo(Permission::all());

        $adminSistema = Role::findByName('admin-sistema');
        $adminSistema->givePermissionTo(Permission::all()->except([
            // 
        ]));

        $adminSucursal = Role::findByName('admin-sucursal');
        $adminSucursal->givePermissionTo(Permission::all()->except([
            // 
        ]));

        $adminSede = Role::findByName('admin-sede');
        $adminSede->givePermissionTo(Permission::all()->except([
            // 
        ]));

        $cajero = Role::findByName('cajero');
        $cajero->givePermissionTo([
            // 
        ]);
    }
}
