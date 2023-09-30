<?php

namespace App\Console;

use App\Models\ClientCreditScore;
use App\Models\Configuracion;
use App\Models\Credito;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('backup:clean')->daily()->at('10:47');
        $schedule->command('backup:run')->daily()->at('10:48');
        $schedule->call(function () {
            $configuracion = Configuracion::first();
            $days = $configuracion->dias_gracia + 30;
            $creditos = Credito::whereRaw("DATEDIFF('" . Carbon::now()->format('Y-m-d') . "', creditos.ultima_fecha_pago) >= " . $days . " AND creditos.saldo_capital<>0")->get();

            $lateAccs = new Collection();

            foreach ($creditos as $cr) {
                $found = false;

                foreach ($lateAccs as &$lt) {
                    if ($lt['id_cliente'] == $cr->id_cliente) {
                        if ($lt['delincuent_days'] < Carbon::now()->diffInDays($cr->ultima_fecha_pago)) {
                            $lt['delincuent_days'] = Carbon::now()->diffInDays($cr->ultima_fecha_pago);
                        }
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $lateAccs[] = [
                        'id_cliente' => $cr->id_cliente,
                        'ultima_fecha_pago' => $cr->ultima_fecha_pago,
                        'delincuent_days' => Carbon::now()->diffInDays($cr->ultima_fecha_pago)
                    ];
                }
            }

            $lateAccs = new Collection($lateAccs);

            foreach ($lateAccs as $lta) {
                $record = ClientCreditScore::where('id_cliente', $lta['id_cliente'])->first();
                if ($record != null) {
                    if ($lta['delincuent_days'] <= 3) {
                        $record->score = "A2";
                    } else if ($lta['delincuent_days'] > 3 && $lta['delincuent_days'] <= 90) {
                        $record->score = "B";
                    } else if ($lta['delincuent_days'] > 90) {
                        $record->score = "C";
                    } else {
                        $record->score = "A1";
                    }
                    $record->save();
                } else {
                    $newrec = new ClientCreditScore();
                    $newrec->id_cliente = $lta['id_cliente'];
                    if ($lta['delincuent_days'] <= 3) {
                        $newrec->score = "A2";
                    } else if ($lta['delincuent_days'] > 3 && $lta['delincuent_days'] <= 90) {
                        $newrec->score = "B";
                    } else if ($lta['delincuent_days'] > 90) {
                        $newrec->score = "C";
                    } else {
                        $newrec->score = "A1";
                    }
                    $newrec->save();
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
