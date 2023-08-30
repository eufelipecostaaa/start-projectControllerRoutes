<h2>Alterar Cidades</h2>
<form action="{{ route('cidades.update', $dados['id']) }}" method="POST">
   <!-- Token de Segurança -->
   <!-- Define o método de submissão como PUT -->
   @csrf
   @method('PUT')
   <a href="{{route('cidades.index')}}"><h4>voltar</h4></a>
   <label>Nome: </label> <input type='text' name='nome' value='{{$dados['nome']}}'>
   <label>Porte: </label>  <select id="porte" name="porte">
		<option value="pequena">pequena</option>
		<option value="media">media</option>
		<option value="grande">grande</option>
	</select>
   <input type="submit" value="Salvar">
</form>