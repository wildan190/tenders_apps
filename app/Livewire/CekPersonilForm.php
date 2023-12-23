// app/Http/Livewire/CekPersonilForm.php

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CekPersonilForm extends Component
{
    public $members = [];

    public function addMember()
    {
        $this->members[] = '';
    }

    public function removeMember($index)
    {
        unset($this->members[$index]);
        $this->members = array_values($this->members);
    }

    public function render()
    {
        return view('livewire.cek-personil-form');
    }
}
