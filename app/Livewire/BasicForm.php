<?php

namespace App\Livewire;

use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class BasicForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('Multi-Select with Grouped Options')
                    ->options([
                            'Group 1' => [
                                    'option_1' => 'Option 1',
                                    'option_2' => 'Option 2',
                                    'option_3' => 'Option 3',
                                    'option_4' => 'Option 4'
                                ],
                            'Group 2' => [
                                'option_5' => 'Option 5',
                                'option_6' => 'Option 6',
                                'option_7' => 'Option 7',
                                'option_8' => 'Option 8',
                        ]
                    ])
                    ->multiple()
                    ->default(['option_2']),
                Select::make('Multi-Select without Grouped Options')
                    ->options([
                        'option_1' => 'Option 1',
                        'option_2' => 'Option 2',
                        'option_3' => 'Option 3',
                        'option_4' => 'Option 4',
                        'option_5' => 'Option 5',
                        'option_6' => 'Option 6',
                        'option_7' => 'Option 7',
                        'option_8' => 'Option 8',
                    ])
                    ->multiple()
                    ->default(['option_2']),

            ])
            ->statePath('data');
    }

    public function create(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.basic-form');
    }
}
