<h1>Detalhes da dúvida {{$support->id}}</h1>

<ul>
    <li>Assunto: {{ $support->subject}}</li>
    <li>Assunto: {{ $support->status}}</li>
    <li>Assunto: {{ $support->body}}</li>
</ul>

<form action="{{route('destroy', $support->id)}}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>