<x-layout.default>
	@section('title','Templates')
	<div x-data="contacts">
		<div class="flex items-center justify-between flex-wrap gap-4">
			<h2 class="text-xl">templates</h2>
			<div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
				<div class="flex gap-3">
					<div>
						<a href="{{route('pages.template.create')}}" role="button" class="btn btn-primary">
							<svg class="group-hover:!text-primary" style="margin-right: 10px" width="24" height="24"
								 viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="10" cy="6" r="4" fill="currentColor"/>
								<path d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z"
									  fill="currentColor"/>
								<path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor"
									  stroke-width="1.5" stroke-linecap="round"/>
							</svg>

							Add template
						</a>
					</div>
				</div>

			</div>
		</div>
		<div class="mt-5 panel p-0 border-0 overflow-hidden">
			<div class="table-responsive">
				<table class="table-striped table-hover">
					<thead>
					<tr>
						<th>Name</th>
						<th>Body</th>
						<th>parameters</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($templates as $template)
						<tr>
							<td>{{ $template->name }}</td>
							<td>{{ $template->body }}</td>
							<td>{{ $template->parameters }}</td>
							<td>
								<form id="delete-form-{{ $template->id }}"
									  action="{{ route('pages.template.destroy', $template->id) }}" method="POST">
									@csrf
									@method('DELETE')
								</form>

								<div class="flex gap-4 items-center">
									<a href="{{ route('pages.template.edit', $template->id) }}" role="button"
									   class="btn btn-sm btn-outline-primary">Edit</a>
									<a href="#" role="button" class="btn btn-sm btn-outline-danger"
									   onclick="showAlert(event, '{{ $template->id }}')">Delete</a>

									{{-- <a href="#" role="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $template->id }}').submit();">Delete</a> --}}
								</div>

							</td>
						</tr>

					@endforeach


					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		function showAlert(event, userId) {
			event.preventDefault();

			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'Cancel'
			}).then((result) => {
				if (result.isConfirmed) {
					document.getElementById('delete-form-' + userId).submit();
				}
			});
		}
	</script>
</x-layout.default>
