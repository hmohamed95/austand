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
        if($event){
           $url = route('filament.austand.resources.events.view', ['record' => $event->id]);

              return $url;
        }


        return $this->getResource()::getUrl('index');
    }



}
