<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    // Ikon orang di menu samping
    protected static ?string $navigationIcon = 'heroicon-o-users';

    // Pengaturan Nama Menu Bahasa Indonesia
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $modelLabel = 'Siswa';
    protected static ?string $pluralModelLabel = 'Data Siswa';
    protected static ?string $navigationGroup = 'Manajemen Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        TextInput::make('nisn')
                            ->label('NISN Siswa')
                            ->required()
                            ->numeric()
                            ->unique(ignoreRecord: true),
                        
                        TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required(),
                        
                        DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->required()
                            ->native(false) // Kalender estetik
                            ->displayFormat('d/m/Y'), // Hapus baris closeOnDateSelect di sini
                        
                        Select::make('status')
                            ->label('Status Kelulusan')
                            ->options([
                                'LULUS' => 'LULUS',
                                'TIDAK LULUS' => 'TIDAK LULUS',
                                'DITUNDA' => 'DITUNDA',
                            ])
                            ->required()
                            ->default('DITUNDA'),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('nama')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tanggal_lahir')
                    ->label('Tgl Lahir')
                    ->date('d/m/Y')
                    ->sortable(),
                    
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'LULUS' => 'success',
                        'TIDAK LULUS' => 'danger',
                        default => 'warning',
                    }),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan di masa depan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Menambah tombol hapus satuan
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}