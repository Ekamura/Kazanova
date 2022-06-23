@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-start m-4">
        <a href="{{ route('admin.category.create') }}" class="btn btn-outline-secondary">
            Добавить характеристику
        </a>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название характеристики</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            @foreach($specifications as $specification)
                <tbody>
                <tr>
                    <td>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#modalCharacteristics"
                                onclick="outCharacteristicsModal({{ $specification }})">
                            {{ $specification->name }}
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('admin.specification.destroy', $specification) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
        {{--        Модальное окно для управления элементами спецификации--}}
        <div class="modal fade" id="modalCharacteristics"
             tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="modal-list-characteristics list-group"></ul>
                    </div>
                    <div class="modal-footer">
                        <div class="input-group m-2">
                            <input type="text" class="form-control" placeholder="введите значение..."
                                   id="valueCharacteristic" aria-label="значение элемента"
                                   aria-describedby="button-add">
                            <button class="btn btn-outline-secondary" type="button" id="buttonAdd"
                                    onclick="addCharacteristic()">добавить элемент
                            </button>
                        </div>

                        <p class="m-auto"><small class="text-danger error-add"></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    let modalSpecification = 0;
    let modalList, errorAdd, valueCharacteristic;

    function outCharacteristicsModal(specification) {
        modalSpecification = specification.id

        errorAdd = document.querySelector('.error-add');
        valueCharacteristic = document.getElementById('valueCharacteristic')
        modalList = document.querySelector('.modal-list-characteristics');
        document.querySelector('.modal-title').textContent = specification.name

        getCharacteristics()
    }

    async function getCharacteristics() {
        document.querySelector('.error-add').textContent = '';
        let response = await fetch(`/admin/specification/${modalSpecification}/characteristics`);
        let characteristics = await response.json()
        outCharacteristics(characteristics, modalList)
    }

    function outCharacteristics(characteristics, modalList) {
        modalList.innerHTML = ''
        characteristics.forEach(ch => {
            modalList.insertAdjacentHTML('beforeend', createElementCharacteristic(ch))
        })
    }

    function createElementCharacteristic({value, id}) {
        return `<li class="list-group-item d-flex justify-content-between align-items-center">
                        <span> ${value} </span>
                        <button type="button" class="btn-close" onclick="deleteCharacteristic(this, ${id})"></button>
                    </tr>
                 </li>`
    }

    async function deleteCharacteristic(target, id) {
        // let response = await fetch(`/admin/specification/delete/characteristics/${id}`);

        let response = await fetch(`/admin/specification/delete/characteristics/${id}`,{
            method: "DELETE",
            body: JSON.stringify({id, '_token': '{{ csrf_token() }}'}),
            headers: {
                "Content-type": "application/json; charset=UTF-8",
            },
        });
        let result = await response.text();
        result === '' ? await getCharacteristics() : errorAdd.textContent = result
    }

    async function addCharacteristic() {
        let value = valueCharacteristic.value
        valueCharacteristic.value = ''
        let response = await fetch(`/admin/specification/${modalSpecification}/add/characteristic?value=${value}`);
        let result = await response.json();

        response.status === 422 ? errorAdd.textContent = result.value : await getCharacteristics()
    }

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
