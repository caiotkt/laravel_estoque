<?php

namespace App\Listeners;

use App\Events\ProdutoAlterado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProdutoExcluido
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProdutoAlterado  $event
     * @return void
     */
    public function handle(ProdutoAlterado $event)
    {

        $produto = $event->produto;

        \Mail::send('produtos.alterado', ['produto' => $produto], function ($mail) use ($produto) {
            $mail->from('hello@app.com', 'LaraEstoque');
            $mail->to(env('MAIL_ADMIN'), env('MAIL_ADMIN_name'))->subject('Alerta - Produto Excluido');
        });

        dd('Para aqui');

    }
}
