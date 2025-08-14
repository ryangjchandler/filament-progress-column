@php
$color = $getColor();
$barStyles = \Filament\Support\get_color_css_variables(
    $color,
    shades: [600],
);
$progress = $getProgress();
$poll = $getPoll();
@endphp

<div
    class="fi-ta-progress-col"
    @if($poll)
        wire:poll.{{ $poll }}
    @endif
>
    <div class="fi-ta-progress-track">
        <div style="{{ $barStyles }}; width: {{ min($progress, 100) }}%" class="fi-ta-progress-indicator"></div>
    </div>

    <span class="fi-ta-progress-label">{{ $progress }}%</span>
</div>
