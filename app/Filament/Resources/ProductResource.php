<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Product')->schema([
                    Select::make('brand_id')
                        ->label('Brand')
                        ->relationship('brand', 'name')
                        ->required()->searchable()
                        ->createOptionForm([
                            TextInput::make('name')->required()
                        ])
                        ->preload(),
                    TextInput::make('name')->required(),
                    Textarea::make('description')->required()->rows(6)->columnSpanFull()
                ])->columns(2),
                Section::make('Specification')->schema([
                    Repeater::make('productSpecItems')->label('Specification Product')->relationship()->schema([
                        TextInput::make('chipset')->required(),
                        Select::make('ram')->label('RAM')->options([
                            '4GB' => '4GB',
                            '8GB' => '8GB',
                            '12GB' => '12GB',
                            '16GB' => '16GB',
                        ]),
                        Select::make('internal_memory')->options([
                            '32GB' => '32GB',
                            '64GB' => '64GB',
                            '128GB' => '128GB',
                            '254GB' => '254GB',
                            '512GB' => '512GB',
                            '1TB' => '1TB',
                            '2TB' => '2TB',
                        ]),
                        Select::make('external_memory')->options([
                            'Kosong' => 'Kosong',
                            '32GB' => '32GB',
                            '64GB' => '64GB',
                            '128GB' => '128GB',
                            '254GB' => '254GB',
                            '512GB' => '512GB',
                            '1TB' => '1TB',
                            '2TB' => '2TB',
                        ]),
                        TextInput::make('cpu')->required()->label('CPU'),
                        TextInput::make('gpu')->required()->label('GPU'),
                        Section::make('Color Specification')->schema([
                            Repeater::make('productSpecColorItems')->label('Color Product')->relationship()->schema([
                                Select::make('color')
                                ->options([
                                    'red' => 'Red',
                                    'white' => 'White',
                                    'black' => 'Black',
                                    'blue' => 'Blue',
                                    'grey' => 'Grey',
                                    'green' => 'Green',
                                    'yellow' => 'Yellow'
                                ]),
                                TextInput::make('qty')->numeric()->label('Quantity'),
                                TextInput::make('selling_price')->numeric(),
                            ])->addActionLabel('Add color')->columns(3)
                        ])
                    ])->addActionLabel('Add specification')->columns(3),
                ]),
                Section::make('Product Image')->schema([
                    FileUpload::make('product_image')
                        ->preserveFilenames()
                        ->multiple()
                        ->directory('product')->required()
                ]),
                Group::make()->schema([


                ])->columnSpan(['lg' => 1]),
                Group::make()->schema([

                ])->columnSpan(['lg' => 3]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('brand.name')->searchable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('updated_at')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make()
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
