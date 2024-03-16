<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GedungResource\Pages;
use App\Filament\Resources\GedungResource\RelationManagers;
use App\Models\Gedung;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GedungResource extends Resource
{
    protected static ?string $model = Gedung::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                TextInput::make('kode_gedung')->required(),
                TextInput::make('nama_gedung')
                ->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                })->required(),
                TextInput::make('slug')->required(),
                TextInput::make('sumber_dana'),
                TextInput::make('lokasi_kampus')->required(),
                TextInput::make('nilai_perolehan'),
                TextInput::make('tahun_perolehan'),
                FileUpload::make('foto')
                ->disk('local')
                ->directory('public/foto-gedung')
                ])
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
                TextColumn::make('kode_gedung'),
                TextColumn::make('nama_gedung'),
                TextColumn::make('sumber_dana'),
                TextColumn::make('lokasi_kampus'),
                TextColumn::make('nilai_perolehan'),
                TextColumn::make('tahun_perolehan'),
                ImageColumn::make('foto')->disk('local')
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
            'index' => Pages\ListGedungs::route('/'),
            'create' => Pages\CreateGedung::route('/create'),
            'edit' => Pages\EditGedung::route('/{record}/edit'),
        ];
    }    
}
