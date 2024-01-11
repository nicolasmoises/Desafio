<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumnoResource\Pages;
use App\Models\Alumno;
use App\Models\Carrera;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use App\Filament\Resources\AlumnoResource\RelationManagers\MateriaPorAlumnoRelationManager;
use App\Models\Materia;
use App\Models\Materia_por_Alumno;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlumnoResource extends Resource
{
    protected static ?string $model = Alumno::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->label('Nombre de alumno')->required(),
                TextInput::make('apellido')->label('apellido')->rules(['required']),
                TextInput::make('dni')->label('dni')->numeric()->required(),
                TextInput::make('telefono')->label('telefono')->numeric()->required(),
                TextInput::make('numeroDeLegajo')->label('Numero de legajo')->unique('alumno', 'numeroDeLegajo')->required(),
                Select::make('estado')->label('estado')->required()->options(['activo'=> 'Activo', 'Inactivo']),
                Select::make('carrera_id')->label('Carrera')->required()->options(Carrera::all()->pluck('nombre','id')),
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')->sortable()->searchable(),
                TextColumn::make('apellido'),
                TextColumn::make('dni')->searchable(),
                TextColumn::make('telefono'),
                TextColumn::make('numeroDeLegajo')->searchable()->sortable(),
                TextColumn::make('estado'),
                TextColumn::make('carrera.nombre'),

            ])
            ->filters([
                SelectFilter::make('estado')->options(['activo' => 'Activo', 'inactivo' => 'Inactivo'])
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
            AlumnoResource\RelationManagers\MateriaPorAlumnoRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlumnos::route('/'),
            'create' => Pages\CreateAlumno::route('/create'),
            'edit' => Pages\EditAlumno::route('/{record}/edit'),
        ];
    }    
}
