<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResponseResource\Pages;
use App\Filament\Resources\ResponseResource\RelationManagers;
use App\Models\Response;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class ResponseResource extends Resource
{
    protected static ?string $model = Response::class;

    protected static ?string $navigationLabel = 'Respostas';
    protected static ?string $modelLabel = 'Resposta';
    protected static ?string $pluralModelLabel = 'Respostas';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('ticket_id')
                    ->label('Ticket')
                    ->relationship('ticket', 'name')
                    ->required()
                    ->translateLabel(),
                Select::make('user_id')
                    ->label('Autor')
                    ->translateLabel()
                    ->default(Auth::id())
                    ->relationship('user', 'name')
                    ->disabled()
                    ->required(),
                Hidden::make('user_id')
                    ->default(Auth::id())
                    ->required(),
                Textarea::make('message')
                    ->label('Mensagem')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                DateTimePicker::make('date')
                    ->label('Data')
                    ->translateLabel('Data')
                    ->default(Carbon::now())->format('d/m/Y')
                    ->disabled()
                    ->required(),
                Hidden::make('date')
                    ->default(Carbon::now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ticket.name')
                    ->label('Ticket')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Autor')
                    ->sortable(),
                TextColumn::make('date')
                    ->label('Criado em')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListResponses::route('/'),
            'create' => Pages\CreateResponse::route('/create'),
            'edit' => Pages\EditResponse::route('/{record}/edit'),
            'view' => Pages\ViewResponse::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return in_array(Auth::user()->role, ['user','support', 'admin']);
    }

    public static function canViewAny(): bool
    {
        return in_array(Auth::user()->role, ['user','support', 'admin']);
    }

    public static function canEdit($record): bool
    {
        return in_array(Auth::user()->role, ['user','support', 'admin']);
    }

    public static function canDelete($record): bool
    {
        return in_array(Auth::user()->role, ['support', 'admin']);
    }
}
