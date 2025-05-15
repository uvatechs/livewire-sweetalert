<?php

namespace Uvatechs\LivewireSweetAlert\Tests\Feature;

use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Component;
use Tests\TestCase;
use Uvatechs\LivewireSweetAlert\Traits\WithSweetAlert;

class SweetAlertTest extends TestCase
{
    /** @test */
    public function it_dispatches_swal_event()
    {
        Livewire::test(new class extends Component {
            use WithSweetAlert;
            public function trigger()
            {
                $this->alert('Test', 'It worked', 'success');
            }
            public function render() { return <<<'BLADE' <div></div> BLADE; }
        })
        ->call('trigger')
        ->assertDispatched('swal', [
            'title' => 'Test',
            'text' => 'It worked',
            'icon' => 'success',
        ]);
    }

    /** @test */
    public function it_dispatches_swal_confirm_event()
    {
        Livewire::test(new class extends Component {
            use WithSweetAlert;
            public function trigger()
            {
                $this->confirm('confirmDelete', ['id' => 10], [
                    'title' => 'Confirm?',
                    'text' => 'Are you sure?',
                ]);
            }
            public function render() { return <<<'BLADE' <div></div> BLADE; }
        })
        ->call('trigger')
        ->assertDispatched('swal:confirm', function ($payload) {
            return $payload['title'] === 'Confirm?' &&
                   $payload['text'] === 'Are you sure?' &&
                   $payload['eventToEmit'] === 'confirmDelete' &&
                   $payload['payload']['id'] === 10;
        });
    }

    /** @test */
    public function it_renders_sweet_alert_component()
    {
        $component = Livewire::test(\Uvatechs\LivewireSweetAlert\Components\SweetAlert::class);
        $component->assertStatus(200);
        $component->assertSee('Swal.fire', false);
    }
}