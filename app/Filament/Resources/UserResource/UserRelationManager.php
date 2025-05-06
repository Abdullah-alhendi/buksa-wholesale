<?php

namespace App\Filament\Resources\OrderResource;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;

class UserRelationManager extends RelationManager
{
    protected static string $relationship = 'user';

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('اسم المستخدم'),
                TextColumn::make('email')->label('البريد الإلكتروني'),
            ]);
    }
}
