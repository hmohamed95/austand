<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ViewRecord;

class ViewEvent extends ViewRecord
{
    protected static string $resource = EventResource::class;


    public function form(Form $form): Form
    {
        return $form->schema([]);
    }


    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Create Visitor')
                ->label('Create Visitor')
                ->url(fn() => route('filament.austand.resources.visitors.createForEvent', ['event' => $this->record->id]))
                ->color('primary'),
        ];
    }
}
