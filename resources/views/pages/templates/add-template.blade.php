<x-layout.default>
	@section('title','Template - New')

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
				<form method="POST" action="{{route('pages.template.store')}}"
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
							<div>
								<label for="name">Name</label>
								<input id="name" type="text" name="name" class="form-input" required/>
							</div>
							<div>
								<label for="body">Body</label>
								<textarea name="body" id="body" class="form-input" required></textarea>
							</div>
							<div>
								<label for="parameters">Parameters</label>
								<textarea name="parameters" id="parameters" class="form-input" required></textarea>

							</div>

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
