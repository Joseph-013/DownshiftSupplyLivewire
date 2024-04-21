<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use App\Models\Transaction;
use Livewire\Component;

class NotificationBadgeResponsive extends Component
{
    public $countProcessing;
    public $countCompleted;

    #[On('updateBadge')]
    public function mount()
    {
        $this->countProcessing = $this->getProcessingTransactionsCount();
        $this->countCompleted = $this->getCompletedTransactionsCount();
    }

    public function render()
    {
        return view('livewire.notification-badge-responsive');
    }

    public function getProcessingTransactionsCount()
    {
        return Transaction::where('status', 'Processing')->count();
    }

    public function getCompletedTransactionsCount()
    {
        return Transaction::where('status', 'Completed')
                            ->where('viewedByAdmin', null)->count();
    }
}
