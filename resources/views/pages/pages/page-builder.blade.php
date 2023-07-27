<x-layout.default>
	@section('title','Page - New')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script>

	<div>
		<ul class="flex space-x-2 rtl:space-x-reverse">
			<li>
				<a href="{{route('pages.page.index')}}" class="text-primary hover:underline">Pages</a>
			</li>
			<li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
				<span>New</span>
			</li>
		</ul>
		<div class="pt-5">
			<div class="flex items-center justify-between mb-5">
				<h5 class="font-semibold text-lg dark:text-white-light">New Page</h5>
			</div>

			<div>
				<form method="POST" action="{{route('pages.page.rebuild', $page->id)}}" enctype="multipart/form-data"
					  class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]">
					@csrf
					<h6 class="text-lg font-bold mb-5">General Information</h6>
					@if (session()->get('success'))
						<div class=" text-center mb-5">
							<h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
						</div>
					@endif
					<div class="flex flex-col sm:flex-row">
						<div class="flex-1 flex gap-5">

							<div id="available-sections"
								 class="flex-1 flex flex-col rounded-md border border-[#e0e6ed] dark:border-[#1b2e4b] handle">
								@foreach ($sections as $section)
									@if(!$page->sections->contains($section))
									<div class="border-b border-[#e0e6ed] dark:border-[#1b2e4b] px-4 py-2.5 draggable"
										 data-id="{{ $section->id }}">
										<div class="mb-5" x-data="modal">
										<div class="float-left">
											{{ $section->name }}
										</div>

										<!-- button -->
											<button type="button" class="float-right" @click="toggle">Edit</button>
											<!-- modal -->
											<div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
												<div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
													<div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
														<div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937] p-5">
															@include('pages.sections.section-inputs', ['isIterable' => $section->is_iterable])
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									@endif
								@endforeach
							</div>

							<div id="selected-sections"
								 class="flex-1 flex flex-col rounded-md border border-[#e0e6ed] dark:border-[#1b2e4b] handle">
								@foreach ($page->sections()->withPivot('id')->orderBy('id')->get() as $section)
									<div class="border-b border-[#e0e6ed] dark:border-[#1b2e4b] px-4 py-2.5 draggable"
										 data-id="{{ $section->id }}">

									<div class="mb-5" x-data="modal">
										<div class="float-left">
											{{ $section->name }}
										</div>

										<!-- button -->
										<button type="button" class="float-right" @click="toggle">Edit</button>
										<!-- modal -->
										<div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
											<div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
												<div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
													<div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937] p-5">
														@include('pages.sections.section-inputs', ['isIterable' => $section->is_iterable])
													</div>
												</div>
											</div>
										</div>
									</div>
									</div>

									<input type="hidden" name="sections[]" value="{{ $section->id }}" id="section_{{ $section->id }}">
								@endforeach
							</div>
						</div>
					</div>

					<div class="sm:col-span-2 mt-3">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		var availableSections = document.getElementById('available-sections');
		var selectedSections = document.getElementById('selected-sections');

		console.log('test');
		var sortable = Sortable.create(selectedSections, {
			group: 'shared',
			animation: 150,
			onAdd: function( evt ) {
				var item = evt.item;
				// item.parentNode.removeChild(item);
				var input = document.createElement('input');
				input.type = 'hidden';
				input.id = 'section_' + item.getAttribute('data-id');
				input.name = 'sections[]';
				input.value = item.getAttribute('data-id');
				document.getElementById('selected-sections').appendChild(input);

				rebuildInputs();

			},

			onRemove: function( evt ) {
				var item = evt.item;
				let input = document.getElementById('section_' + item.getAttribute('data-id'));
				input.remove();
				console.log('test test tes');

				rebuildInputs();

			},

			onUpdate: function( evt ) {
				console.log("this is test");
				rebuildInputs();
			}
		});

		var draggable = Sortable.create(availableSections, {
			group: 'shared',
			handle: '.handle',
			animation: 150,

		});

		function rebuildInputs() {
			var inputs = document.querySelectorAll('#selected-sections input[name="sections[]"]');
			var inputArr = Array.from(inputs);

			// Sort the inputs based on the order of the section divs
			inputArr.sort(function( a, b ) {
				var aIndex = Array.from(selectedSections.children).indexOf(document.querySelector(`[data-id="${a.value}"]`));
				var bIndex = Array.from(selectedSections.children).indexOf(document.querySelector(`[data-id="${b.value}"]`));
				return aIndex - bIndex;
			});

			// Remove all current inputs
			inputs.forEach(function( input ) {
				input.remove();
			});

			// Add the inputs back in the correct order
			inputArr.forEach(function( input ) {
				document.getElementById('selected-sections').appendChild(input);
			});
		}


	</script>

</x-layout.default>








<!-- script -->
<script>
	document.addEventListener("alpine:init", () => {
		Alpine.data("modal", (initialOpenState = false) => ({
			open: initialOpenState,

			toggle() {
				this.open = !this.open;
			},
		}));
	});
</script>
