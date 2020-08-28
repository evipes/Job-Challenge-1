@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
Vendedores/Users
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Area de acesso a endedores cadastrados
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')

<a name="" id="" class="btn btn-dark mb-2" href="{{route('newProduct')}}" role="button"> Criar produtos</a>

<a name="" id="" class="btn btn-dark mb-2" href="{{route('listSales')}}" role="button"> Relatorio de vendas</a>


   <!--  Impressão da lista de produtos  -->
<ul class="list-group">
    @foreach($products as $product)
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="product-name-{{$product->id}}">{{$product->name}}</span>
        <span id="product-slug-{{$product->id}}">({{url($product->slug)}} )</span>

         <!-- Icones de cada Produto -->
            <span class="d-flex">

                <!-- icon: editar produto -->                   
                <a href="{{ route('listProductSales', array('id'=>$product->id))}}" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                
               <!-- icon: relatorio do produto -->                   
                <a href="{{ route('edit_product', array('id'=>$product->id))}}" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-pencil-alt"></i>                    
                </a>

                @auth
                <!-- icon: deletar produtos-->   
                <form method="POST" action="{{ route('destroy_product', array('id'=>$product->id)) }}"
                    onsubmit="return confirm('Tem certeza que deseja exlcuir o cliente (Nome do produto ṕor Addslash) ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
                @endauth

            </span>
        </li>
    @endforeach
</ul>


@endsection
