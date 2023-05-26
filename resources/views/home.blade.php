<x-layout pageTitle="Home">
    <x-slot:buttonHeader>
        <a href="{{ route('task.new') }}" class="btn btn-primary">Criar tarefa</a>
        <a href="{{ route('logout') }}" class="btn btn-primary">Sair</a>
    </x-slot:buttonHeader>

    <section class="graph">
        <div class="graph-header">
            <h2>Progresso do Dia</h2>

            <div class="graph-header-line-header"></div>

            <div class="graph-header-date">
                <a href="{{ route('home', ['date' => $date_prev_button]) }}">
                    <
                </a>

                {{ $date_as_string }}

                <a href="{{ route('home', ['date' => $date_next_button]) }}">
                    >
                </a>
            </div>
        </div>

        <div class="graph-header-subtitle">
            Tarefas: <b>{{ $tasks_count - $undone_tasks_count }} / {{ $tasks_count }}</b>
        </div>
    </section>

    <section class="list">
        <div class="list-header">
            <select class="list-header-select" onchange="changeTaskStatusFilter(this)">
                <option value="all_task">Todas as tarefas</option>
                <option value="task_pending">Tarefas pendentes</option>
                <option value="task_done">Tarefas realizadas</option>
            </select>
        </div>

        <div class="task-list">
            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach
        </div>
    </section>

    <script>
        function changeTaskStatusFilter(e) {
            if (e.value == 'task_pending') {
                document.querySelectorAll('.task_done').forEach(function (element) {
                    element.style.display = 'none';
                });

                document.querySelectorAll('.task_pending').forEach(function (element) {
                    element.style.display = 'flex';
                });
            } else if (e.value == 'task_done') {
                document.querySelectorAll('.task_pending').forEach(function (element) {
                    element.style.display = 'none';
                });

                document.querySelectorAll('.task_done').forEach(function (element) {
                    element.style.display = 'flex';
                });
            } else {
                document.querySelectorAll('.task_pending').forEach(function (element) {
                    element.style.display = 'flex';
                });

                document.querySelectorAll('.task_done').forEach(function (element) {
                    element.style.display = 'flex';
                });
            }
        }
    </script>

    <script>
        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{ route('task.update') }}';

            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({
                    status, taskId, _token: '{{ csrf_token() }}'
                })
            })

            result = await rawResult.json();

            if (result.success) {
                alert('Task atualizada com sucesso!');

                window.location.reload(false);
            } else {
                alert('Task não foi atualizada, verifique!');

                element.checked = !status;
            }
        }
    </script>
</x-layout>

