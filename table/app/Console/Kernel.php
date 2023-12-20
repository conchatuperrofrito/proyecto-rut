<?php
// Este código establece el espacio de nombres (namespace)
//  para la clase Kernel. Todas las clases en este archivo 
//  están dentro del espacio de nombres App\Console.

namespace App\Console;

// Estos use statements importan clases de otros espacios de nombres para que puedan ser utilizadas en este archivo.
// Illuminate\Console\Scheduling\Schedule se utiliza para definir tareas programadas.
// Illuminate\Foundation\Console\Kernel se utiliza como base para la clase Kernel.

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

// La clase Kernel extiende de ConsoleKernel, que a su vez extiende de Illuminate\Console\Command.
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    //  Este método permite definir tareas programadas (scheduling) para la aplicación. 
    //  En el ejemplo, está comentado, pero aquí es donde definirías las tareas programadas 
    //  que deseas ejecutar en intervalos específicos. Por ejemplo, podrías programar un 
    //  comando para ejecutarse cada hora.
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }
    /**
     * Register the commands for the application.
     *
     * @return void
     */


    //      Este método se utiliza para registrar comandos de consola personalizados.
// $this->load(__DIR__.'/Commands'): Carga los comandos personalizados ubicados 
// en el directorio Commands de la carpeta Console.
// require base_path('routes/console.php'): Permite cargar rutas específicas 
// para comandos de consola. Puedes definir rutas específicas para comandos en este archivo.
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

// En resumen, el archivo Kernel.php en Laravel es una parte fundamental de la 
// configuración de la consola. Se encarga de definir tareas programadas y registrar
//  comandos de consola personalizados para tu aplicación Laravel. El uso de este 
//  archivo facilita la organización y ejecución de tareas programadas y comandos de consola.

// Supongamos que deseas ejecutar un comando de consola personalizado llamado
//  custom:task cada día a las 3:00 PM.

// protected function schedule(Schedule $schedule)
// {
//     $schedule->command('custom:task')->dailyAt('15:00');
// }

// Ejemplo de Registro de Comandos de Consola Personalizados:
// Supongamos que has creado un nuevo comando de consola llamado CustomCommand que realiza una tarea específica.

// Registra el comando en el método commands de Kernel.php:

// php
// Copy code
// protected function commands()
// {
//     $this->load(__DIR__.'/Commands');

//     // Registra el nuevo comando
//     $this->commands([
//         \App\Console\Commands\CustomCommand::class,
//     ]);
// }
// Aquí, CustomCommand::class es la clase del nuevo comando que has creado y deseas registrar.

// Crea el comando de consola:

// Crea un nuevo archivo CustomCommand.php en el directorio app/Console/Commands con el siguiente contenido:

// php
// Copy code
// <?php

// namespace App\Console\Commands;

// use Illuminate\Console\Command;

// class CustomCommand extends Command
// {
//     protected $signature = 'custom:task';
//     protected $description = 'Descripción de la tarea personalizada';

//     public function handle()
//     {
//         $this->info('Esta es una tarea personalizada ejecutada desde el comando.');
//         // Lógica de la tarea personalizada
//     }
// }
// En este ejemplo, el comando custom:task simplemente imprime un mensaje y puede contener cualquier lógica adicional que desees ejecutar.

// Con estos ejemplos, has definido una tarea programada que se ejecuta todos los días a las 3:00 PM y has registrado un nuevo comando de consola personalizado. Laravel manejará automáticamente la ejecución de la tarea programada y la ejecución del comando de consola cuando sea necesario. Este es solo un ejemplo básico; en situaciones reales, los comandos y las tareas programadas pueden realizar tareas más complejas y específicas para tu aplicación.