<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Category;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;
    protected static ?string $navigationLabel = 'Ticket';
    protected static ?string $modelLabel = 'Ticket';
    protected static ?string $pluralModelLabel = 'Tickets';
    protected static ?string $navigationIcon = 'heroicon-o-ticket';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Título')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Select::make('category_id')
                    ->label('Categoria')
                    ->required()
                    ->relationship('category', 'name'),
                Select::make('user_id')
                    ->label('Autor')
                    ->relationship('user', 'name')
                    ->default(Auth::id())
                    ->disabled(),
                Hidden::make('user_id')
                    ->default(Auth::id())
                    ->required(),
                Textarea::make('description')
                    ->label('Descrição')
                    ->translateLabel(),
                DatePicker::make('opened_at')
                    ->label('Data de Abertura')
                    ->default(Carbon::now())
                    ->disabled()
                    ->translateLabel(),
                Hidden::make('opened_at')
                    ->default(Carbon::now())
                    ->required(),
                DatePicker::make('closed_at')
                    ->label('Data de Fechamento')
                    ->hidden(fn (callable $get) => empty($get('opened_at'))) // Exibe apenas se "opened_at" estiver preenchido
                    ->translateLabel(),
                Radio::make('priority')
                    ->label('Prioridade')
                    ->options([
                        'low' => 'Baixa',
                        'medium' => 'Media',
                        'high' => 'Alta',
                    ])
                    ->required()
                    ->inline()
                    ->translateLabel(),
                Radio::make('status')
                    ->label('Status')
                    ->options([
                        'open' => 'Aberto',
                        'in_progress' => 'Em andamento',
                        'resolved' => 'Resolvido',
                        'closed' => 'Fechado',
                    ])
                    ->required()
                    ->inline()
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Autor'),
                TextColumn::make('name')
                    ->label('Título')
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label('Categoria')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Descrição')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->description)
                    ->wrap()
                    ->searchable(),
                TextColumn::make('opened_at')
                    ->label('Aberto em')
                    ->dateTime('d/m/Y'),
                TextColumn::make('closed_at')
                    ->label('Fechado em')
                    ->dateTime('d/m/Y'),
                TextColumn::make('priority')
                    ->label('Prioridade')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->translateLabel()
                    ->searchable(),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
            'view' => Pages\ViewTicket::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return in_array(Auth::user()->role, ['user', 'support', 'admin']);
    }

    public static function canViewAny(): bool
    {
        return in_array(Auth::user()->role, ['user','support', 'admin']);
    }

    public static function canEdit($record): bool
    {
        return in_array(Auth::user()->role, ['support', 'admin']);
    }

    public static function canDelete($record): bool
    {
        return in_array(Auth::user()->role, ['support', 'admin']);
    }


}
