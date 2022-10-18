<div data-controller="browsing" class="d-block bg-white rounded mb-3">
    <iframe @foreach($attributes as $key => $value) {{ $key }}='{{$value}}' @endforeach></iframe>
</div>
