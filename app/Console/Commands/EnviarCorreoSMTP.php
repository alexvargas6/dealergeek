<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EnviarCorreoSMTP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'correo:enviar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar un correo usando SMTP';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Configuración para el envío
        $smtpServer = 'smtp.mailgun.org';
        $username =
            'postmaster@sandboxdf2313ef21fb4d15a3040295b24ddd27.mailgun.org';
        $password = 'e44222a75a42f8c5e1210708190f0b93-77316142-f2dbf5df';
        $recipient = 'alxdeosandrock@gmail.com';
        $subject = 'Hello';
        $body = 'Testing some Mailgun awesomeness!';

        // Construir el comando swaks
        $command = "./swaks --auth --server $smtpServer --au $username --ap $password --to $recipient --h-Subject: \"$subject\" --body '$body'";

        // Ejecutar el comando
        exec($command, $output, $returnValue);

        // Mostrar los resultados
        $this->info("Comando ejecutado con código de salida: $returnValue");
        $this->info('Salida: ' . implode("\n", $output));

        return 0;
    }
}
