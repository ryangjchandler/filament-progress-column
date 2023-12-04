@php
$evaluatedColor = $getColor();
$color = match ($evaluatedColor) {
    'primary' => 'bg-primary-600',
    'secondary' => 'bg-secondary-600',
    'danger' => 'bg-danger-600',
    'success' => 'bg-success-600',
    'warning' => 'bg-warning-600',
    default => $evaluatedColor
};

$progress = $getProgress();
$poll = $getPoll();
@endphp

<div
    class="w-full filament-tables-progress-column"
    @if($poll)
        wire:poll.{{ $poll }}
    @endif
>
    <div class="flex items-center space-x-4 px-4">
        <div class="bg-gray-200 rounded-full h-2.5 dark:bg-gray-600 w-full">
            <div @class([
                'h-2.5 rounded-full',
                $color,
            ]) style="width: {{ min($progress, 100) }}%"></div>
        </div>

        <span class="text-sm text-gray-700 dark:text-gray-200">{{ $progress }}%</span>
    </div>
</div>
