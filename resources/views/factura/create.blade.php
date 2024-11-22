
<x-app-layout>
    <div class="bg-input w-1/2 rounded p-10">
        <h1
            class="text-2xl text-white text-center font-bold
            uppercase tracking-wider mt-4 mb-4"
        >
            Crear Factura
        </h1>

        <div>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <form method="post" id="invoice-form" action="{{ route('factura.store') }}">
            @csrf
            @method('post')

            <input type="hidden" name="selected_products" id="selected-products-input">

            <div class="grid grid-cols-2 gap-4 gap-x-7">
                <div class="mt-2">
                    <x-label for="fecha" value="{{ __('Fecha') }}" />
                    <x-input id="fecha" class="block mt-1 w-full" type="date"
                    name="fecha" :value="old('fecha')" required autofocus />
                </div>

                <div class="mt-2">
                    <x-label for="cliente_id" value="{{ __('Cliente') }}" />
                    <select name="cliente_id" class="border-gray-300 focus:border-gray-400
                        focus:ring-gray-400 rounded-md shadow-sm block
                        mt-1 w-full">
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-4 gap-x-7">
                <div class="mt-4">
                    <x-label for="producto_id" value="{{ __('Producto') }}" />
                    <select id="producto_id" name="producto_id" class="border-gray-300
                        focus:border-gray-400
                        focus:ring-gray-400 rounded-md shadow-sm block
                        mt-1 w-full">
                        @foreach ($productos as $producto)
                            <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                    <x-input id="cantidad" class="block mt-1 w-1/2 cantidad" type="number" min="1"
                    name="cantidad" value="1" required autofocus />
                </div>

                <div class="mt-10">
                    <button
                        id="add-product-btn"
                        class="block w-full h-full align-bottom
                        bg-red-400 text-white font-semibold"
                        type="button"
                    >
                        Agregar
                    </button>
                </div>
            </div>


            <div class="mt-10">
                <table id="selected-products-table" class="table-fixed w-full border-collapse border
                border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="text-left px-4 py-2 w-1/4">Nombre</th>
                            <th class="text-left px-4 py-2 w-1/4">Precio</th>
                            <th class="text-left px-4 py-2 w-1/4">Cantidad</th>
                            <th class="text-left px-4 py-2 w-1/4">Impuesto</th>
                            <th class="text-left px-4 py-2 w-1/4">Total</th>
                            <th class="text-left px-4 py-2 w-1/4">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <x-label for="total" value="{{ __('Total') }}" />
                <x-input id="total" class="block mt-1 w-1/2 total" type="text" readonly
                name="total" placeholder="$0" required autofocus />
            </div>

            <div
                class="text-white text-lg text-center font-semibold
                bg-success w-1/2 mt-6 justify-center"
            >
                <button type="submit">Crear</button>
            </div>
        </form>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const addProductButton = document.getElementById('add-product-btn');
        const selectedProductsTable = document.getElementById('selected-products-table');
        const invoiceForm = document.getElementById('invoice-form');
        const selectedProductsInput = document.getElementById('selected-products-input');
        const totalInput = document.getElementById('total');

        const productos = @json($productos);

        let products = [];
        let totalFactura = 0;

        addProductButton.addEventListener('click', () => {
            const productSelect = document.getElementById('producto_id');
            const quantityInput = document.getElementById('cantidad');

            const productId = productSelect.value;
            const productName = productSelect.options[productSelect.selectedIndex].text;
            const quantity = quantityInput.value;

            if (productId && quantity > 0) {
                const producto = productos.find(p => p.id == productId);

                const price = producto.precio;
                const impuesto = producto.impuesto;
                let totalPrice = price * quantity;

                if(impuesto === 1){
                    totalPrice += totalPrice * 0.16;
                }

                // Add product to the array
                products.push({ producto_id: productId, cantidad: parseInt(quantity), total: totalPrice.toFixed(2) });


                totalFactura += totalPrice;

                // Add row to the table
                const row = document.createElement('tr');
                row.className = 'bg-white hover:bg-gray-100';

                row.innerHTML = `
                    <td class="border px-4 py-2">${productName}</td>
                    <td class="border px-4 py-2">${price}</td>
                    <td class="border px-4 py-2">${quantity}</td>
                    <td class="border px-4 py-2">${impuesto === 1 ? 'Si' : 'No'}</td>
                    <td class="border px-4 py-2">${totalPrice.toFixed(2)}</td>
                    <td>
                        <button class="btn btn-danger btn-sm remove-product">Quitar</button>
                    </td>
                `;

                // Remove product logic
                row.querySelector('.remove-product').addEventListener('click', () => {
                    const productToRemove = products.find(product => product.producto_id === productId);

                    if (productToRemove) {
                        // Calculate the product's total price
                        const producto = productos.find(p => p.id == productToRemove.producto_id);
                        const price = producto.precio;
                        const quantity = productToRemove.cantidad;

                        let totalPrice = price * quantity;
                        if (producto.impuesto === 1) {
                            totalPrice += totalPrice * 0.16;
                        }

                        totalFactura -= totalPrice;

                        totalInput.value = '$' + totalFactura.toFixed(2);

                        products = products.filter(product => product.producto_id !== productId);

                        row.remove();
                    }

                });

                selectedProductsTable.appendChild(row);
                totalInput.value = '$' + totalFactura.toFixed(2);

                productSelect.value = '';
                quantityInput.value = '1';
            } else {
                alert('Entrada no valida.');
            }
        });

        // Handle Form Submission
        invoiceForm.addEventListener('submit', (event) => {
            if (products.length === 0) {
                event.preventDefault();
                alert('La factura debe tener al menos un producto.');
                return;
            }

            // Pass the products array as JSON to the hidden input
            selectedProductsInput.value = JSON.stringify(products);
            totalInput.value = totalFactura.toFixed(2);
        });
    });
</script>

</x-app-layout>

