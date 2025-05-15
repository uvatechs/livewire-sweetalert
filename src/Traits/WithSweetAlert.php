<?php

namespace Uvatechs\LivewireSweetAlert\Traits;

trait WithSweetAlert
{
    public function alert(string $title = 'Success', string $text = '', string $icon = 'success'): void
    {
        $this->dispatch('swal', compact('title', 'text', 'icon'));
    }

    public function confirm(string $eventToEmit, array $payload = [], array $options = []): void
    {
        $default = [
            'title' => 'Are you sure?',
            'text' => '',
            'icon' => 'warning',
            'confirmButtonText' => 'Yes',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => true,
            'eventToEmit' => $eventToEmit,
            'payload' => $payload,
        ];

        $this->dispatch('swal:confirm', array_merge($default, $options));
    }
}