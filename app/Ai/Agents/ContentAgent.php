<?php

namespace App\Ai\Agents;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Attributes\MaxTokens;
use Laravel\Ai\Attributes\Model;
use Laravel\Ai\Attributes\Provider;
use Laravel\Ai\Attributes\Temperature;
use Laravel\Ai\Attributes\Timeout;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Enums\Lab;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

#[Provider(Lab::OpenAI)] // Local Provider LM Studio, Bionic
#[Model('qwen2.5-omni-7b')]
#[MaxTokens(2048)]
#[Temperature(0.7)]
#[Timeout(300)]
class ContentAgent implements Agent, HasStructuredOutput, HasTools
{
    use Promptable;

    public function __construct(public array $rewriter)
    {
        $this->instructions = $rewriter['instructions'];
    }

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {

        $baseInstructions = $this->instructions;

        $constraint = "\n\n".
                "OUTPUT CONSTRAINT:\n".
                "Return ONLY a raw JSON object.\n".
                "The JSON must have an 'options' key containing an array of exactly 3 strings.\n".
                "Example:\n".
                "{\"options\": [\"Variant 1 content...\", \"Variant 2 content...\", \"Variant 3 content...\"]}\n";

        return $baseInstructions.$constraint;

    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [];
    }

    /**
     * Get the agent's structured output schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'options' => $schema->array()->required(),
        ];
    }
}
