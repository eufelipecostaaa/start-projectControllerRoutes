<h2>Cadastrar Cidades</h2>
<form action="{{ route('cidades.store') }}" method="POST">
   <!-- Token de segurança salvo na sessão, verificar o formulário submetido -->
   @csrf
   <a href="{{route('cidades.index')}}"><h4>voltar</h4></a>
   <label>Nome: </label> <input type='text' name='nome'>
   <label>Porte: </label> <select id="porte" name="porte">
		<option value="pequena">pequena</option>
		<option value="media">media</option>
		<option value="grande">grande</option>
	</select>
   <input type="submit" value="Salvar">
</form>