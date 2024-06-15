<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $title;
    public $size;

    /**
     * Membuat instance komponen baru.
     *
     * @return void
     */
    public function __construct($id = null, $title = null, $size = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->size = $size;
    }

    /**
     * Mendapatkan view / konten yang mewakili komponen.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}