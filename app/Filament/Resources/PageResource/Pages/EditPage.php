<?php

namespace App\Filament\Resources\PageResource\Pages;

//use Filament\Pages\Actions;
//use Filament\Pages\Actions\Action;
use App\Filament\Resources\PageResource\Pages\Concerns\HasPreviewModal;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as PageContract;
use App\Filament\Resources\PageResource;

class EditPage extends EditRecord
{
    use HasPreviewModal;

    protected static string $resource = PageResource::class;

    public static bool $formActionsAreSticky = true;

    public static function getResource(): string
    {
        return config('filament-fabricator.page-resource') ?? static::$resource;
    }

    protected function getActions(): array
    {
        return [
            PreviewAction::make(),

            ViewAction::make()
                ->visible(config('filament-fabricator.enable-view-page')),

            DeleteAction::make(),

            Action::make('visit')
                ->label(__('filament-fabricator::page-resource.actions.visit'))
                ->url(function () {
                    /** @var PageContract $page */
                    $page = $this->getRecord();

                    return FilamentFabricator::getPageUrlFromId($page->id);
                })
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->openUrlInNewTab()
                ->color('success')
                ->visible(config('filament-fabricator.routing.enabled')),

            Action::make('save')
                ->action('save')
                ->label(__('filament-fabricator::page-resource.actions.save')),
        ];
    }
}
