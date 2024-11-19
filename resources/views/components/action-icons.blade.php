@props(['producto'])

<div class="flex flex-row w-full h-auto gap-x-6">
    <a
        href="{{ route('producto.edit', ['producto' => $producto]) }}"
        class="text-lg font-semibold underline text-orange-500"
    >
        Editar
    </a>

    <form class="delete-form" method="post" action="{{route('producto.remove', ['producto' => $producto])}}">
        @csrf
        @method('delete')

        <button
            class="text-lg font-semibold underline text-red-600"
            type="submit"
        >
            Eliminar
        </button>
    </form>
</div>

@push('js')
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"
    >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.delete-form').submit(function (e) {
           e.preventDefault();

           Swal.fire({
               title: "¿Estas seguro?",
               text: "Esta acción no es reversible",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: "#3085d6",
               cancelButtonColor: "#d33",
               confirmButtonText: "Continuar",
               cancelButtonText:"Cancelar",
               }).then((result) => {

               if (result.isConfirmed) {
                this.submit();
               }
           });
        });
    </script>
@endpush
