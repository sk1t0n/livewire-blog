<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use App\Filament\Resources\TagResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TagsRelationManager extends RelationManager
{
    protected static string $relationship = 'tags';

    public function form(Form $form): Form
    {
        return TagResource::form($form);
    }

    public function table(Table $table): Table
    {
        return TagResource::table($table)
            ->heading(Str::ucfirst(__('filament.tag.tags')));
    }
}
