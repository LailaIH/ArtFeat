<?php

namespace App\Listeners;

use App\Http\Controllers\LandingPage\UserCartsController;
use Illuminate\Auth\Events\Authenticated;

class CreateUserCart
{
    protected $controller;

    public function __construct(UserCartsController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Handle the event.
     *
     * @param  Authenticated  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        $this->controller->migrateCartToDatabase($event->user->id);
    }
}
