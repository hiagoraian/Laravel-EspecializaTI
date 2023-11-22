<h2>Editar Dúvida: {{$support->id}}</h2>

<form action="{{route('update', $support->id)}}" method="POST">
        @csrf()
        @method('PUT')
        <input type="text" placeholder="Assunto" name="subject" value="{{$support->subject}}">
        <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{$support->body}}</textarea>
        <button type="submit">Enviar</button>
</form>