<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Filament\Resources\SaleResource\RelationManagers;
use App\Models\Sale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.productSpecColorItem.productSpecItem.product.brand.name')->label('Brand')->searchable(),
                TextColumn::make('order.productSpecColorItem.productSpecItem.product.name')->label('Product')->searchable(),
                TextColumn::make('order.productSpecColorItem.productSpecItem.ram')->label('RAM')->searchable(),
                TextColumn::make('order.productSpecColorItem.productSpecItem.internal_memory')->label('Internal Memory')->searchable(),
                ToggleColumn::make('awaiting'),
                ToggleColumn::make('processed'),
                ToggleColumn::make('shipping'),
                ToggleColumn::make('delivered'),
            ])
            ->filters([
                Filter::make('awaiting')
                    ->query(fn (Builder $query): Builder => $query->where('awaiting', true)),
                Filter::make('processed')
                    ->query(fn (Builder $query): Builder => $query->where('awaiting', true)),
                Filter::make('shipping')
                    ->query(fn (Builder $query): Builder => $query->where('awaiting', true)),
                Filter::make('delivered')
                    ->query(fn (Builder $query): Builder => $query->where('awaiting', true)),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }
}
