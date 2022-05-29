<?php

namespace RyanChandler\FilamentProgressColumn;

use Closure;
use Filament\Tables\Columns\Column;

class ProgressColumn extends Column
{
    protected string $view = 'filament-progress-column::column';

    protected string $color = 'primary';

    protected ?Closure $progress = null;

    protected string | Closure | null $poll = null;

    public function color(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function progress(Closure $callback): static
    {
        $this->progress = $callback;

        return $this;
    }

    public function getProgress(): int
    {
        if ($this->progress === null) {
            return floor($this->getStateFromRecord());
        }

        return $this->evaluate($this->progress);
    }

    public function poll(string | Closure $duration): static
    {
        $this->poll = $duration;

        return $this;
    }

    public function getPoll(): ?string
    {
        return $this->evaluate($this->poll);
    }
}
