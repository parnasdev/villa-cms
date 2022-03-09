<?php

namespace Packages\Villa\src\Http\Livewire\Admin;

use App\Http\Extra\TableFunction;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class ListPage extends Component
{
    public function mount()
    {

    }

    public function render()
    {

        return view('Villa::Livewire.Admin.ListPage');
    }
}
