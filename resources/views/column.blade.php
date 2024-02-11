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
$buttonStyles = \Filament\Support\get_color_css_variables(
    $evaluatedColor,
    shades: [600],
);
$progress = $getProgress();
$poll = $getPoll();
@endphp

<div
    class="w-full filament-tables-progress-column"
    @if($poll)
        wire:poll.{{ $poll }}
    @endif
>
    <div style="{{ $buttonStyles }}" class="flex items-center px-4 space-x-4">
        <div class="bg-gray-200 rounded-full h-2.5 dark:bg-gray-600 w-full">
            <div @class([
                'h-2.5 rounded-full bg-custom-600',
                $color,
            ]) style="width: {{ min($progress, 100) }}%"></div>
        </div>

        <span class="text-sm text-gray-700 dark:text-gray-200">{{ $progress }}%</span>
    </div>
</div>
