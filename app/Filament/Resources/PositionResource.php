<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Position;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\BaseResource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Actions\{
    ActionGroup,
    EditAction,
    ViewAction,
    DeleteAction,
    RestoreAction,
    ForceDeleteAction,
    BulkActionGroup,
    DeleteBulkAction,
    RestoreBulkAction,
    ForceDeleteBulkAction
};
use App\Filament\Resources\PositionResource\Pages;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

/**
 * PositionResource
 */
class PositionResource extends BaseResource
{
    protected static ?string $model = Position::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function getLabel(): ?string
    {
        return __('organization-structure::organization-structure.resource.label.position');
    }

    public static function getPluralLabel(): ?string
    {
        return __('organization-structure::organization-structure.resource.label.positions');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('organization-structure::organization-structure.nav.group');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make(__('organization-structure::organization-structure.field.section-details'))
                ->description(__('organization-structure::organization-structure.field.section-details.description'))
                ->schema([
                    TextInput::make('name')
                        ->label(__('organization-structure::organization-structure.field.name'))
                        ->required()
                        ->maxLength(50)
                        ->unique(ignoreRecord: true)
                        ->placeholder(__('organization-structure::organization-structure.field.name.placeholder'))
                        ->prefixIcon('heroicon-o-briefcase')
                        ->helperText(__('organization-structure::organization-structure.field.name.helper')),

                    TextInput::make('level')
                        ->label(__('organization-structure::organization-structure.field.level'))
                        ->required()
                        ->numeric()
                        ->minValue(1)
                        ->helperText(__('organization-structure::organization-structure.field.level.helper'))
                        ->prefixIcon('heroicon-o-chart-bar'),

                    MarkdownEditor::make('description')
                        ->label(__('organization-structure::organization-structure.field.description'))
                        ->placeholder(__('organization-structure::organization-structure.field.description.placeholder'))
                        ->maxLength(100)
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    Stack::make([
                        TextColumn::make('name')
                            ->label(__('organization-structure::organization-structure.column.name'))
                            ->sortable()
                            ->searchable()
                            ->icon('heroicon-o-briefcase')
                            ->wrap()
                            ->alignStart()
                            ->toggleable(),

                        TextColumn::make('description')
                            ->label(__('organization-structure::organization-structure.column.description'))
                            ->limit(50)
                            ->alignStart()
                            ->wrap()
                            ->toggleable(),
                    ])->alignStart()->space(2),

                    TextColumn::make('level')
                        ->label(__('organization-structure::organization-structure.column.level'))
                        ->sortable()
                        ->badge()
                        ->alignCenter()
                        ->toggleable(),
                ]),
            ])
            ->filters([TrashedFilter::make()])
            ->actions([
                ViewAction::make()->slideOver(),
                EditAction::make()->icon('heroicon-o-pencil')->tooltip(__('Edit')),
                RestoreAction::make()->icon('heroicon-o-arrow-path')->visible(fn($record) => $record->trashed())->tooltip(__('Restore')),
                DeleteAction::make()->icon('heroicon-o-trash')->tooltip(__('Move to Trash')),
                ForceDeleteAction::make()->icon('heroicon-o-x-circle')->visible(fn($record) => $record->trashed())->tooltip(__('Permanently Delete')),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    RestoreBulkAction::make(),
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('level', 'asc')
            ->modifyQueryUsing(fn(Builder $query) => $query->withoutGlobalScope(SoftDeletingScope::class));
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPositions::route('/'),
            'create' => Pages\CreatePosition::route('/create'),
            'edit' => Pages\EditPosition::route('/{record}/edit'),
        ];
    }
}
