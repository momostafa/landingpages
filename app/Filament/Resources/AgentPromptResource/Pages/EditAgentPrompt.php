<?php

namespace App\Filament\Resources\AgentPromptResource\Pages;

use App\Filament\Resources\AgentPromptResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgentPrompt extends EditRecord
{
    protected static string $resource = AgentPromptResource::class;

    protected function getHeaderActions(): array
    {
        $url = $this->previousUrl ?? $this->getResourceUrl();

        return [
            Actions\Action::make('save')
                ->label(__('Save'))
                ->submit('save')
                ->formId('form')
                ->keyBindings(['mod+s']),

            Actions\Action::make('cancel')
                ->label(__('Cancel'))
                ->color('gray'),
        ];
    }

    /**
     * Mutates Blocks data for TextGeneration static block before save
     * Ensures prompt_id is filled, normalizePrompt mentions tags
     * Finally the cleaned composed Prompt saved as Markdown ready for LLM use.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {

        if (isset($data['prompt_blocks'][0]['data'])) {

            $blockData = &$data['prompt_blocks'][0]['data']; // Use reference for easier updates

            // Ensure prompt_id is set
            if (empty($blockData['prompt_id'])) {
                $blockData['prompt_id'] = $data['id'];
            }

            // 1. Extract the "Settings" parameters from the block
            // This is the array containing 'tone', 'task_type', etc.
            $parameters = $blockData;

            // 2. "Rich Editor"! Get the raw final prompt string from system_prompt_composer and we don't save back anything it
            $rawFinalPrompt = $blockData['system_prompt_composer'] ?? '';

            // 3. Use the helper to normalize it
            // We pass the raw string and the parameters array for interpolation

            $normalizedPrompt = self::normalizePrompt($rawFinalPrompt, $parameters);

            // 4. "Markdown Editor"! Save the cleaned version into system_prompt_final data
            $blockData['system_prompt_final'] = $normalizedPrompt;
        }

        return $data;

    }

    /**
     * Normalizes a prompt string by decoding entities, stripping HTML while preserving
     * block-level newlines, replacing @mentions (handling both {{ }} and : formats),
     * and converting JSON arrays into clean Markdown bullet points.
     */
    public static function normalizePrompt(string $rawHtml, array $parameters): string
    {
        if (empty($rawHtml)) {
            return '';
        }

        // STEP 1: Decode HTML Entities first
        $text = html_entity_decode($rawHtml);

        // STEP 2: Preserve block-level structure before stripping tags.
        // We replace common block elements with double newlines to ensure paragraph separation.
        $text = preg_replace('/<(p|div|li|h[1-6])[^>]*>/i', "\n\n", $text);
        $text = preg_replace('/<br\s*\/?>/i', "\n", $text);

        // Now strip all remaining tags (like <span>, <a>, etc.)
        $text = strip_tags($text);

        // STEP 3: Replace Mentions using Anchor-based Regex
        foreach ($parameters as $key => $fullValue) {
            if (is_array($fullValue)) {
                // --- SPECIAL HANDLING FOR CONSTRAINTS / ARRAYS ---

                // Gemi Fix
                // --- SPECIAL HANDLING FOR CONSTRAINTS / ARRAYS ---
                $list = [];
                foreach ($fullValue as $item) {
                    $content = is_array($item) ? ($item['constraint'] ?? json_encode($item)) : $item;
                    $content = strip_tags($content);
                    $content = preg_replace('/\s\s+/', ' ', $content);
                    $list[] = '- '.trim($content);
                }
                $cleanValue = implode("\n", $list);

                // 1. Simple, safe replacement for the tag token (handles both @constraints and @constraints: [...])
                // No scary one-liner required: we just look for the key with optional colons and JSON data trailing it.
                $text = preg_replace('/@'.preg_quote($key).'(?::\s*\[.*?\])?/s', $cleanValue, $text);

            } else {
                // --- STANDARD STRING MENTIONS (e.g., @task_type{{rewrite}}) ---
                $parts = explode('{{', (string) $fullValue, 2);

                $cleanValue = (count($parts) > 1) ? trim($parts[1], '}') : $fullValue;

                // Anchor-based replacement for the {{ }} format
                $pattern = '/@'.preg_quote($key).'\{\{(.*?)\}\}/s';
                $text = preg_replace($pattern, '$1', $text);
            }

        }

        // STEP 4: Auto-Markdown Formatting (with Double-Bold Protection)
        $markdownRules = [
            'CRITICAL CONSTRAINTS' => '**CRITICAL CONSTRAINTS**',
            'OUTPUT CONSTRAINT' => '**OUTPUT CONSTRAINT**',
            'Example' => '**Example**',
            'Your sole task' => '**Your sole task**',
        ];

        foreach ($markdownRules as $search => $replacement) {
            if (strpos($text, '**'.$search.'**') === false) {
                $text = str_replace($search, $replacement, $text);
            }
        }

        // STEP 5: Final Cleanup & Markdown Polish
        // 1. Collapse multiple horizontal spaces into a single space.
        $text = preg_replace('/[ \t]{2,}/', ' ', $text);

        // 2. Normalize newlines (ensure no more than two consecutive newlines)
        $text = preg_replace('/\n{3,}/', "\n\n", $text);

        // 3. Final check: Remove any leftover HTML entities that might have survived
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');

        // Use (?m) to enable multiline mode so ^ matches the start of every line.
        // We replace "-Text" with "- Text" without adding extra newlines.
        $text = preg_replace('/(?m)^-\s*([A-Z])/', '- $1', $text);

        return trim($text);
    }
}
