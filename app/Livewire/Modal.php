<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Modal extends Component
{
    public $showModal = false;

    public function render()
    {
        $signs = Auth::user()->signs;

        return view('livewire.modal', [
            'signs' => $signs
        ]);
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
