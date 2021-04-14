<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered table-white table-responsive border-0 col-lg-6">
            <thead>
            <tr class="text-center">
                <th scope="col">Id</th>
                <th scope="col">Désignation</th>
                <th scope="col">Prix</th>
                <th scope="col">Categorie</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product_data as $product)
            <tr class="text-center">
                <td>{{ $product->id_produit }}</td>
                <td>{{ $product->designation }}</td>
                <td>{{ $product->price  }}</td>
                <td>{{ $product->nom  }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

