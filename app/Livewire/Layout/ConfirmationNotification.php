<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Livewire\Attributes\On;

class ConfirmationNotification extends Component
{
    public $showConfirmationOverlay = false;
    public $negativeButtonName = null;
    public $neutralButtonName = null;
    public $positiveButtonName = null;
    public $title = null;
    public $message = null;
    public $key;
    public $with;

    public function negative()
    {
        $this->showConfirmationOverlay = false;
        if (isset($this->with))
            $this->dispatch($this->key . '_negative', with: $this->with);
        else
            $this->dispatch($this->key . '_negative');
        $this->dispatch('showItemTemplate');
    }

    public function neutral()
    {
        $this->showConfirmationOverlay = false;
        if (isset($this->with))
            $this->dispatch($this->key . '_neutral', with: $this->with);
        else
            $this->dispatch($this->key . '_neutral');
    }

    public function positive()
    {
        $this->showConfirmationOverlay = false;
        if (isset($this->with))
            $this->dispatch($this->key . '_positive', with: $this->with);
        else
            $this->dispatch($this->key . '_positive');
    }

    #[On('confirmationOverlay')]
    public function revealConfirmationOverlay($data)
    {
        if (isset($data['negative']))
            $this->negativeButtonName = $data['negative'];

        if (isset($data['neutral']))
            $this->neutralButtonName = $data['neutral'];

        if (isset($data['positive']))
            $this->positiveButtonName = $data['positive'];

        if (isset($data['title']))
            $this->title = $data['title'];

        if (isset($data['message']))
            $this->message = $data['message'];

        if (isset($data['with']))
            $this->with = $data['with'];

        if (isset($data['key']))
            $this->key = $data['key'];
        $this->showConfirmationOverlay = true;
    }

    public function render()
    {
        return view('livewire.layout.confirmation-notification');
    }
}
