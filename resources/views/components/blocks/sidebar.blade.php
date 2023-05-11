<aside 
    class="fixed top-0 left-0 z-40 h-screen pt-20 transition-transform  translate-x-0 aria-label="Sidebar">
    <div class="flex flex-row h-full -mt-4 -pr-16" x-cloak
        :class="{ 'w-80': isVisible, 'w-12': ! isVisible }">
        
        <div class="h-full px-3 pt-4 pb-4 overflow-y-auto bg-white dark:bg-gray-800" 
            :class="{'block': isVisible, 'hidden': ! isVisible, 'w-80': isVisible}">
            <ul class="space-y-2 font-medium">
                <li>
                    <x-elements.sidebar-button name="Inicio">
                        <path d='M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'></path>
                    </x-elements.sidebar-button>
                 
                    {{-- <x-blocks.sidebar-submenu name="Inicio" :options="[
                        ['Opción 1', 'Opción 2']
                    ]" /> --}}
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <x-elements.sidebar-button name="Boletaje">
                        <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path>
                    </x-elements.sidebar-button>
                    
                    <x-blocks.sidebar-submenu name="Boletaje" :options="[
                        ['Boletos y reservas'],
                        ['Boletos con fecha abierta', 'Boletos por reintegro', 'Boletos por devolución'],
                        ['Relación de documentos', 'Documentos anulados'],
                        ['Manifiesto de pasajeros', 'Hoja de embarque', 'Hoja de ruta y Manifiesto MTC'],
                        ['Números faltantes'],
                        ['Consolidado de ventas'],
                        ['Flujo de caja', 'Facturación electrónica']
                    ]" />
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <x-elements.sidebar-button name="Finanzas">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </x-elements.sidebar-button>
                  
                    <x-blocks.sidebar-submenu name="Finanzas" :options="[
                        ['Cuentas por cobrar'],
                        ['Planilla de cobranzas', 'Relación de documentos'],
                        ['Estado de cuentas corrientes']
                    ]" />
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <x-elements.sidebar-button name="Encomiendas">
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                    </x-elements.sidebar-button>

                    <x-blocks.sidebar-submenu name="Encomiendas" :options="[
                        ['Carga y encomiendas', 'Relación de documentos', 'Documentos con-sin referencias'],
                        ['Manifiesto de carga', 'Entrega de carga-documentos'],
                        ['Números faltantes', 'Consolidado de ventas', 'Flujo de caja'],
                        ['Facturación electrónica']
                    ]" />
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <x-elements.sidebar-button name="Gerencia">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </x-elements.sidebar-button>
                
                    <x-blocks.sidebar-submenu name="Gerencia" :options="[
                        ['Registro de Ventas por Boletaje', 'Registro de Ventas por Encomiendas'],
                        ['Recaudación de por salida'],
                        ['Estadísticas por cliente', 'Estadísticas por omnibus por Boletaje', 'Estadísticas por omnibus por Encomiendas', 'Estadísticas por turnos'],
                        ['Gráfico de barras por Boletaje', 'Gráfico de barras por Boletaje-Rutas', 'Gráfico de barras por Encomiendas', 'Control de tripulación'],
                        ['Detalle de ventas', 'Resume de ventas', 'Liquidación por día'],
                        ['Estadísticas de carga agrupado', 'Liquidaciones', 'Cálculo de comisiones por buses', 'Configuración de libros y cuentas contables', 'Exportar transferencias', 'Importar transferencias']
                    ]" />
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <x-elements.sidebar-button name="Administración">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </x-elements.sidebar-button>

                    <x-blocks.sidebar-submenu name="Administración" :options="[
                        ['Configuración de salidas'],
                        ['Sucursales', 'Zonas', 'Puntos de entrega', 'Ubigeo'],
                        ['Servicios', 'Comisionistas', 'Croquis-Planos', 'Omnibus', 'Productos y conceptos'],
                        ['Clientes por Boletaje', 'Clientes por Encomiendas'],
                        ['Docs. de identidad', 'Personal', 'Cargos'],
                        ['Docs. Boletaje Encomiendas', 'Condiciones de documento'],
                        ['Formatos de impresión']
                    ]" />
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <x-elements.sidebar-button name="Útiles">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </x-elements.sidebar-button>
                   
                    <x-blocks.sidebar-submenu name="Útiles" :options="[
                        ['Cambiar de usuario', 'Administrador de accesos'],
                        ['Consola de mensajes', 'Calculadora'],
                        ['Corrector-Cambio de correlativo Boletaje', 'Eliminar-Anular Boletajes', 'Corrector de numeración y fechas de encomiendas', 'Series por sucursal', 'Series por terminal PC', 'Recálculo de viajes por cliente'],
                        ['Registro de auditoría', 'Registro de bloqueos'],
                        ['Opciones de sistema'],
                        ['Temas de escritorio']
                    ]" />
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <x-elements.sidebar-button name="Ayuda">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                    </x-elements.sidebar-button>
                    
                    <x-blocks.sidebar-submenu name="Ayuda" :options="[
                        ['Temas de ayuda'],
                        ['Registrar clave de validación'],
                        ['Acerca de']
                    ]" />
                    
                </li>
            </ul>
        </div>


        <div class="flex items-center -left-16 -ml-2"
            x-show="window.innerWidth < 640">
            <button @click="isVisible = ! isVisible" class="inline-flex items-center justify-center py-2 rounded-md bg-gray-200 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-400 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <p class="mx-2 text-3xl font-extrabold text-gray-700 dark:text-gray-200 rounded-full p-2"
                    {{-- :class="{'hidden': isVisible, 'inline-flex': ! isVisible }" --}}
                    x-cloak x-show="! isVisible"
                >
                    ❱
                </p>
                <p class="mx-2 text-3xl font-extrabold text-gray-700 dark:text-gray-200  rounded-full p-2"
                {{-- :class="{'hidden': ! isVisible, 'inline-flex': isVisible }" --}}
                    x-show="isVisible"
                >
                    ❰
                </p>
            </button>
        </div>
    </div>
</aside>