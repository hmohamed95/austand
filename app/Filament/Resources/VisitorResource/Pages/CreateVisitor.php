<?php

namespace App\Filament\Resources\VisitorResource\Pages;

use App\Filament\Resources\VisitorResource;
use App\Models\Event;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateVisitor extends CreateRecord
{
    protected static string $resource = VisitorResource::class;

    public ?Event $event = null;

    public function getTitle(): string | Htmlable
    {


        if ($this->event) {
            return "Create Visitor for {$this->event->title}";
        }
        else
        {
            return 'Create Visitor';
        }
    }

    public function getSubheading(): Htmlable|string|null
    {

        if ($this->event) {
            return "{$this->event->start_date->format('d-F-Y')} - {$this->event->end_date->format('d-F-Y')}";
        }
        else
        {
            return null;
        }
    }





    protected function mutateFormDataBeforeCreate(array $data): array
    {


        if ($this->event) {
            $data['event_id'] = $this->event->id;
        }

        $data['user_id'] = auth()->id();
        return $data;
    }





}

