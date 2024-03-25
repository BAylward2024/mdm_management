<ul class="list-group">
    @foreach($os_join as $os)
    <li class="list-group-item">Version Number: {{$os->version_number}} <br>Edition Name: {{$os->edition_name}}<br>Distribution Name: {{$os->distribution_name}}</li>
    @endforeach
</ul>