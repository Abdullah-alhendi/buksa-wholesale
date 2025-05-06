<?php
namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\OrderItemsRelationManager;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart'; // أو أي icon تريده

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('phone'),
            Forms\Components\TextInput::make('address'),
            Forms\Components\Select::make('payment_method')
                ->options([
                    'cash' => 'Cash',
                    'card' => 'Card',
                ])->required(),
            Forms\Components\Select::make('payment_status')
                ->options([
                    'pending' => 'Pending',
                    'paid' => 'Paid',
                    'cancelled' => 'Cancelled',
                ])->required(),
            Forms\Components\TextInput::make('total')->numeric()->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->label('ID')->sortable(),
            TextColumn::make('user.name')->label('User'),
            TextColumn::make('total')->label('Total')->money('JOD'),
            TextColumn::make('payment_status')->badge()
                ->colors([
                    'pending' => 'warning',
                    'paid' => 'success',
                    'cancelled' => 'danger',
                ]),
            TextColumn::make('created_at')->label('Created')->dateTime(),
        ])
        ->filters([
            Filter::make('paid')->query(fn ($q) => $q->where('payment_status', 'paid')),
            Filter::make('pending')->query(fn ($q) => $q->where('payment_status', 'pending')),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            OrderItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
