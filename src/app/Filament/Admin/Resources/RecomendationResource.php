<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RecomendationResource\Pages;
use App\Models\Recomendation;
use App\Models\Minuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

class RecomendationResource extends Resource
{
    protected static ?string $model = Recomendation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(fn () => Auth::id()),

                Select::make('minuman_id')
                    ->label('Minuman')
                    ->relationship('minuman', 'nama') // pastikan field 'nama' ada di tabel minuman
                    ->required(),

                TextInput::make('skor_relevansi')
                    ->label('Skor Relevansi')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1)
                    ->step(0.01)
                    ->default(0.5)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('minuman.nama')->label('Minuman'),
                Tables\Columns\TextColumn::make('skor_relevansi')->label('Skor'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListRecomendations::route('/'),
            'create' => Pages\CreateRecomendation::route('/create'),
            'edit' => Pages\EditRecomendation::route('/{record}/edit'),
        ];
    }
}
