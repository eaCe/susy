<button class="h-full rounded-xl bg-gradient-to-r from-lime-200 to-slate-300 p-0.5 shadow-lg transition hover:shadow-sm group"
        wire:click="addActivity({{$activityType->id}})">
    <div class="h-full rounded-[10px] bg-white p-4 group-hover:bg-opacity-95 transition-colors">
        <span class="flex items-center justify-center mb-2">
            <x-icon name="{{ $activityType->name }}" class="h-8 w-8"/>
        </span>
        <span class="block font-bold text-lg mb-2">
            {!! $activityType->label !!}
        </span>
        <span class="block">
            {!! $activityType->description !!}
        </span>
    </div>
</button>