<?php

namespace App\Filament\Resources\MateriaPorAlumnoResource\Pages;

use App\Filament\Resources\MateriaPorAlumnoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMateriaPorAlumno extends EditRecord
{
    protected static string $resource = MateriaPorAlumnoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
