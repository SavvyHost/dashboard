<x-layout.default>
	@section('title', 'Page - Edit')

	<div>
		<ul class="flex space-x-2 rtl:space-x-reverse">
			<li>
				<a href="{{ route('pages.page.index') }}" class="text-primary hover:underline">Pages</a>
			</li>
			<li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
				<span>Edit</span>
			</li>
		</ul>
		<div class="pt-5">
			<div class="flex items-center justify-between mb-5">
				<h5 class="font-semibold text-lg dark:text-white-light">Edit Page</h5>
			</div>

			<div>
				<form method="POST" action="{{ route('pages.page.update', $page->id) }}" enctype="multipart/form-data"
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
								<input id="name" type="text" name="name" class="form-input"
									   value="{{ $page->name }}" required/>
							</div>

							<div>
								<label for="searchable">Searchable</label>
								<select name="searchable" id="searchable" class="form-input">
									<option value="1" {{ $page->searchable == 1 ? 'selected' : '' }}>Yes</option>
									<option value="0" {{ $page->searchable == 0 ? 'selected' : '' }}>No</option>
								</select>
							</div>

							<div>
								<label for="seo_title">Seo Title</label>
								<input id="seo_title" type="text" name="seo_title" class="form-input"
									   value="{{ $page->seo_title }}"/>
							</div>

							<div>
								<label for="seo_description">Seo Description</label>
								<textarea name="seo_description" id="seo_description" class="form-input" cols="30"
										  rows="10">{{ $page->seo_description }}</textarea>
							</div>

							<div>
								<label for="featured_image">Featured Image</label>
								<input type="file" class="form-input" name="featured_image">
							</div>

							<div>
								<label for="facebook_title">Facebook Title</label>
								<input id="facebook_title" type="text" name="facebook_title" class="form-input"
									   value="{{ $page->facebook_title }}"/>
							</div>

							<div>
								<label for="facebook_description">Facebook Description</label>
								<textarea name="facebook_description" id="facebook_description" class="form-input"
										  cols="30" rows="10">{{ $page->facebook_description }}</textarea>
							</div>

							<div>
								<label for="facebook_image">Facebook Image</label>
								<input type="file" class="form-input" name="facebook_image">
							</div>

							<div>
								<label for="twitter_title">Twitter Title</label>
								<input id="twitter_title" type="text" name="twitter_title" class="form-input"
									   value="{{ $page->twitter_title }}"/>
							</div>

							<div>
								<label for="twitter_description">Twitter Description</label>
								<textarea name="twitter_description" id="twitter_description" class="form-input"
										  cols="30" rows="10">{{ $page->twitter_description }}</textarea>
							</div>

							<div>
								<label for="twitter_image">Twitter Image</label>
								<input type="file" class="form-input" name="twitter_image">
							</div>

							<div>
								<label for="publish">Publish</label>
								<select name="publish" id="publish" class="form-input">
									<option value="1" {{ $page->publish == 1 ? 'selected' : '' }}>Publish</option>
									<option value="0" {{ $page->publish == 0 ? 'selected' : '' }}>Draft</option>
								</select>
							</div>

							<div>
								<label for="logo">Logo</label>
								<input type="file" class="form-input" name="logo">
							</div>

							<div>
								<label for="header_style">Header Style</label>
								<select name="header_style" id="header_style" class="form-input">
									<option value="normal" {{ $page->header_style == 'normal' ? 'selected' : '' }}>Normal</option>
									<option value="transparent" {{ $page->header_style == 'transparent' ? 'selected' : '' }}>Transparent</option>
								</select>
							</div>
						</div>
					</div>

					<div class="flex justify-end mt-5">
						<button type="submit"
								class="bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded inline-flex items-center">
							<span>Save</span>
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</x-layout.default>