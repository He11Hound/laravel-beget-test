<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\ArticleCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationLabel = 'Статьи'; // в левом списке
    protected static ?string $modelLabel = 'Статьи'; // В нав цепочке
    protected static ?string $pluralModelLabel = 'Статьи'; // В множ числе нав цепочка
    protected static ?string $navigationGroup = 'Контент'; // Группа навигации справа

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Наименование')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')->label('Путь до страницы')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('preview_image')->label('Картинка в превью')
                    ->image()
                    ->directory('articles')
                    ->required(),
                Forms\Components\FileUpload::make('detail_image')->label('Детальная картинка')
                    ->image()
                    ->directory('articles')
                    ->required(),
                Forms\Components\Textarea::make('preview_text')->label('Превью текст')
                    ->required()
                    ->columnSpanFull(),
                TinyEditor::make('detail_text')->label('Детальный текст')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TagsInput::make('tags')->label('Тэги'),
                Forms\Components\Select::make('category_id')->label('Категории')
                    ->options(static::categoryOptions())
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('active')->label('Активность')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('preview_image'),
                Tables\Columns\ImageColumn::make('detail_image'),
                Tables\Columns\TextColumn::make('category.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->default(true)
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function categoryOptions()
    {
        return ArticleCategory::pluck('title', 'id');
    }
}
