<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RuanganResource\Pages;
use App\Filament\Resources\RuanganResource\RelationManagers;
use App\Models\Ruangan;
use Closure;
use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RuanganResource extends Resource
{
    protected static ?string $model = Ruangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_ruang')
                ->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                })->required(),
                TextInput::make('slug')->required(),
                Select::make('gedung_id')
                ->relationship('gedung', 'nama_gedung'),
                TextInput::make('lantai')->required(),
                TextInput::make('kapasitas')->required(),
                TextInput::make('tipe_ruangan')->required(),
                TextInput::make('kondisi_ruangan')->required(),
                TextInput::make('unit_kerja')->required(),
                FileUpload::make('foto')
                ->disk('local')
                ->directory('public/foto-ruangan'),
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
                TextColumn::make('nama_ruang'),
                TextColumn::make('gedung.nama_gedung'),
                TextColumn::make('lantai'),
                TextColumn::make('kapasitas'),
                TextColumn::make('tipe_ruangan'),
                TextColumn::make('kondisi_ruangan'),
                TextColumn::make('unit_kerja'),
                ImageColumn::make('foto')->disk('local'),
                ToggleColumn::make('bisa_pinjam')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListRuangans::route('/'),
            'create' => Pages\CreateRuangan::route('/create'),
            'edit' => Pages\EditRuangan::route('/{record}/edit'),
        ];
    }    
}
