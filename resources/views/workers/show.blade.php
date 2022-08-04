<div class="">
	<ul>
		<li>
			<span>ФИО сотрудника: </span>
			<span>{{ $worker_1->fullname }}</span>
			<hr>
		</li>
	</ul>	
	<ul>
		<li>
			<span>Почта: </span>
			<span>{{ $worker_1->email }}</span>
			<hr>
		</li>
	</ul>	
	<ul>
		<li>
			<span>Полных лет: </span>
			<span>{{ $worker_1->age }}</span>
			<hr>
		</li>
	</ul>	
	<ul>
		<li>
			<span>Средняя зарплата: </span>
			<span>{{ $worker_1->avarage_salary }}</span>
			<hr>
		</li>
	</ul>	
	<ul>
		<li>
			<span>Стаж работы: </span>
			<span>{{ $worker_1->environment }}</span>
			<hr>
		</li>
	</ul>	
	<ul>
		<li>
			<img src="{{  asset('storage/' . $worker_1->photo) }}" alt="" height="40">
		</li>
	</ul>	

	<h1>Сотрудники</h1>
	<button><a href="{{ route('workers.index') }}" type="button">Ко всем сотрудникам</a></button>
</div>