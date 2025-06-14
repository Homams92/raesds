<?php

namespace App\Filament\Resources;

use App\Exports\BookingExport;
use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Daftar Booking';
    protected static ?string $modelLabel = 'Booking';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('car_title')
                ->label('Mobil')
                ->required(),

            Forms\Components\TextInput::make('customer_name')
                ->label('Nama Pelanggan')
                ->required(),

            Forms\Components\TextInput::make('customer_phone')
                ->label('Nomor WhatsApp')
                ->tel()
                ->required(),


            Forms\Components\DatePicker::make('rental_start_date')
                ->label('Tanggal Mulai')
                ->required(),

            Forms\Components\DatePicker::make('rental_end_date')
                ->label('Tanggal Selesai')
                ->after('rental_start_date')
                ->required(),

            Forms\Components\TextInput::make('total_price')
                ->label('Total Harga')
                ->numeric()
                ->required(),

            Forms\Components\Select::make('payment_status')
                ->label('Status Pembayaran')
                ->options([
                    'pending' => 'Pending',
                    'paid' => 'Lunas',
                    'cancelled' => 'Dibatalkan',
                ])
                ->default('pending')
                ->required(),

            Forms\Components\Select::make('payment_method')
                ->label('Metode Pembayaran')
                ->options([
                    'qris' => 'Bayar Sekarang (QRIS)',
                    'cod' => 'Bayar di Tempat',
                ])
                ->required(),

            Forms\Components\FileUpload::make('payment_proof')
                ->label('Bukti Pembayaran')
                ->image()
                ->directory('payment_proofs')
                ->disk('public')
                ->nullable()
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                ->maxSize(2048)
                ->hint('Jika pelanggan belum mengunggah, Anda bisa mengisinya di sini.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('car_title')->label('Mobil'),
                Tables\Columns\TextColumn::make('customer_name')->label('Nama'),
                Tables\Columns\TextColumn::make('customer_phone')->label('WhatsApp'),

                Tables\Columns\TextColumn::make('rental_start_date')->label('Mulai')
                    ->date('d M Y'),
                Tables\Columns\TextColumn::make('rental_end_date')->label('Selesai')
                    ->date('d M Y'),
                Tables\Columns\TextColumn::make('total_price')->label('Harga')
                    ->formatStateUsing(fn ($state) => 'Rp. ' . number_format($state, 0, ',', '.')),

                Tables\Columns\TextColumn::make('payment_method')->label('Metode'),

                Tables\Columns\TextColumn::make('payment_proof')
                    ->label('Bukti')
                    ->url(fn ($record) => $record->payment_proof ? asset('storage/' . $record->payment_proof) : null)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => $state ? '✅ Ada' : '❌ Belum')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'danger'),

                Tables\Columns\TextColumn::make('payment_status')->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'pending' => 'danger',
                        'cancelled' => 'secondary',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'paid' => 'Lunas',
                        'pending' => 'Pending',
                        'cancelled' => 'Dibatalkan',
                        default => ucfirst($state),
                    }),

                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')
                    ->dateTime('d M Y - H:i'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('Status Pembayaran')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Lunas',
                        'cancelled' => 'Dibatalkan',
                    ]),
                Tables\Filters\Filter::make('rental_start_date')
                    ->label('Tanggal Sewa')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('Dari'),
                        Forms\Components\DatePicker::make('to')->label('Sampai'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q, $date) => $q->where('rental_start_date', '>=', $date))
                            ->when($data['to'], fn ($q, $date) => $q->where('rental_start_date', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('Export Excel')
                    ->url('/export-bookings')
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
            'monthly-report' => Pages\MonthlyReport::route('/monthly-report'),
        ];
    }

    public static function getMonthlyBookings()
    {
        return Booking::selectRaw('YEAR(rental_start_date) as year, MONTH(rental_start_date) as month, COUNT(*) as total_bookings, SUM(total_price) as total_revenue')
            ->groupByRaw('YEAR(rental_start_date), MONTH(rental_start_date)')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
    }
}
