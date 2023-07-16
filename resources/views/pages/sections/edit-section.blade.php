<x-layout.default>
	@section('title','Section - Edit')

	<div>
		<ul class="flex space-x-2 rtl:space-x-reverse">
			<li>
				<a href="{{route('pages.section.index')}}" class="text-primary hover:underline">Sections</a>
			</li>
			<li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
				<span>New</span>
			</li>
		</ul>
		<div class="pt-5">
			<div class="flex items-center justify-between mb-5">
				<h5 class="font-semibold text-lg dark:text-white-light">Edit Section</h5>
			</div>

			<div>
				<form method="POST" action="{{ route('pages.section.update', $section->id) }}"
					  class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]">
					@csrf
					@method('PUT')
					<h6 class="text-lg font-bold mb-5">General Information</h6>
					@if (session()->get('success'))
						<div class=" text-center mb-5">
							<h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
						</div>
					@endif
					<div class="flex flex-col sm:flex-row">
						<div class="flex-1 gap-5">


							<div>
								<label for="name">Name</label>
								<input type="text" id="name" name="name" class="form-input" value="{{ $section->name }}"
									   disabled>
							</div>


							@if(!$isIterable)
								@foreach($inputs as $name => $input)
									<div>
										<label for="{{ $name }}_id">{{ $name }}</label>
										<{{ $input['tag'] }} id="{{ $name }}_id" type="{{ $input['type'] }}" name="{{ $name }}" class="form-input" value="{{ $section->data[$name] ?? "" }}">@if($input['close-tag']){{ $section->data[$name] ?? "" }}</{{ $input['tag'] }}>@endif
									</div>
								@endforeach
							@else
								<div class="iterable">
									@foreach($section->data as $object)
										@foreach($inputs as $name => $input)
										<div>
											<label for="{{ $name }}_id">{{ $name }}</label>
											<{{ $input['tag'] }} id="{{ $name }}_id" type="{{ $input['type'] }}" name="{{ $name }}[]" class="form-input" value="{{ $object[$name] ?? "" }}">@if($input['close-tag']){{ $object[$name] ?? "" }}</{{ $input['tag'] }}>@endif
										</div>
						@endforeach
									@endforeach
								</div>
					<div id="new-slots-container"></div>
					<button type="button" class="btn btn-success add-slot">+</button>
					@endif


						<div class="sm:col-span-2 mt-3">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
			</div>
			</form>
		</div>
	</div>
	</div>


	@if($isIterable)

		<script>
		document.addEventListener("DOMContentLoaded", function() {
		const addSlotBtn = document.querySelector(".add-slot");
		addSlotBtn.addEventListener("click", function() {
		let html = `
		@foreach($inputs as $name => $input)
			<div>
				<label for="{{ $name }}_id">{{ $name }}</label>
				<{{ $input['tag'] }} id="{{ $name }}_id" type="{{ $input['type'] }}" name="{{ $name }}[]" class="form-input">@if($input['close-tag'])</{{ $input['tag'] }}>@endif
			</div>
		@endforeach
		`;
		const newSlotsContainer = document.querySelector("#new-slots-container");
		newSlotsContainer.insertAdjacentHTML('beforeend', html);
		index++;
		});

		document.addEventListener("click", function(event) {
		if (event.target.classList.contains("remove-slot")) {
		console.log("test");
		event.target.closest(".form-group").remove();
		}
		});
		});
		</script>

	@endif
</x-layout.default>
