<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Filament\Resources\VisitorResource;
use App\Models\Event;
use Filament\Tables\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\Summarizers\Count;
use Illuminate\Database\Query\Builder;

class ListVisitors extends ListRecords
{
    protected static string $resource = VisitorResource::class;

    public Event $record;


    //getTitle function for dynamic title to view event title
    public function getTitle(): string | Htmlable
    {
        //get {record} from the url
        return $this->record->title;
    }


    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->where('event_id', $this->record->id))
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('phone')
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('programs.short_name')
                ->label('Programs'),


                TextColumn::make('remark')
                    ->searchable(),


                IconColumn::make('called')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Added by')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('count')
                    ->label('')
                    ->summarize(Count::make()->query(fn (Builder $query) => $query))

            ])->filters([
                //called, added by, program

                Filter::make('called')
                    ->label('Called')
                    ->query(fn ($query) => $query->called(true))


            ])->defaultSort('created_at', 'desc')
            ->headerActions([
                Action::make('new')
                    ->label('Add Visitor')
                    ->icon('heroicon-o-plus')
                    ->url(route('filament.austand.resources.visitors.createForEvent', ['event' => request('record')])),
            ]);


    }



}
