<aside 
    x-data="{ isVisible: window.innerWidth >= 640, selected: '' }"
    class="fixed top-0 left-0 z-40 h-screen pt-20 transition-transform  translate-x-0 aria-label="Sidebar">
    <div class="flex flex-row h-full -mt-4 -pr-16"
        :class="{ 'w-80': isVisible, 'w-12': ! isVisible }">
        
        <div class="h-full px-3 pt-4 pb-4 overflow-y-auto bg-white dark:bg-gray-800" 
            :class="{'block': isVisible, 'hidden': ! isVisible, 'w-72': isVisible}">
            <ul class="space-y-2 font-medium">
                <li>
                    <button @click="selected = (selected == 'Inicio')? '' : 'Inicio'"
                        class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="float-right">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        </div>                            
                        <span class="flex-1 ml-3 whitespace-nowrap">Inicio</span>
                        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            ➤
                        </span>
                    </button>
                    <div class="flex flex-col space-y-2"
                        :class="{'block': selected == 'Inicio', 'hidden': selected != 'Inicio' }">
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button class="float-left">
                            Opción 1 
                        </button>
                        <button class="float-left">
                            Opción 2
                        </button>
                    </div>
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <button @click="selected = (selected == 'Boletaje')? '' : 'Boletaje'"
                        class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Boletaje</span>
                        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            ➤
                        </span>
                    </button>
                    <div class="flex flex-col space-y-2"
                        :class="{'block': selected == 'Boletaje', 'hidden': selected != 'Boletaje' }">
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Boletos y reservas
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Boletas con fecha abierta
                        </button>
                        <button>
                            Boletos por reintegro
                        </button>
                        <button>
                            Boletos por devolución
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Relación de documentos
                        </button>
                        <button>
                            Documentos anulados
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Manifiesto de pasajeros
                        </button>
                        <button>
                            Hoja de embarque
                        </button>
                        <button>
                            Hoja de ruta y Manifiesto MTC
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Números faltantes
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Consolidado de ventas
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Flujo de caja
                        </button>
                        <button>
                            Facturación electrónica
                        </button>
                        
                    </div>
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <button @click="selected = (selected == 'Finanzas')? '' : 'Finanzas'"
                        class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Finanzas</span>
                        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            ➤
                        </span>
                    </button>
                    <div class="flex flex-col space-y-2"
                        :class="{'block': selected == 'Finanzas', 'hidden': selected != 'Finanzas' }">
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Cuentas por cobrar
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Planilla de cobranzas
                        </button>
                        <button>
                            Relación de documentos
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Estado de cuentas corrientes
                        </button>
                       
                    </div>
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <button @click="selected = (selected == 'Encomiendas')? '' : 'Encomiendas'"
                        class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Encomiendas</span>
                        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            ➤
                        </span>
                    </button>
                    <div class="flex flex-col space-y-2"
                        :class="{'block': selected == 'Encomiendas', 'hidden': selected != 'Encomiendas' }">
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Carga y encomiendas
                        </button>
                        <button>
                            Relación de documentos
                        </button>
                        <button>
                            Documentos con/sin referencias
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Manifiesto de carga
                        </button>
                        <button>
                            Entrega de carga/documentos
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Número faltantes
                        </button>
                        <button>
                            Consolidado de ventas
                        </button>
                        <button>
                            Flujo de caja
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Facturación electrónica
                        </button>
                    </div>
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <button @click="selected = (selected == 'Gerencia')? '' : 'Gerencia'"
                        class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Gerencia</span>
                        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            ➤
                        </span>
                    </button>
                    <div class="flex flex-col space-y-2"
                        :class="{'block': selected == 'Gerencia', 'hidden': selected != 'Gerencia' }">
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Registro de Ventas (Boletaje)
                        </button>
                        <button>
                            Registro de Ventas (Encomiendas)
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Recaudación de por salida
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Estadísticas por cliente
                        </button>
                        <button>
                            Estadísticas por omnibus (Boletaje)
                        </button>
                        <button>
                            Estadísticas por omnibus (Encomiendas)
                        </button>
                        <button>
                            Estadísticas por turnos
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Gráfico de barras (Boletaje)
                        </button>
                        <button>
                            Gráfico de barras (Boletaje-Rutas)
                        </button>
                        <button>
                            Gráfico de barras (Encomiendas)
                        </button>
                        <button>
                            Control de tripulación
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Detalle de ventas
                        </button>
                        <button>
                            Resume de ventas
                        </button>
                        <button>
                            Liquidación por día
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Estadísticas de carga agrupado
                        </button>
                        <button>
                            Liquidaciones
                        </button>
                        <button>
                            Cálculo de comisiones por buses
                        </button>
                        <button>
                            Configuración de libros y cuentas contables
                        </button>
                        <button>
                            Exportar transferencias
                        </button>
                        <button>
                            Importar transferencias
                        </button>
                    </div>
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <button @click="selected = (selected == 'Administración')? '' : 'Administración'"
                        class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Administración</span>
                        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            ➤
                        </span>
                    </button>
                    <div class="flex flex-col space-y-2"
                        :class="{'block': selected == 'Administración', 'hidden': selected != 'Administración' }">
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Configuración de salidas
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Sucursales
                        </button>
                        <button>
                            Zonas
                        </button>
                        <button>
                            Puntos de entrega
                        </button>
                        <button>
                            Ubigeo
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Servicios
                        </button>
                        <button>
                            Comisionistas
                        </button>
                        <button>
                            Croquis-Planos
                        </button>
                        <button>
                            Omnibus
                        </button>
                        <button>
                            Productos y conceptos
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Clientes (Boletaje)
                        </button>
                        <button>
                            Clientes (Encomiendas)
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Docs. de identidad
                        </button>
                        <button>
                            Personal
                        </button>
                        <button>
                            Cargos
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Docs. Boletaje Encomiendas
                        </button>
                        <button>
                            Condiciones de documento
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Formatos de impresión
                        </button>
                    </div>
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <button @click="selected = (selected == 'Útiles')? '' : 'Útiles'"
                        class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Útiles</span>
                        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            ➤
                        </span>
                    </button>
                    <div class="flex flex-col space-y-2"
                        :class="{'block': selected == 'Útiles', 'hidden': selected != 'Útiles' }">
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Cambiar de usuario
                        </button>
                        <button>
                            Administrador de accesos
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Consola de mensajes
                        </button>
                        <button>
                            Calculadora
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Corrector/Cambio de correlativo Boletaje
                        </button>
                        <button>
                            Eliminar/Anular Boletajes
                        </button>
                        <button>
                            Correcto de numeración y fechas de encomiendas
                        </button>
                        <button>
                            Series por sucursal
                        </button>
                        <button>
                            Series por terminal PC
                        </button>
                        <button>
                            Recálculo de viajes por cliente
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Registro de auditoría
                        </button>
                        <button>
                            Registro de bloqueos
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Opciones de sistema
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Temas de escritorio
                        </button>
                    </div>
                </li>
                <hr class="my-2 border-t-4 border-gray-200 dark:border-gray-700">
                <li>
                    <button @click="selected = (selected == 'Ayuda')? '' : 'Ayuda'"
                        class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Ayuda</span>
                        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            ➤
                        </span>
                    </button>
                    <div class="flex flex-col space-y-2"
                        :class="{'block': selected == 'Ayuda', 'hidden': selected != 'Ayuda' }">
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button class="float-left">
                            Temas de ayuda
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button class="float-left">
                            Registrar clave de validación
                        </button>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <button>
                            Acerca de
                        </button>
                    </div>
                    
                </li>
            </ul>
        </div>


        <div class="flex items-center -left-16 -ml-2">
            <button @click="isVisible = ! isVisible" class="inline-flex items-center justify-center py-2 rounded-md bg-gray-200 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-400 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <p class="mx-2 text-3xl font-extrabold text-gray-700 dark:text-gray-200 rounded-full p-2"
                    :class="{'hidden': isVisible, 'inline-flex': ! isVisible }"
                >
                    ❱
                </p>
                <p class="mx-2 text-3xl font-extrabold text-gray-700 dark:text-gray-200  rounded-full p-2"
                :class="{'hidden': ! isVisible, 'inline-flex': isVisible }"
                >
                    ❰
                </p>
            </button>
        </div>
    </div>
</aside>