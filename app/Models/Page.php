<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Models\Concerns\HandlesPageUrls;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as Contract;

class Page extends Model implements Contract
{
    use HandlesPageUrls;

    protected $table = 'pages';

    /**
     * Create a new model instance.
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        if (blank($this->table)) {
            $this->setTable(config('filament-fabricator.table_name', 'pages'));
        }

        parent::__construct($attributes);
    }

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'blocks',
        'layout',
        'parent_id',
        'sidebar_preview',
    ];

    protected $casts = [
        'blocks' => 'array',
        'parent_id' => 'integer',
        'sidebar_preview' => 'boolean',
    ];

    /**
     * Get the blocks for a page
     *
     * @param  array | null  $arguments  = ['ModelData' => FALSE, 'BlockType' => NULL, 'Layout' => NULL, 'Page' => NULL, 'Content' => NULL, 'Meta' => NULL,  'Contact' => NULL, 'Footer' => NULL, 'Navbar' => NULL, 'All' => NULL,]
     * @return array
     */
    public static function getBlocks(int $page_id, string $BlockType, array $exclude = [])
    {
        $data = [];

        $page = Page::find($page_id);

        $collection = collect($page->blocks);

        $keyed = $collection->mapWithKeys(function (array $item, int $key) {
            return [$item['type'] => $item['data']];
        });

        // returns all blocks
        $AllBlocks = collect($keyed->all());

        // returns all block types
        $AllBlockTypes = $AllBlocks->keys()->all();

        if (! empty($exclude)) {
            // returns all Content Section blocks except the excluded blocks
            $ContentBlocks = $AllBlocks->except($exclude)->all();
        }

        // returns only active page blocks
        if ($BlockType == 'active_blocks') {
            $data = $AllBlocks->where('*.is_active', true)->all();
            // dd($activePageBlocks);
        }

        if (! empty($BlockType) && $BlockType != 'active_blocks') {
            $data = $AllBlocks->only($BlockType);
        }

        if (! empty($ContentBlocks)) {
            $data = $ContentBlocks;
        }

        return $data;

    }

    public function emails(): HasMany
    {
        return $this->hasMany(Email::class, 'page_id')->where('user_id', auth()->user()->id);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function allLayouts(): array
    {
        return FilamentFabricator::getLayouts();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function allChildren(): HasMany
    {
        return $this->children()
            ->select('id', 'slug', 'title', 'parent_id')
            ->with('allChildren:id,slug,title,parent_id');
    }
}
