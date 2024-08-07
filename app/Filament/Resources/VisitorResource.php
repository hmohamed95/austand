<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Filament\Resources\VisitorResource\RelationManagers;
use App\Models\Visitor;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';



    public static function form(Form $form): Form
    {


        $event = request('event');


        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                ->visible(!$event?->exists)
                ->relationship('event', 'title')
                ->columnSpanFull(),


                Grid::make('visitor_info')
                    ->label('Visitor Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                        ->required()
                        ->autocomplete(false),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->autocomplete(false),
                    Forms\Components\TextInput::make('phone')
                        ->tel()
                        ->autocomplete(false)
                    ])->columns(3),


                    //radio buttons for program type,


                //Program Grid

                Grid::make('Programs_grid')
                    ->label('Show Programs for college:')
                    ->schema([
                        Forms\Components\Select::make('college_filter')
                        ->label('College')
                        ->options(\App\Models\College::all()->pluck('name', 'id'))
                        ->placeholder('All Colleges\'s Programs')
                        ->reactive(),

                        //CheckBox list filtered
                        Forms\Components\CheckboxList::make('programs')
                        ->relationship('programs', 'name')
                        ->label('Programs')
                        ->options(function (callable $get) {

                            $collegeFilter = $get('college_filter');

                            if (!is_numeric($collegeFilter)) {
                                return \App\Models\Program::all()->pluck('name', 'id');
                            }
                            else
                            {
                                return \App\Models\Program::forCollege($collegeFilter)->get()->pluck('name', 'id');
                            }
                        })


                    ])
                    ->columns(['lg'=>2, 'md'=>1, 'sm'=>1]),


                Forms\Components\Textarea::make('remark')->columnSpanFull(),


                Forms\Components\Toggle::make('enrolled')
                    ->required(),
                Forms\Components\Toggle::make('called')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event.title')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('remark')
                    ->searchable(),

                Tables\Columns\IconColumn::make('enrolled')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\IconColumn::make('called')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: false),


                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->label('Added By')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

                Filter::make('called')
                    ->label('Called')
                    ->query(fn ($query) => $query->where('called', true)),

                Filter::make('enrolled')
                    ->label('Enrolled')
                    ->query(fn ($query) => $query->where('enrolled', true)),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitors::route('/'),
            'createForEvent' => Pages\CreateVisitor::route('/create/{event}'),
            'create' => Pages\CreateVisitor::route('/create'),
            'edit' => Pages\EditVisitor::route('/{record}/edit'),

        ];
    }



    //filtered program list
    public static function programList($college_id)
    {
        return \App\Models\Program::forCollege($college_id)->get();
    }





}
