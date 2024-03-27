<div>
    <div>
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
    </div>
</div>