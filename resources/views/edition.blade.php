<div class="d-flex w-100 justify-content-between align-items-center">
    <div class="d-flex">
        <form action="/editions-filter" method="GET">
            <div class="mb-3 p-4">
                <label for="exampleFormControlInput1" class="form-label">Filter by Edition Name:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name='edition-name'>
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </div>
        </form>
        <a href="/editions"><button class="mt-3 btn btn-primary">Clear</button></a>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEdition">
        Add new Edition
    </button>



</div>


@isset($editions)
@if($editions instanceof \Illuminate\Pagination\AbstractPaginator)
<div class="mt-3 mb-3 d-flex justify-content-between">{{ $editions->links() }}
    <div class="rec-count">Total Records: {{ $editions->total()}}</div>
</div>
@endif
<ul class="list-group mb-5">
    @foreach($editions as $e)
    @isset($e->id)
    <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
        <div><span class="fs-4">Edition Name:</span> <span class="fs-5 ms-4">{{$e->edition_name}}</span></div>
        <div class="d-flex">
            <button type="button" class="me-1 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editEdition-{{$e->id}}">
                Edit
            </button>
            <form action="/editions-delete" method="POST">
                @csrf
                <div class="">
                    <input type="hidden" name="edition-id" value="{{$e->id}}">
                    <button type="submit" class="btn btn-danger">X</button>
                </div>
            </form>
        </div>

    </li>


    <!-- Modal For adding editing Edition-->
    <div class="modal fade" id="editEdition-{{$e->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Edition</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/editions-edit" method="POST" class="me-1">
                        @csrf
                        <div class="">
                            <input type="hidden" name="edition-id" value="{{$e->id}}">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name='edition-name-edit' value="{{$e->edition_name}}">
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endisset
    @endforeach



</ul>
@endisset



<!-- Modal For adding new Edition-->
<div class="modal fade" id="addEdition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new Edition</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/editions" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Edition Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name='edition-name-in'>
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>