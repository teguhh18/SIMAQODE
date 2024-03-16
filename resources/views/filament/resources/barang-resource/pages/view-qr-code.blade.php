<x-filament::page>
{{-- {{ dd($record) }} --}}

{{-- {!! QrCode::size(300)->generate($record->nama_barang) !!} --}}

{!! QrCode::size(300)->generate(
    "Nama Barang: " . $record->nama_barang . "\n" . 
    "Kode Barang: " . $record->kode_barang . "\n" . 
    "Penanggung Jawab: " . $record->penanggung_jawab
) !!}

</x-filament::page>
