<x-layout.default>
	@section('title', $page->name)
	<div x-data="contacts">
		<div class="flex items-center justify-between flex-wrap gap-4">
			<h2 class="text-xl">{{ $page->name }}</h2>
		</div>
		<div class="mt-5 panel p-0 border-0 overflow-hidden">
			<div class="table-responsive">
				@foreach($page->sections as $section)
					@foreach($section->body as $key => $value)
						@switch($key)
							@case('title')
								<h2 class="text-lg">{{ $value }}</h2>
							@break

							@case('body')
								<p class="gap-5">{{ $value }}</p>
							@break

						@endswitch

					@endforeach
				@endforeach
			</div>
		</div>
	</div>
</x-layout.default>
