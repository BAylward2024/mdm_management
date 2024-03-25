<ul class="list-group">
    @foreach($versions as $v)
    <li class="list-group-item">ID: {{$v->id}} <br>Version Number: {{$v->version_number}}</li>
    @endforeach
</ul>