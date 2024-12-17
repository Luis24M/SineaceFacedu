<section>
    <h2 class="text-xl font-medium">Brechas</h2>
    @if ($problematicas === null)
        <p>No se encontraron brechas</p>
    @else
        @foreach ($problematicas as $problematica)
            <div class="flex justify-between items-center">
                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="text-green-500">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <p class="text-lg">{{ $problematica->nombre }}</p>
                </div>
            </div>
        @endforEach
    @endif
</section>
