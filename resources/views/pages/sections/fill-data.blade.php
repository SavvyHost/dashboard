<x-layout.default>
	@section('title','Section - New')

	<div>
		<ul class="flex space-x-2 rtl:space-x-reverse">
			<li>
				<a href="{{route('pages.template.index')}}" class="text-primary hover:underline">Templates</a>
			</li>
			<li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
				<span>New</span>
			</li>
		</ul>
		<div class="pt-5">
			<div class="flex items-center justify-between mb-5">
				<h5 class="font-semibold text-lg dark:text-white-light">New Template</h5>
			</div>

			<div>
				<form method="POST" action="{{route('pages.section.store')}}"
					  class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]">
					@csrf
					<h6 class="text-lg font-bold mb-5">General Information</h6>
					@if (session()->get('success'))
						<div class=" text-center mb-5">
							<h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
						</div>
					@endif
					<div class="flex flex-col sm:flex-row">
						<div class="flex-1 gap-5">
							<input type="hidden" value="{{ $page_id }}" name="page_id">
							<input type="hidden" value="{{ $template_id }}" name="template_id">

							<div>
								<label for="name">Name</label>
								<input id="name" type="text" name="name" class="form-input" required/>
							</div>

							@foreach($parameters as $parameter)
							<div>
								<label for="{{ $parameter }}">{{ $parameter }}</label>
								<input id="{{ $parameter }}" type="text" name="{{ $parameter }}" class="form-input" required/>
							</div>
							@endforeach

							<div class="sm:col-span-2 mt-3">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-layout.default>
