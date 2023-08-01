<x-layout.default>
	@section('title','Sections')
	<div x-data="contacts">
		<div class="flex items-center justify-between flex-wrap gap-4">
			<h2 class="text-xl">sections</h2>
			<div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
				<div class="flex gap-3"></div>

			</div>
		</div>
		<div class="mt-5 panel p-0 border-0 overflow-hidden">
			<div class="table-responsive">
				<table class="table-striped table-hover">
					<thead>
					<tr>
						<th>Name</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($sections as $section)
						<tr>
							<td>{{ $section->name }}</td>
							<td>
								<form id="delete-form-{{ $section->id }}"
									  action="{{ route('pages.section.destroy', $section->id) }}" method="POST">
									@csrf
									@method('DELETE')
								</form>

								<div class="flex gap-4 items-center">
									<a href="{{ route('pages.section.edit', $section->id) }}" role="button"
									   class="btn btn-sm btn-outline-primary">Edit</a>
{{--									<a href="#" role="button" class="btn btn-sm btn-outline-danger"--}}
{{--									   onclick="showAlert(event, '{{ $section->id }}')">Delete</a>--}}

									{{-- <a href="#" role="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $section->id }}').submit();">Delete</a> --}}
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
