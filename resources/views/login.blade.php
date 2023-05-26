<x-layout pageTitle="Login">
    <x-slot:buttonHeader>
        <a href="{{ route('register') }}" class="btn btn-primary">Registre-se</a>
    </x-slot:buttonHeader>

    <section id="task-section">
        <h1>Faça seu login</h1>

        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('user.login_action') }}">
            @csrf

            <x-form.text-input
                type="email"
                name="email"
                label="Informe seu e-mail"
                placeholder="Digite o seu e-mail"
                required="required"
            />

            <x-form.text-input
                type="password"
                name="password"
                label="Informe sua senha"
                placeholder="Digite a sua senha"
                required="required"
            />

            <x-form.form-button resetText="Limpar" submitText="Login" />
        </form>
    </section>
</x-layout>
