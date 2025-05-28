<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube'; // أو أي icon تريده

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('اسم المنتج')->required(),
                Forms\Components\Textarea::make('description')->label('الوصف')->required(),
                Forms\Components\TextInput::make('price')->label('السعر')->numeric()->required(),
                Forms\Components\TextInput::make('wholesale_price')->label('سعر الجملة')->numeric()->required(), // ✅ مضاف هنا
                Forms\Components\Select::make('category_id')->label('الفئة')->relationship('category', 'name')->required(),
                Forms\Components\Toggle::make('is_active')->label('متاح'),
                Forms\Components\TextInput::make('stock')
                ->label('الكمية بالمخزن')
                ->numeric()
                ->required(),

                FileUpload::make('image')
                    ->image()
                    ->directory('products') // الصور تنحفظ بمجلد storage/app/public/products
                     ->disk('public') 
                    ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
    ImageColumn::make('image')
        ->disk('public')
        ->label('صورة المنتج')
        ->url(fn ($record) => asset('storage/' . $record->image)),

    Tables\Columns\TextColumn::make('id')->label('رقم'),
    Tables\Columns\TextColumn::make('name')->label('الاسم')->searchable(),
    Tables\Columns\TextColumn::make('category.name')->label('الفئة'),
    Tables\Columns\TextColumn::make('price')->label('السعر')->money('JOD'),
    Tables\Columns\TextColumn::make('wholesale_price')->label('سعر الجملة')->money('JOD'), // ✅ مضاف هنا
    Tables\Columns\IconColumn::make('is_active')->label('متاح')->boolean(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
