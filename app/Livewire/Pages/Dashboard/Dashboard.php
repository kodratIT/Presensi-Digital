<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;

class Dashboard extends Component
{
    public $breadcrumb ="Dashboard";
    
    public $title ="Dashboard";

    public function render()
    {
        return view('livewire.pages.dashboard.dashboard');
    }
}
