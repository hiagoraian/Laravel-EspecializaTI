<h2>Nova Dúvida</h2>

<form action="{{route('store')}}" method="POST">
        @csrf
        <input type="text" placeholder="Assunto" name="subject">
        <textarea name="body" cols="30" rows="5" placeholder="Descrição"></textarea>
        <button type="submit">Enviar</button>
</form>