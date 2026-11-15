<?php

namespace App\Models;

use Filament\Forms\Components\RichEditor\Models\Concerns\InteractsWithRichContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentPrompt extends Model
{
    use HasFactory;
    use InteractsWithRichContent;

    protected $table = 'agent_prompts';

    protected $fillable = [
        'user_id',
        'title',
        'prompt_blocks',
        'description',
        'content_type',
    ];

    public static function getMentionTags()
    {
        $promptId = session('active_prompt_id');

        if (! $promptId) {
            return [];
        }

        $mentionTags = [];

        $mentionTags = self::getMentions($promptId)->toArray();

        return $mentionTags;

    }

    public static function getMentions()
    {
        $promptId = session('active_prompt_id');

        if (! $promptId) {
            return collect([]);
        }

        $mention = [];

        $prompBlocks = collect(self::getBlocks($promptId))->collapse()->all();

        foreach ($prompBlocks as $key => $value) {
            // If it's an array (like constraints), store the JSON string directly
            if (is_array($value)) {
                $mention[$key] = $key.': '.json_encode($value);

            } else {
                // Otherwise, store the standard key: value string
                // $mention[$key] = $key . ": " . $value;
                $mention[$key] = $key.'{{'.$value.'}}';
            }
        }

        return collect($mention);

        return collect($mention);
    }

    /**
     * Get the blocks for a prompt
     *
     *
     * @return array
     */
    public static function getBlocks(
        ?int $prompt_id = null,
        ?int $user_id = null,
        ?string $BlockType = null
    ) {
        if (! $prompt_id) {
            return [];
        }

        $data = [];

        $prompt = self::find($prompt_id);

        $promptCollection = collect($prompt->prompt_blocks);

        $keyed = $promptCollection->mapWithKeys(function (array $item, int $key) {
            return [$item['type'] => $item['data']];
        });

        // returns all blocks
        $AllBlocks = collect($keyed->all());

        // returns all block types
        $AllBlockTypes = $AllBlocks->keys()->all();

        if (! empty($exclude)) {
            // returns all Content Section blocks except the excluded blocks
            $PromptBlocks = $AllBlocks->except($exclude)->all();
            $data = $PromptBlocks;
        }

        if ($BlockType == null) {
            $data = $AllBlocks;
        }

        return $data;

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'prompt_blocks' => 'array',
    ];
}
