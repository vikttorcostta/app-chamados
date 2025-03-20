<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Doctrine\DBAL\Schema\Exception\TableAlreadyExists;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Usuário';
    protected static ?string $modelLabel = 'Usuário';
    protected static ?string $pluralModelLabel = 'Usuários';
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->translateLabel()
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->translateLabel()
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('password')
                    ->required(fn(string $operation): bool => $operation === 'create')
                    ->translateLabel()
                    ->confirmed()
                    ->required(),
                Forms\Components\TextInput::make('password_confirmation')
                    ->translateLabel()
                    ->requiredWith('password')
                    ->required(),
                Forms\Components\Radio::make('role')
                    ->label('Permissão')
                    ->options([
                        'admin' => 'Administrador',
                        'user' => 'Usuário',
                        'support' => 'Suporte'
                    ])
                    ->inline()
                    ->translateLabel()
                    ->required()
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
                Tables\Columns\TextColumn::make('role')
                    ->label('Permissão')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i:s'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i:s'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
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
        return in_array(Auth::user()->role, ['user','support', 'admin']);
    }
}
