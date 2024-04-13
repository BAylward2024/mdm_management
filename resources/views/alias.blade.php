<div>
    <h1 class="h1-header">Alias</h1>
    <div>
        @isset($th)
        {{ $th->getMessage() }}

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @endisset
        <span class="alias-group-by-title">Filter By:</span>
        <div class="alias-group-by">
            <form action="{{ route('alias.os') }}">
                <input type="hidden" name="filter" value="os">
                <button type="submit">Operating System</button>
            </form>
            <form action="{{ route('alias.partner') }}">
                <input type="hidden" name="filter" value="partner">
                <button type="submit">Partner</button>
            </form>
            <form action="{{ route('alias') }}">
                <button type="submit">Clear</button>
            </form>
        </div>
        @isset($alias)
        <table>
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
                        <button type="button">
                            Assign Fact
                        </button>
                        <button type="button">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endisset
    </div>
</div>