<!DOCTYPE html>
<html lang="en>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Document</title>
    </head>
<body>
	<h1>Сотрудники</h1>
	<button><a href="{{ route('workers.create') }}" type="button">Добавить сотрудника</a></button>
	<hr>
	@if (count($workers) != 0)
		@foreach ($workers as $worker)

			<ul>
				<li>
					<span>ФИО сотрудника: </span>
					<span>{{ $worker->fullname }}</span>
					<form action="{{ route('workers.show', ['worker' => $worker->id]) }}" method="get">
						<button type="submit">Посмотреть остальные данные</button>
					</form>
					<form action="{{ route('workers.edit', ['worker' => $worker->id]) }}" method="get">
						<button type="submit">Изменить данные</button>
					</form>
					<form action="{{ route('workers.destroy', ['worker' => $worker->id]) }}" method="POST">
						@method("delete")
						<button type="submit">Удалить</button>
					</form>
				</li>
			</ul>
		@endforeach
	@endif
</body>