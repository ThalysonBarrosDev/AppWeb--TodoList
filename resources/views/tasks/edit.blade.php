<x-layout pageTitle="Editar Tarefa">
    <x-slot:buttonHeader>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:buttonHeader>

    <section id="task-section">
        <h1>Editar Tarefa</h1>

        <form method="POST" action="{{ route('task.edit_action') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $task->id }}" />

            <x-form.text-input
                type="text"
                name="title"
                label="Título"
                placeholder="Digite o título da tarefa"
                required="required"
                value="{{ $task->title }}"
            />

            <x-form.text-input
                type="datetime-local"
                name="due_date"
                label="Data de Realização"
                required="required"
                value="{{ $task->due_date }}"
            />

            <x-form.select-input
                name="category_id"
                label="Categoria"
            >
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @if ($category->id == $task->category_id)
                            selected
                        @endif
                        >{{ $category->title }}</option>
                @endforeach
            </x-form.select-input>

            <x-form.textarea-input
                name="description"
                label="Descrição"
                placeholder="Digite uma descrição para a sua tarefa"
                value="{{ $task->description }}"
            ></x-form.textarea-input>

            <x-form.form-button resetText="Resetar" submitText="Atualizar Tarefa" />
        </form>
    </section>
</x-layout>
