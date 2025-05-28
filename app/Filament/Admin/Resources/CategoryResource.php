<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack'; // أو أي icon تريده

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
    Forms\Components\TextInput::make('name')->label('اسم الفئة')->required(),
    Forms\Components\Select::make('type')
        ->options([
            'food' => 'أطعمة',
            'drink' => 'مشروبات',
            'other' => 'أخرى',
            'foam' => 'فلين',
            'plastic' => 'بلاستيك',
            'frozen' => 'مجمدات',
            'canned' => 'معلبات',
            'chicken' => 'دجاج',
            'bread' => 'خبز',
            'cleaning' => 'منظفات',
            'vegetables' => 'خضار',
        ])
        ->required()
        ->label('نوع الفئة'),
]);

    }

    public static function table(Table $table): Table
{
    return $table->columns([
        Tables\Columns\TextColumn::make('id')->label('رقم'),
        Tables\Columns\TextColumn::make('name')->label('الاسم')->searchable(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
