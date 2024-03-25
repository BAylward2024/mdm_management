<h1>MDM Alias</h1>

<div class="container d-flex">
    <div class="container d-flex w-100">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Alias Name</th>
                    <th scope="col">Fact ID</th>
                    <th scope="col">Fact Table</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($alias as $a)
                <tr>
                    <td>
                        {{ $a->id }}
                    </td>
                    <td>
                        {{$a->alias ?? 'ID: ' . $a->id . ' - NULL'}}
                    </td>
                    <td>
                        {{$a->fact_id ?? 'NULL'}}
                    </td>
                    <td>
                        {{$a->fact_table ?? 'NULL'}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignFact-{{ $a->id }}">
                            Assign Fact
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAlias-{{ $a->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <ul class="list-group">
            @foreach($alias as $a)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between w-50 align-items-center">
                    <div>Alias: {{$a->alias ?? 'ID: ' . $a->id . ' - NULL'}}</div>
                    <div></div>
                </div>

                <div>Fact ID: {{$a->fact_id ?? 'No Fact Assigned'}}</div>
            </li> -->


        <div class="modal fade" id="assignFact-{{ $a->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Assign Fact to Alias</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/alias.assign" method="POST">
                        @csrf
                        <div class="modal-body d-flex">
                            <div class="container">Alias: {{$a->alias ?? 'ID: ' . $a->id . ' - NULL'}}
                                <input type="hidden" name="aliasId" value="{{ $a->id }}">
                            </div>
                            <div class="container">

                                <select class="form-select" aria-label="Default select example" name="factPicker">
                                    @foreach($os_join as $os)
                                    <option value="{{$os->os_id}}">Fact ID: {{$os->os_id}} Version Number: {{$os->version_number}} Edition Name: {{$os->edition_name}} Distribution Name: {{$os->distribution_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Assign </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteAlias-{{ $a->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you sure?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/alias.delete" method="POST">
                        @csrf
                        <div class="modal-body d-flex">
                            <div class="container">Are you sure you want to delete Alias: <b>{{$a->alias ?? 'ID: ' . $a->id . ' - NULL'}}</b> ?
                                <input type="hidden" name="aliasId" value="{{ $a->id }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- @endforeach -->
        <!-- </ul> -->
    </div>


    <!-- <div class="container">
        <ul class="list-group">
            @foreach($os_join as $os)
            <li class="list-group-item">Fact ID: {{$os->os_id}} <br>Version Number: {{$os->version_number}} <br>Edition Name: {{$os->edition_name}}<br>Distribution Name: {{$os->distribution_name}}</li>
            @endforeach
        </ul>
    </div> -->
</div>