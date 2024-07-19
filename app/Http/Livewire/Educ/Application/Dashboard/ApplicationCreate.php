<?php

namespace App\Http\Livewire\Educ\Application\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\EducInstitution;
use App\EducInstitutionProgram;
use App\EducApplication;

class ApplicationCreate extends Component
{
    public $customer; 

    public $educ_institution_id;
    public $educ_institution_program_id;

    public $educInstitutions;
    public $selectedEducInstitution = null;

    public function render()
    {
        $this->educInstitutions = EducInstitution::all();

        return view('livewire.educ.application.dashboard.application-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'educ_institution_program_id' => 'required',
        ]);

        $validatedData['status'] = 'new';

        $validatedData['customer_id'] = $this->customer->customer_id;
        $validatedData['creator_id'] = Auth::id();

        EducApplication::create($validatedData);

        $this->emit('educApplicationCreateCompleted');
    }

    public function selectEducInstitution()
    {
        $this->selectedEducInstitution = EducInstitution::find($this->educ_institution_id);
    }
}
