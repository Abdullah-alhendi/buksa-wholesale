<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group'; // أو أي icon تريده

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('الاسم')->required(),
                Forms\Components\TextInput::make('email')->label('الإيميل')->email()->required(),
                Forms\Components\Select::make('role')->label('الدور')->options([
                    'admin' => 'مدير',
                    'user' => 'مستخدم',
                ])->default('user')->required(),
                Forms\Components\Toggle::make('is_active')->label('نشط'),
            ]);
    }

   
public static function table(Table $table): Table
{
    return $table->columns([
        Tables\Columns\TextColumn::make('id')->label('رقم'),
        Tables\Columns\TextColumn::make('name')->label('الاسم')->searchable(),
        Tables\Columns\TextColumn::make('email')->label('الإيميل'),
        Tables\Columns\TextColumn::make('role')->label('الدور'),
        Tables\Columns\IconColumn::make('is_active')->label('نشط')->boolean(),
        Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime(),
    ])
    ->actions([
        Tables\Actions\ViewAction::make(),
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
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
        ];
    }
}
