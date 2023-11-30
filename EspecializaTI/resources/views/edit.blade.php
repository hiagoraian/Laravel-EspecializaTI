<h2>Editar Dúvida: {{$support->id}}</h2>

<x-alert></x-alert>

<form action="{{route('update', $support->id)}}" method="POST">
        @csrf()
        @method('PUT')
        @include('partials.form', ['support'=> $support])
</form>