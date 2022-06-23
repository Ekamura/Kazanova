@extends('layouts.app')
@section('title', 'catalog')
@section('content')
    <section class="page-section equipment mt-lg-5" id="equipment">
        <div class="container">

            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"></h2>

            <div class="divider-custom">

            </div>

            <div class="site-section">
                <div class="container">

                    <div class="row mb-5">
                        <div class="col-md-9 order-2">
                            <div class="row mb-5">
                                @foreach((old('products') ?? $products) as $product)
                                    <div class="col-sm-6 col-lg-4 mb-4 h-100" data-aos="fade-up">
                                        <a href="{{ route('product.show', $product->id) }}"
                                           class="text-decoration-none text-black">
                                            <div class="block-4 text-center border">
                                                <figure class="block-4-image">
                                                    @foreach($product->imageProducts as $image)
                                                    <img src="{{ asset('/storage/'.$image->image) }}"
                                                         alt="{{ $product->image }}"
                                                         class="img-fluid " style="width: 16rem; height: 13rem;
                                                         overflow: hidden">
                                                    @endforeach
                                                </figure>
                                                <div class="block-4-text p-4">
                                                    <h6>{{ $product->full_name }}</h6>
                                                    <p class="text-primary font-weight-bold">
                                                        <strong>{{ $product->price_in_rub }} ₽</strong></p>
                                                    @auth
                                                        <a href="#" class="link-image-shopping">
                                                            <img src="{{ asset('storage/bg/online-shopping.png') }}"
                                                                 class="link-image-card-shopping" width="50px"
                                                                 height="50px"
                                                                 alt="{{ $product->full_name }}"
                                                                 data-id="{{ $product->id }}">
                                                        </a>
                                                    @endauth
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!--           категории            -->
                        <div class="col-md-3 order-1 mb-5 mb-md-0">
                            <form action="{{ route('category.products') }}">
                                <div class="border p-4 rounded mb-4">
                                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Категории</h3>
                                    @foreach($categories as $category)
                                        <input type="radio" class="btn-check" name="category"
                                               value="{{ $category->id }}"
                                               id="{{$category->id}}" onchange="this.form.submit()"
                                            {{ old('category') && old('category') == $category->id ? 'checked': ''}}>
                                        <label class="btn btn-outline-secondary d-grid text-start mb-1"
                                               for="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </label>
                                    @endforeach
                                </div>

                                <!--            сортировка               -->

                                <a class="btn btn-sm btn-outline-secondary my-4 d-grid me-2"
                                   href="{{ route('catalog') }}">
                                    Сборсить фильтр
                                </a>
                            </form>
                        </div>
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
                localStorage.totalCount = +localStorage.totalCount + 1
                document.querySelectorAll('.total-count').forEach(el => {
                    el.innerHTML = localStorage.totalCount;
                });
                await postDataJS('{{ route('basket.plus') }}', e.target.dataset.id, '{{ csrf_token() }}');
            })
        })
    </script>
@endpush
