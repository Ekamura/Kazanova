@extends('layouts.app')
@section('title', 'show-product')
@section('content')
    <section class="page-section equipment mt-lg-5" id="equipment">

        <div class="bg-light py-3 mt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{ route('catalog') }}">Каталог</a> <span class="mx-2 mb-0">/</span> <strong
                            class="text-black">{{ $product->full_name }}</strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        @foreach($product->imageProducts as $image)
                            <img src="{{asset('/storage/'.$image->image)}}"
                                 alt="product"
                                 class="w-75 h-75"></a>
                        @endforeach                    </div>
                    <div class="col-md-6">
                        <h2 class="text-black text-center">{{ $product->full_name }}</h2>
                        <table class="border-top">
                            <tbody>
                            @foreach($product->characteristics as $characteristic)
                                <tr>
                                    <td class="first_child">{{ $characteristic->specification->name }}</td>
                                    <td>{{ $characteristic->value_show }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <p><strong class="text-primary h4">{{ $product->price_in_rub }}₽</strong></p>

                        @auth
                            <a href="#" class="link-image-shopping">
                                <img src="{{ asset('/images/online-shopping.png') }}"
                                     class="link-image-card-shopping" width="50px" height="50px"
                                     alt="{{ $product->name }}"
                                     id="{{ $product->id }}">
                            </a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('/js/fetch.js') }}"></script>
    <script>
        document.querySelectorAll('.link-image-card-shopping').forEach(item => {
            item.addEventListener('click', async (e) => {
                e.preventDefault()
                localStorage.totalCount = +localStorage.totalCount +1
                document.querySelectorAll('.total-count').forEach(el=>{el.innerHTML=localStorage.totalCount; });
                await postDataJS('{{ route('basket.plus') }}', e.target.dataset.id, '{{ csrf_token() }}');
            })
        })
    </script>
@endpush
