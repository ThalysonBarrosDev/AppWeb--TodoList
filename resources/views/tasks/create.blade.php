<x-layout pageTitle="Criar Tarefa">
    <x-slot:buttonHeader>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:buttonHeader>

    <section id="task-section">
        <h1>Criar nova tarefa</h1>

        <form method="POST" action="{{ route('task.create_action') }}">
            @csrf

            <x-form.text-input
                type="text"
                name="title"
                label="Título"
                placeholder="Digite o título da tarefa"
                required="required"
            />

            <x-form.text-input
                type="datetime-local"
                name="due_date"
                label="Data de realização"
                required="required"
            />

            <x-form.select-input
                name="category_id"
                label="Categoria"
            >
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </x-form.select-input>

            <x-form.textarea-input
                name="description"
                label="Descrição"
                placeholder="Digite uma descrição para a sua tarefa"
                required="required"
            ></x-form.textarea-input>

            <x-form.form-button resetText="Resetar" submitText="Criar Tarefa" />
        </form>
    </section>
</x-layout>
