<?php

namespace App\Filament\Resources\AlumnoResource\RelationManagers;

use App\Models\Materia;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class MateriaPorAlumnoRelationManager extends RelationManager
{
    protected static string $relationship = 'MateriaPorAlumno';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('materia_id')->label('Materia')
                    ->required()
                    ->options(\App\Models\Materia::all()->pluck('nombre', 'id')),
                Select::make('estado')->label('estado')->options(['aprobado'=>'Aprobado', 'desaprobado' => 'Desaprobado', 'regular' => 'Regular', 'libre' => 'Libre' ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('materia.nombre')->label('Materia'),
                TextColumn::make('estado')->searchable()
            ])
            ->filters([
                SelectFilter::make('materia_id')->label('Filtrar por materia')->options(Materia::all()->pluck('nombre','id')),
                SelectFilter::make('estado')->label('Filtrar por estado')->options(['aprobado' => 'Aprobado', 'desaprobado' => 'Desaprobado', 'regular' => 'Regular', 'libre' => 'Libre']),

            ])  
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
