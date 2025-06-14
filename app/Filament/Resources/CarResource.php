<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Merek')
                    ->required()
                    ->maxLength(255)
                    ->live(debounce:'1000')
                    ->afterStateUpdated(function($set, $state){
                        $set('slug', str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\FileUpload::make('thumbnail') 
                    ->label('Foto')
                    ->image()
                    ->directory('thumbnails')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('mil')
                    ->label('Jarak Tempuh')
                    ->required(),
                Forms\Components\TextInput::make('transmission')
                    ->label('Transmisi')
                    ->required(),
                Forms\Components\TextInput::make('seats')
                    ->label('Kursi')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('fuel')
                    ->label('Bahan Bakar')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                    Forms\Components\Select::make('status')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'tidak tersedia' => 'Tidak Tersedia',
                    ])
                    ->default('tersedia')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Merek')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')->disk('public')
                    ->label('foto'),
                Tables\Columns\TextColumn::make('price')
                ->label('Harga')
                ->sortable()
                ->formatStateUsing(fn ($state) => 'Rp. ' . number_format($state, 0, ',', '.')), // Format harga Rp. 375.000
                Tables\Columns\TextColumn::make('transmission')
                    ->label('Transmisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'tersedia' => 'success',
                        'tidak tersedia' => 'danger',
                        default => 'blue',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
