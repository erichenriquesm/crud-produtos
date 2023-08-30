<?php
namespace App\Observer;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
    /**
     * Handle the User "created" event.
     *
     * @return void
     */
    public function created(Product $product)
    {
        Log::debug(['criou!!!!' => $product->toArray()]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(Product $product)
    {
        // Ação executada após atualizar um usuário
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(Product $product)
    {
        // Ação executada após excluir um usuário
    }
}