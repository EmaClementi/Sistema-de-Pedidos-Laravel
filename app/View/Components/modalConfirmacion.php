<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modalConfirmacion extends Component
{
    public $message;
    public $action;

    /**
     * Crear una nueva instancia del componente.
     *
     * @param  string  $message
     * @param  string  $action
     * @return void
     */
    public function __construct($message, $action)
    {
        $this->message = $message;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-confirmacion');
    }
}
