<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriaPorAlumnoResource\Pages;
use App\Filament\Resources\MateriaPorAlumnoResource\RelationManagers;
use App\Models\Alumno;
use App\Models\Materia;
use App\Models\Materia_por_Alumno;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MateriaPorAlumnoResource extends Resource
{
    protected static ?string $model = Materia_por_Alumno::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('materia_id')->label('Materia')->options(Materia::all()->pluck('nombre','id'))->required(),
                Select::make('alumno_id')->label('Alumno')->options(Alumno::all()->pluck('numeroDeLegajo','id'))->required(),
                Select::make('estado')->label('Estado')->options(['aprobado'=> 'Aprobado', 'desaprobado'=>'Desaprobado', 'libre'=> 'Libre'])->required(),
                DatePicker::make('fecha')->required()


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('alumno.numeroDeLegajo')->label('Alumno'),
                TextColumn::make('materia.nombre')->label('Materia'),
                TextColumn::make('estado')->label('Estado'),
                TextColumn::make('fecha')->label('Fecha'),



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
            'index' => Pages\ListMateriaPorAlumnos::route('/'),
            'create' => Pages\CreateMateriaPorAlumno::route('/create'),
            'edit' => Pages\EditMateriaPorAlumno::route('/{record}/edit'),
        ];
    }    
}
