@if(!$isIterable)
	@foreach($section?->inputs as $name => $input)
		<div>
			<label for="{{ $name }}_id">{{ $name }}</label>
			<{{ $input['tag'] }} id="{{ $name }}_id" type="{{ $input['type'] }}" name="{{ $section->name }}[{{ $name }}]" class="form-input" value="{{ $section->pivot->data[$name] ?? "" }}">@if($input['close-tag']){{ $section->pivot->data[$name] ?? "" }}</{{ $input['tag'] }}>@endif
		</div>
	@endforeach
@else
	<div class="iterable">
		@if($section?->pivot?->data)
		@foreach($section?->pivot?->data as $object)
			@foreach($section->inputs as $name => $input)
				<div>
					<label for="{{ $name }}_id">{{ $name }}</label>
					<{{ $input['tag'] }} id="{{ $name }}_id" type="{{ $input['type'] }}" name="{{ $section->name }}[{{ $name }}][]" class="form-input" value="{{ $object[$name] ?? "" }}">@if($input['close-tag']){{ $object[$name] ?? "" }}</{{ $input['tag'] }}>@endif
	</div>
	@endforeach
	@endforeach
	@endif

	</div>
	<div id="new-slots-container"></div>
	<button type="button" class="btn btn-success add-slot">+</button>
@endif

@if($isIterable)

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			const addSlotBtn = document.querySelector(".add-slot");
			addSlotBtn.addEventListener("click", function() {
				let html = `
		@foreach($section->inputs as $name => $input)
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