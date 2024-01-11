<?php

namespace App\Filament\Resources\MateriaPorAlumnoResource\Pages;

use App\Filament\Resources\MateriaPorAlumnoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMateriaPorAlumnos extends ListRecords
{
    protected static string $resource = MateriaPorAlumnoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
