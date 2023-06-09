@if(!isset($tag) || 'a' === $tag)
    <a href="{{ $href }}" class="inline-block rounded-xl bg-gradient-to-r from-lime-200 to-slate-300 p-0.5 shadow-lg transition hover:shadow-sm group">
        <span class="inline-block rounded-[10px] bg-white px-5 py-2 font-bold  group-hover:bg-opacity-95 transition-colors">
            {!! $slot !!}
        </span>
    </a>
@elseif('button' === $tag)
    <button class="rounded-xl bg-gradient-to-r from-lime-200 to-slate-300 p-0.5 shadow-xl transition hover:shadow-sm group">
        {!! $slot !!}
    </button>
@endif