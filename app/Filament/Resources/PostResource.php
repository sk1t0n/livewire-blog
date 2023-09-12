<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers\TagsRelationManager;
use App\Models\Post;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label(Str::ucfirst(__('filament.post.title')))
                    ->required()
                    ->maxLength(100),
                RichEditor::make('content')
                    ->label(Str::ucfirst(__('filament.post.content')))
                    ->required(),
                Select::make('category_id')
                    ->label(Str::ucfirst(__('filament.post.category')))
                    ->relationship(name: 'category', titleAttribute: 'name'),
                FileUpload::make('image')
                    ->label(Str::ucfirst(__('filament.post.image'))),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(Str::ucfirst(__('filament.post.title')))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(Str::ucfirst(__('filament.post.created_at'))),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('filament.post.post');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.post.posts');
    }
}
