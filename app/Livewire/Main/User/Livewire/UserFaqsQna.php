<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class UserFaqsQna extends Component
{
    public function render()
    {
        $faqs = FAQ::all();
        return view('livewire.main.user.livewire.user-faqs-qna', ['faqs' => $faqs]);
    }
}
