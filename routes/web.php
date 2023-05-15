<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Boletaje as Boletaje;
use App\Http\Controllers\Finanzas as Finanzas;
use App\Http\Controllers\Encomiendas as Encomiendas;
use App\Http\Controllers\Gerencia as Gerencia;
use App\Http\Controllers\Administracion as Administracion;
use App\Http\Controllers\Utiles as Utiles;
use App\Http\Controllers\Ayuda as Ayuda;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', function () {  return view('dashboard');})->name('dashboard');

    // Pages/Boletaje
    Route::get('/dashboard/boletaje/boletos-y-reservas', [Boletaje\BoletosYReservasController::class, 'index'])->name('boletaje.boletos-y-reservas.index');
    Route::get('/dashboard/boletaje/boletos-con-fecha-abierta', [Boletaje\BoletosConFechaAbiertaController::class, 'index'])->name('boletaje.boletos-con-fecha-abierta.index');
    Route::get('/dashboard/boletaje/boletos-por-reintegro', [Boletaje\BoletosPorReintegroController::class, 'index'])->name('boletaje.boletos-por-reintegro.index');
    Route::get('/dashboard/boletaje/boletos-por-devolucion', [Boletaje\BoletosPorDevolucionController::class, 'index'])->name('boletaje.boletos-por-devolucion.index');
    Route::get('/dashboard/boletaje/relacion-de-documentos', [Boletaje\RelacionDeDocumentosController::class, 'index'])->name('boletaje.relacion-de-documentos.index');
    Route::get('/dashboard/boletaje/documentos-anulados', [Boletaje\DocumentosAnuladosController::class, 'index'])->name('boletaje.documentos-anulados.index');
    Route::get('/dashboard/boletaje/manifiesto-de-pasajeros', [Boletaje\ManifiestoDePasajerosController::class, 'index'])->name('boletaje.manifiesto-de-pasajeros.index');
    Route::get('/dashboard/boletaje/hoja-de-embarque', [Boletaje\HojaDeEmbarqueController::class, 'index'])->name('boletaje.hoja-de-embarque.index');
    Route::get('/dashboard/boletaje/hoja-de-ruta-y-manifiesto-mtc', [Boletaje\HojaDeRutaYManifiestoMTCController::class, 'index'])->name('boletaje.hoja-de-ruta-y-manifiesto-mtc.index');
    Route::get('/dashboard/boletaje/numeros-faltantes', [Boletaje\NumerosFaltantesController::class, 'index'])->name('boletaje.numeros-faltantes.index');
    Route::get('/dashboard/boletaje/consolidado-de-ventas', [Boletaje\ConsolidadoDeVentasController::class, 'index'])->name('boletaje.consolidado-de-ventas.index');
    Route::get('/dashboard/boletaje/flujo-de-caja', [Boletaje\FlujoDeCajaController::class, 'index'])->name('boletaje.flujo-de-caja.index');
    Route::get('/dashboard/boletaje/facturacion-electronica', [Boletaje\FacturacionElectronicaController::class, 'index'])->name('boletaje.facturacion-electronica.index');

    
    // Pages/Finanzas
    Route::get('/dashboard/finanzas/cuentas-por-cobrar', [Finanzas\CuentasPorCobrarController::class, 'index'])->name('finanzas.cuentas-por-cobrar.index');
    Route::get('/dashboard/finanzas/planilla-de-cobranzas', [Finanzas\PlanillaDeCobranzasController::class, 'index'])->name('finanzas.planilla-de-cobranzas.index');
    Route::get('/dashboard/finanzas/relacion-de-documentos', [Finanzas\RelacionDeDocumentosController::class, 'index'])->name('finanzas.relacion-de-documentos.index');
    Route::get('/dashboard/finanzas/estado-de-cuentas-corrientes', [Finanzas\EstadoDeCuentasCorrientesController::class, 'index'])->name('finanzas.estado-de-cuentas-corrientes.index');
    

    // Pages/Encomiendas
    Route::get('/dashboard/encomiendas/carga-y-encomiendas', [Encomiendas\CargaYEncomiendasController::class, 'index'])->name('encomiendas.carga-y-encomiendas.index');
    Route::get('/dashboard/encomiendas/relacion-de-documentos', [Encomiendas\RelacionDeDocumentosController::class, 'index'])->name('encomiendas.relacion-de-documentos.index');
    Route::get('/dashboard/encomiendas/documentos-con-sin-referencias', [Encomiendas\DocumentosConSinReferenciasController::class, 'index'])->name('encomiendas.documentos-con-sin-referencias.index');
    Route::get('/dashboard/encomiendas/manifiesto-de-carga', [Encomiendas\ManifiestoDeCargaController::class, 'index'])->name('encomiendas.manifiesto-de-carga.index');
    Route::get('/dashboard/encomiendas/entrega-de-carga-documentos', [Encomiendas\EntregaDeCargaDocumentosController::class, 'index'])->name('encomiendas.entrega-de-carga-documentos.index');
    Route::get('/dashboard/encomiendas/numeros-faltantes', [Encomiendas\NumerosFaltantesController::class, 'index'])->name('encomiendas.numeros-faltantes.index');
    Route::get('/dashboard/encomiendas/consolidado-de-ventas', [Encomiendas\ConsolidadoDeVentasController::class, 'index'])->name('encomiendas.consolidado-de-ventas.index');
    Route::get('/dashboard/encomiendas/flujo-de-caja', [Encomiendas\FlujoDeCajaController::class, 'index'])->name('encomiendas.flujo-de-caja.index');
    Route::get('/dashboard/encomiendas/facturacion-electronica', [Encomiendas\FacturacionElectronicaController::class, 'index'])->name('encomiendas.facturacion-electronica.index');


    // Pages/Gerencia
    Route::get('/dashboard/gerencia/registro-de-ventas-por-boletaje', [Gerencia\RegistroDeVentasPorBoletajeController::class, 'index'])->name('gerencia.registro-de-ventas-por-boletaje.index');
    Route::get('/dashboard/gerencia/registro-de-ventas-por-encomiendas', [Gerencia\RegistroDeVentasPorEncomiendasController::class, 'index'])->name('gerencia.registro-de-ventas-por-encomiendas.index');
    Route::get('/dashboard/gerencia/recaudacion-de-por-salida', [Gerencia\RecaudacionDePorSalidaController::class, 'index'])->name('gerencia.recaudacion-de-por-salida.index');
    Route::get('/dashboard/gerencia/estadisticas-por-cliente', [Gerencia\EstadisticasPorClienteController::class, 'index'])->name('gerencia.estadisticas-por-cliente.index');
    Route::get('/dashboard/gerencia/estadisticas-por-omnibus-por-boletaje', [Gerencia\EstadisticasPorOmnibusPorBoletajeController::class, 'index'])->name('gerencia.estadisticas-por-omnibus-por-boletaje.index');
    Route::get('/dashboard/gerencia/estadisticas-por-omnibus-por-encomiendas', [Gerencia\EstadisticasPorOmnibusPorEncomiendasController::class, 'index'])->name('gerencia.estadisticas-por-omnibus-por-encomiendas.index');
    Route::get('/dashboard/gerencia/estadisticas-por-turnos', [Gerencia\EstadisticasPorTurnosController::class, 'index'])->name('gerencia.estadisticas-por-turnos.index');
    Route::get('/dashboard/gerencia/grafico-de-barras-por-boletaje', [Gerencia\GraficoDeBarrasPorBoletajeController::class, 'index'])->name('gerencia.grafico-de-barras-por-boletaje.index');
    Route::get('/dashboard/gerencia/grafico-de-barras-por-boletaje-rutas', [Gerencia\GraficoDeBarrasPorBoletajeRutasController::class, 'index'])->name('gerencia.grafico-de-barras-por-boletaje-rutas.index');
    Route::get('/dashboard/gerencia/grafico-de-barras-por-encomiendas', [Gerencia\GraficoDeBarrasPorEncomiendasController::class, 'index'])->name('gerencia.grafico-de-barras-por-encomiendas.index');
    Route::get('/dashboard/gerencia/control-de-tripulacion', [Gerencia\ControlDeTripulacionController::class, 'index'])->name('gerencia.control-de-tripulacion.index');
    Route::get('/dashboard/gerencia/detalle-de-ventas', [Gerencia\DetalleDeVentasController::class, 'index'])->name('gerencia.detalle-de-ventas.index');
    Route::get('/dashboard/gerencia/resume-de-ventas', [Gerencia\ResumeDeVentasController::class, 'index'])->name('gerencia.resume-de-ventas.index');
    Route::get('/dashboard/gerencia/liquidacion-por-dia', [Gerencia\LiquidacionPorDiaController::class, 'index'])->name('gerencia.liquidacion-por-dia.index');
    Route::get('/dashboard/gerencia/estadisticas-de-carga-agrupado', [Gerencia\EstadisticasDeCargaAgrupadoController::class, 'index'])->name('gerencia.estadisticas-de-carga-agrupado.index');
    Route::get('/dashboard/gerencia/liquidaciones', [Gerencia\LiquidacionesController::class, 'index'])->name('gerencia.liquidaciones.index');
    Route::get('/dashboard/gerencia/calculo-de-comisiones-por-buses', [Gerencia\CalculoDeComisionesPorBusesController::class, 'index'])->name('gerencia.calculo-de-comisiones-por-buses.index');
    Route::get('/dashboard/gerencia/configuracion-de-libros-y-cuentas-contables', [Gerencia\ConfiguracionDeLibrosYCuentasContablesController::class, 'index'])->name('gerencia.configuracion-de-libros-y-cuentas-contables.index');
    Route::get('/dashboard/gerencia/exportar-transferencias', [Gerencia\ExportarTransferenciasController::class, 'index'])->name('gerencia.exportar-transferencias.index');
    Route::get('/dashboard/gerencia/importar-transferencias', [Gerencia\ImportarTransferenciasController::class, 'index'])->name('gerencia.importar-transferencias.index');


    // Pages/Administracion
    Route::get('/dashboard/administracion/configuracion-de-salidas', [Administracion\ConfiguracionDeSalidasController::class, 'index'])->name('administracion.configuracion-de-salidas.index');
    Route::get('/dashboard/administracion/sucursales', [Administracion\SucursalesController::class, 'index'])->name('administracion.sucursales.index');
    
    Route::controller(Administracion\ZonasController::class)->group(function () {
        Route::get('/dashboard/administracion/zonas', 'index')->name('administracion.zonas.index');
        Route::get('/dashboard/administracion/zonas/create', 'create')->name('administracion.zonas.create');
        Route::post('/dashboard/administracion/zonas', 'store')->name('administracion.zonas.store');
        Route::get('/dashboard/administracion/zonas/{id}', 'show')->name('administracion.zonas.show');
        Route::get('/dashboard/administracion/zonas/{id}/edit', 'edit')->name('administracion.zonas.edit');
        Route::put('/dashboard/administracion/zonas/{id}', 'update')->name('administracion.zonas.update');
        Route::delete('/dashboard/administracion/zonas/{id}', 'destroy')->name('administracion.zonas.destroy');
    });
    
    Route::get('/dashboard/administracion/puntos-de-entrega', [Administracion\PuntosDeEntregaController::class, 'index'])->name('administracion.puntos-de-entrega.index');
    Route::get('/dashboard/administracion/ubigeo', [Administracion\UbigeoController::class, 'index'])->name('administracion.ubigeo.index');
    Route::get('/dashboard/administracion/servicios', [Administracion\ServiciosController::class, 'index'])->name('administracion.servicios.index');
    Route::get('/dashboard/administracion/comisionistas', [Administracion\ComisionistasController::class, 'index'])->name('administracion.comisionistas.index');
    Route::get('/dashboard/administracion/croquis-planos', [Administracion\CroquisPlanosController::class, 'index'])->name('administracion.croquis-planos.index');
    Route::get('/dashboard/administracion/omnibus', [Administracion\OmnibusController::class, 'index'])->name('administracion.omnibus.index');
    Route::get('/dashboard/administracion/productos-y-conceptos', [Administracion\ProductosYConceptosController::class, 'index'])->name('administracion.productos-y-conceptos.index');
    Route::get('/dashboard/administracion/clientes-por-boletaje', [Administracion\ClientesPorBoletajeController::class, 'index'])->name('administracion.clientes-por-boletaje.index');
    Route::get('/dashboard/administracion/clientes-por-encomiendas', [Administracion\ClientesPorEncomiendasController::class, 'index'])->name('administracion.clientes-por-encomiendas.index');
    Route::get('/dashboard/administracion/docs-de-identidad', [Administracion\DocsDeIdentidadController::class, 'index'])->name('administracion.docs-de-identidad.index');
    Route::get('/dashboard/administracion/personal', [Administracion\PersonalController::class, 'index'])->name('administracion.personal.index');
    Route::get('/dashboard/administracion/cargos', [Administracion\CargosController::class, 'index'])->name('administracion.cargos.index');
    Route::get('/dashboard/administracion/docs-boletaje-encomiendas', [Administracion\DocsBoletajeEncomiendasController::class, 'index'])->name('administracion.docs-boletaje-encomiendas.index');
    Route::get('/dashboard/administracion/condiciones-de-documento', [Administracion\CondicionesDeDocumentoController::class, 'index'])->name('administracion.condiciones-de-documento.index');
    Route::get('/dashboard/administracion/formatos-de-impresion', [Administracion\FormatosDeImpresionController::class, 'index'])->name('administracion.formatos-de-impresion.index');


    // Pages/Utiles
    Route::get('/dashboard/utiles/cambiar-de-usuario', [Utiles\CambiarDeUsuarioController::class, 'index'])->name('utiles.cambiar-de-usuario.index');
    Route::get('/dashboard/utiles/administrador-de-accesos', [Utiles\AdministradorDeAccesosController::class, 'index'])->name('utiles.administrador-de-accesos.index');
    Route::get('/dashboard/utiles/consola-de-mensajes', [Utiles\ConsolaDeMensajesController::class, 'index'])->name('utiles.consola-de-mensajes.index');
    Route::get('/dashboard/utiles/calculadora', [Utiles\CalculadoraController::class, 'index'])->name('utiles.calculadora.index');
    Route::get('/dashboard/utiles/corrector-cambio-de-correlativo-boletaje', [Utiles\CorrectorCambioDeCorrelativoBoletajeController::class, 'index'])->name('utiles.corrector-cambio-de-correlativo-boletaje.index');
    Route::get('/dashboard/utiles/eliminar-anular-boletajes', [Utiles\EliminarAnularBoletajesController::class, 'index'])->name('utiles.eliminar-anular-boletajes.index');
    Route::get('/dashboard/utiles/corrector-de-numeracion-y-fechas-de-encomiendas', [Utiles\CorrectorDeNumeracionYFechasDeEncomiendasController::class, 'index'])->name('utiles.corrector-de-numeracion-y-fechas-de-encomiendas.index');
    Route::get('/dashboard/utiles/series-por-sucursal', [Utiles\SeriesPorSucursalController::class, 'index'])->name('utiles.series-por-sucursal.index');
    Route::get('/dashboard/utiles/series-por-terminal-pc', [Utiles\SeriesPorTerminalPCController::class, 'index'])->name('utiles.series-por-terminal-pc.index');
    Route::get('/dashboard/utiles/recalculo-de-viajes-por-cliente', [Utiles\RecalculoDeViajesPorClienteController::class, 'index'])->name('utiles.recalculo-de-viajes-por-cliente.index');
    Route::get('/dashboard/utiles/registro-de-auditoria', [Utiles\RegistroDeAuditoriaController::class, 'index'])->name('utiles.registro-de-auditoria.index');
    Route::get('/dashboard/utiles/registro-de-bloqueos', [Utiles\RegistroDeBloqueosController::class, 'index'])->name('utiles.registro-de-bloqueos.index');
    Route::get('/dashboard/utiles/opciones-de-sistema', [Utiles\OpcionesDeSistemaController::class, 'index'])->name('utiles.opciones-de-sistema.index');
    Route::get('/dashboard/utiles/temas-de-escritorio', [Utiles\TemasDeEscritorioController::class, 'index'])->name('utiles.temas-de-escritorio.index');


    // Pages/Ayuda
    Route::get('/dashboard/ayuda/temas-de-ayuda', [Ayuda\TemasDeAyudaController::class, 'index'])->name('ayuda.temas-de-ayuda.index');
    Route::get('/dashboard/ayuda/registrar-clave-de-validacion', [Ayuda\RegistrarClaveDeValidacionController::class, 'index'])->name('ayuda.registrar-clave-de-validacion.index');
    Route::get('/dashboard/ayuda/acerca-de', [Ayuda\AcercaDeController::class, 'index'])->name('ayuda.acerca-de.index');        

    
});


require __DIR__.'/auth.php';
