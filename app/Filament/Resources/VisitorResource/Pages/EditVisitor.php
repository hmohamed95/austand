<?php

namespace App\Filament\Resources\VisitorResource\Pages;

use App\Filament\Resources\VisitorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisitor extends EditRecord
{
    protected static string $resource = VisitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function getRedirectUrl(): ?string
    {

        $event = $this->record->event;
        if ($event) {
            $url = route('filament.austand.resources.events.view', ['record' => $event->id]);

            return $url;
        }


        return $this->getResource()::getUrl('index');
    }



    public function getBreadcrumbs(): array
    {
        $event = $this->record->event;

        return [
            route('filament.austand.pages.dashboard') => 'Dashboard',
            route('filament.austand.resources.events.index') => 'Events',
            $event
                ? route('filament.austand.resources.events.view', ['record' => $event->id])
                : route('filament.austand.resources.events.index') => $event?->name ?? 'Event',
            url()->current() => 'Edit Visitor',
        ];
    }
}
