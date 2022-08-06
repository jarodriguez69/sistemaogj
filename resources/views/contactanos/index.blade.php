<form action="{{route('contactanos.store')}}" method="POST">
    @csrf
<label for="">
    nombre
    <br>
    <input type="text" name="name">
</label>
<br>
@error('name')
    <p><strong>{{$message}}</strong></p>
@enderror

<label for="">
    correo
    <br>
    <input type="email" name="email">
</label>
<br>
@error('email')
    <p><strong>{{$message}}</strong></p>
@enderror

<label for="">
    Mensaje
    <br>
    <textarea name="message" id="" cols="30" rows="10"></textarea>
</label>
<br>
@error('message')
    <p><strong>{{$message}}</strong></p>
@enderror

<br>
<button type="submit">Enviar mensaje</button>
</form>

@if (session('info'))
    <script>
        alert("{{session('info')}}");
    </script>
@endif