<?php

namespace App\Filament\Resources\BarangResource\Pages;

use App\Filament\Resources\BarangResource;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\ViewRecord;

class ViewQrCode extends ViewRecord
{
    protected static string $resource = BarangResource::class;

    protected static string $view = 'filament.resources.barang-resource.pages.view-qr-code';
}
