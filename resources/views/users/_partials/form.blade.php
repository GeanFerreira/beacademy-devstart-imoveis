

<div class="w-auto bg-white shadow-md rounded px-8 py-12">
    @csrf
    <input type="text" name="name" placeholder="Nome:" value="{{ $user->name ?? old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
    <input type="email" name="email" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
    <input type="password" name="password" placeholder="Senha:" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
    <input type="file" name="image" class="block w-full text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100 py-5">
    <button type="submit" class="w-full shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
        Enviar
    </button>
</div>