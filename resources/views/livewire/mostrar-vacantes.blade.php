<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{ route('vacantes.show', $vacante->id) }}"
                       class="text-xl font-bold">
                            {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm font-bold text-gray-500">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-400">Último día:
                        {{ \Carbon\Carbon::parse($vacante->ultimo_dia)->format('d/m/Y') }}</p>

                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a  href="{{ route('candidatos.index', $vacante) }}"
                        class="text-center bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        {{ $vacante->candidatos->count() }} 
                        @choice('Candidato|Candidatos', $vacante->candidatos->count())
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="text-center bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">Editar</a>
                    <button wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }})"
                        class="text-center bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', vacanteId => {
                Swal.fire({
                    title: '¿Eliminar Vacante?',
                    text: "Una vacante eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, ¡Eliminar!',
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        /* Eliminar la vancate desde el servidor */
                        @this.dispatch("eliminarVacante", {
                            vacante: vacanteId
                        });

                        Swal.fire(
                            '¡Eliminado correctamente!',
                            'Tu vacante ha sido eliminada',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endpush
