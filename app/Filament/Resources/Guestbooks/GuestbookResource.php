<?php

namespace App\Filament\Resources\Guestbooks;

use App\Filament\Resources\Guestbooks\Pages\CreateGuestbook;
use App\Filament\Resources\Guestbooks\Pages\EditGuestbook;
use App\Filament\Resources\Guestbooks\Pages\ListGuestbooks;
use App\Filament\Resources\Guestbooks\Schemas\GuestbookForm;
use App\Filament\Resources\Guestbooks\Tables\GuestbooksTable;
use App\Models\Guestbook;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class GuestbookResource extends Resource
{
    protected static ?string $model = Guestbook::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $form): Schema
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),

                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('is_approved')
                    ->label('Approved for Public Display')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('message')->limit(50),
                IconColumn::make('is_approved')->boolean(),
                TextColumn::make('created_at')->dateTime()->sortable(),
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
            'index' => ListGuestbooks::route('/'),
            'create' => CreateGuestbook::route('/create'),
            'edit' => EditGuestbook::route('/{record}/edit'),
        ];
    }
}
