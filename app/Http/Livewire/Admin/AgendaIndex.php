<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin\Agenda;

class AgendaIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $agendas = Agenda::select('users.name','agendas.*')
            ->join('users','users.id','=','agendas.employee_id')
            ->where('users.name','LIKE','%'.$this->search.'%')
            ->latest('agendas.end_date')
            ->paginate(10);

        return view('livewire.admin.agenda-index', compact('agendas'));
    }
}
