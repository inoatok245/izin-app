<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IzinResource\Pages;
use App\Models\Izin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;

class IzinResource extends Resource
{
    protected static ?string $model = Izin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('user_id')
                ->relationship('user', 'name')
                ->label('Karyawan')
                ->disabled(),

            TextInput::make('alasan')
                ->label('Alasan Izin')
                ->disabled(),

            DatePicker::make('tanggal_mulai')
                ->label('Tanggal Mulai')
                ->disabled(),

            DatePicker::make('tanggal_selesai')
                ->label('Tanggal Selesai')
                ->disabled(),

            FileUpload::make('file_bukti')
                ->label('Bukti (opsional)')
                ->directory('izin_files')
                ->preserveFilenames()
                ->downloadable()
                ->openable()
                ->disabled(),

            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'disetujui' => 'Disetujui',
                    'ditolak' => 'Ditolak',
                ])
                ->default('pending')
                ->label('Status')
                ->required(),

            Textarea::make('komentar_admin')
                ->label('Komentar Admin')
                ->nullable()
                ->rows(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama Karyawan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('alasan')
                    ->label('Alasan')
                    ->limit(30)
                    ->wrap(),

                TextColumn::make('tanggal_mulai')
                    ->label('Mulai'),

                TextColumn::make('tanggal_selesai')
                    ->label('Selesai'),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => 'pending',
                        'success' => 'disetujui',
                        'danger' => 'ditolak',
                    ])
                    ->sortable(),
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
            'index' => Pages\ListIzins::route('/'),
            // Hilangkan halaman create
            //'create' => Pages\CreateIzin::route('/create'),
            'edit' => Pages\EditIzin::route('/{record}/edit'),
        ];
    }

    // Admin tidak bisa create izin
    public static function canCreate(): bool
    {
        return false;
    }
}
