<div>
    <div class="flex flex-wrap -mt-6 -mx-3 mb-6">
        <div class="w-full px-3 mt-6">
            <label>
                <p class="font-bold mb-2">
                    Suche nach Aktivitäten
                </p>
                <input type="text"
                       wire:model="search"
                       class="w-full rounded-lg p-3 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-lime-300 focus:border-lime-300 transition-all"
                       placeholder="Aktivitäten suchen...">
            </label>
        </div>
    </div>

    <div class="flex flex-wrap -mt-6 -mx-3 relative">

        <div wire:loading.flex
             class="absolute left-0 top-0 w-full h-full bg-white pt-6 items-start justify-center px-3 text-lime-300">
            <svg class="animate-spin h-12 w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        @if($activityTypes->count() > 0)
            @foreach($activityTypes as $activityType)
                <div class="w-full md:w-6/12 lg:w-4/12 px-3 mt-6">
                    <button class="block text-left rounded-lg shadow-lg p-4 border hover:scale-105 focus-visible:scale-105 hover:border-lime-300 focus-visible:border-lime-300 transition-all">
                    <span class="block font-bold text-lg mb-2">
                        {!! $activityType->label !!}
                    </span>
                        <span class="block">
                        {!! $activityType->description !!}
                    </span>
                    </button>
                </div>
            @endforeach
        @else
            <div class="w-full px-3 mt-6">
                <p class="font-bold mb-2">
                    Keine Aktivitäten gefunden
                </p>
                <p>
                    Es wurden keine Aktivitäten gefunden, die zu deiner Suche passen.
                </p>
                <button class="rounded-lg border px-4 py-3 mt-5" wire:click="resetSearch">
                    Suche zurücksetzen
                </button>
            </div>
        @endif

    </div>
</div>
