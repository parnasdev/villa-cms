<?php

namespace Packages\Villa\src\Http\Livewire\Home;

use Livewire\Component;
use Packages\Villa\src\Models\Residence;

class IndexPage extends Component
{
     public function render()
     {
         $residences = Residence::query()->get();

         return view('Villa::Livewire.Home.indexPage', compact('residences'));
     }
}
