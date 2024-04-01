<div>
    @isset($aliasPartner)
    @foreach($aliasPartner as $row)
    {{ $row->alias }} -- {{ $row->partner_name }} // {{ $row->partner_acronym }}
    <br>

    @endforeach
    @endisset

    @isset($aliasOS)
    @foreach($aliasOS as $row)
    {{ $row->alias }} -- {{ $row->distribution_name }} // {{ $row->edition_name }}
    <br>

    @endforeach
    @endisset
</div>