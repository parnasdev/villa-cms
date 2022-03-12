<?php

namespace Packages\Villa\src\Http\Livewire\Admin;

use App\Http\Extra\TableFunction;
use App\Models\Status;
use Packages\Villa\src\Models\Residence;
use Livewire\Component;
use Livewire\WithPagination;

class ListPage extends Component
{
    use TableFunction , WithPagination;

    public $paginationTheme = 'bootstrap';

    protected $listeners = ['delete' , 'forceDelete'  , 'restore' , 'selectedAction'];

    public $perPage = 15;
    public $orderCol = 'created_at';
    public $ordering = 'desc';
    public $selected = [];
    public $status = '0';
    public $action = 0;
    public $trash = 0;
    public $q = '';

    protected $queryString = ['perPage' => ['except' => 15] , 'status' => ['except' => '0'] , 'q' => ['except' => ''] , 'trash' => ['except' => 0] , 'orderCol', 'ordering'];

    public function mount()
    {
        $this->model = 'Packages\Villa\src\Models\Residence';
        $this->softDelete = true;
    }

    public function render()
    {
        $conditions = [array('condition' => 'where' , 'key' => 'status_id' , 'value' => $this->status , 'except' => 0) , array('condition' => 'where' , 'key' => 'specifications' , 'value' => 'page' , 'except' => null) , array('condition' => 'order' , 'key' => $this->orderCol , 'value' => $this->ordering , 'except' => null)];
        if ($this->trash) {
            $conditions = array_merge($conditions , [array('condition' => 'trash' , 'key' => 'd' , 'value' => null , 'except' => null)]);
        }
        $posts = $this->getData($this->perPage , $this->q , collect($conditions));
        $statuses = Status::query()->where('type' , 1)->get();
        $perPages = [15 , 30 , 45 , 50];

        return view('Villa::Livewire.Admin.ListPage', compact('posts' , 'statuses' , 'perPages'));
    }


    public function actionMessage()
    {
        // TODO: Implement actionMessage() method.
    }

    public function selectedAction()
    {
        // TODO: Implement selectedAction() method.
    }
}
