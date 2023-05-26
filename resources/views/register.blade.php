<x-layout pageTitle="Registro">
    <x-slot:buttonHeader>
        <a href="{{ route('login') }}" class="btn btn-primary">Faça seu login</a>
    </x-slot:buttonHeader>

    <section id="task-section">
        <h1>Crie seu registro</h1>

        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('user.register_action') }}">
            @csrf

            <x-form.text-input
                type="text"
                name="name"
                label="Informe seu nome"
                placeholder="Digite o seu nome"
                required="required"
            />

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

            <x-form.text-input
                type="password"
                name="password_confirmation"
                label="Confirme sua senha"
                placeholder="Confirme sua senha"
                required="required"
            />

            <x-form.form-button resetText="Limpar" submitText="Criar Registro" />
        </form>
    </section>
</x-layout>
