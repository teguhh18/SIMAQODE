<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;
use Closure;
// use Filament\Forms\Components\Actions\Modal\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;


class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('ruangan_id')
            ->relationship('ruangan', 'nama_ruang')->required(),

            TextInput::make('kode_barang')->required(),
            TextInput::make('nama_barang')
            ->reactive()
            ->afterStateUpdated(function (Closure $set, $state) {
                $set('slug', Str::slug($state));
            })->required(),
            TextInput::make('slug')->required(),
            
            TextInput::make('penanggung_jawab')->required(),
            DatePicker::make('tanggal_beli')->required(),
            TextInput::make('nilai_perolehan')->required(),
            TextInput::make('kondisi_barang')->required(),
            TextInput::make('status')->required(),
            FileUpload::make('foto')
            ->disk('local')
            ->directory('public/foto-barang'),
            Toggle::make('bisa_pinjam')->required(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->getStateUsing(
                    static function ( $rowLoop, HasTable $livewire): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * (
                                $livewire->page - 1
                            ))
                        );
                    }
                ),
                TextColumn::make('kode_barang'),
                TextColumn::make('nama_barang'),
                TextColumn::make('ruangan.nama_ruang'),
                TextColumn::make('penanggung_jawab'),
                TextColumn::make('tanggal_beli')->date(),
                TextColumn::make('nilai_perolehan'),
                TextColumn::make('kondisi_barang'),
                TextColumn::make('status'),
                ImageColumn::make('foto')->disk('local'),
                ToggleColumn::make('bisa_pinjam')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('View Qr Code')
                ->icon('heroicon-o-qrcode')
                ->url(fn (Barang $record) => static::getUrl('qr-code', $record))
                // ->openUrlInNewTab(),
                
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
            'qr-code' => Pages\ViewQrCode::route('/{record}/qr-code'),
        ];
    }    
}
