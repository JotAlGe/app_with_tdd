@foreach ($foods as $food)
{{ $food->name }}
{{ $food->description }}
{{ $food->price }}
@endforeach
