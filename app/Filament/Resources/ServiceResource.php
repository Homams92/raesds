<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Layanan';
    protected static ?string $pluralModelLabel = 'Layanan';
    protected static ?string $modelLabel = 'Layanan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Judul')
                ->required(),

            Forms\Components\Textarea::make('description')
                ->label('Deskripsi')
                ->nullable(),

            Forms\Components\Select::make('category')
                ->label('Kategori')
                ->options([
                    'wedding' => 'Wedding',
                    'tour' => 'Paket Wisata',
                    'airport' => 'Antar Jemput Bandara',
                    'city' => 'Dalam Kota',
                ])
                ->required(),

            Forms\Components\FileUpload::make('thumbnail')
                ->label('Thumbnail')
                ->disk('public')
                ->directory('services')
                ->image()
                ->nullable(),

            Forms\Components\TextInput::make('price')
                ->label('Harga')
                ->numeric()
                ->nullable(),

            Forms\Components\Select::make('status')
                ->label('Status')
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
                    ->label('Judul')
                    ->searchable(),

                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->formatStateUsing(fn($state) => $state ? 'Rp. ' . number_format($state, 0, ',', '.') : '-'),

                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Gambar'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'tersedia' => 'success',
                        'tidak tersedia' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->date('d M Y'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}