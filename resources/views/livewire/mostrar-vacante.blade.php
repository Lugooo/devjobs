<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-500 my-3"> {{ $vacante->titulo }}</h3>
    </div>

    <div class="md:grid md:grid-cols-2 bg-gray-100 p-4 rounded-md">
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa: <span
                class="normal-case font-normal">{{ $vacante->empresa }}</span></p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Último día para postularse: <span
                class="normal-case font-normal">{{ Carbon\Carbon::parse($vacante->ultimo_dia)->toFormattedDateString() }}</span>
        </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoria: <span
                class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span></p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario: <span
                class="normal-case font-normal">{{ $vacante->salario->salario }}</span></p>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2 ">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                alt="{{ 'Imagen vacante ' . $vacante->titulo }}">
        </div>
        <div class="md:col-span-4 mt-3">
            <h2 class="text-2xl font-bold text-gray-500">Descripción del puesto</h2>
            <p class="text-gray-800 p-4">{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-100 border border-dashed p-5 text-center">
            <p>
                ¿Deseas aplicar a esta vacante? <a href="{{ route('register') }}" class="font-bold text-indigo-600">Obtén
                    una cuenta y aplica a esta y a otras vacantes</a>
            </p>
        </div>
    @endguest

    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante" />
        @endcannot
    @endauth
</div>
