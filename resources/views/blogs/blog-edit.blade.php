<x-layout.default>
	@section('title','Blog - Edit')
	<link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>
	<link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}"/>
	<script src="{{asset('assets/js/quill.js')}}"></script>

	<div>
		<ul class="flex space-x-2 rtl:space-x-reverse">
			<li>
				<a href="{{route('all.blog')}}" class="text-primary hover:underline">Blogs</a>
			</li>
			<li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
				<span>New</span>
			</li>
		</ul>
		<div class="pt-5">
			<div class="flex items-center justify-between mb-5">
				<h5 class="font-semibold text-lg dark:text-white-light">New Blog</h5>
			</div>
			<div x-data="{ tab: 'home' }">
				<ul
						class="sm:flex font-semibold border-b border-[#ebedf2] dark:border-[#191e3a] mb-5 whitespace-nowrap overflow-y-auto">
					<li class="inline-block">
						<a href="#"
						   class="flex gap-2 p-4 border-b border-transparent hover:border-primary hover:text-primary"
						   :class="{ '!border-primary text-primary': tab == 'home' }" @click="tab='home'">

							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								 xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
								<path opacity="0.5"
									  d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
									  stroke="currentColor" stroke-width="1.5"/>
								<path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5"
									  stroke-linecap="round"/>
							</svg>
							Home
						</a>
					</li>
				</ul>
				<template x-if="tab === 'home'">
					<div>
						<form method="POST" action="{{route('update.blog', $blog->id)}}" enctype="multipart/form-data"
							  class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]">
							@csrf
							@method('PUT')
							{{-- <h6 class="text-lg font-bold mb-5">General Information</h6> --}}
							@if (session()->get('success'))
								<div class=" text-center mb-5">
									<h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
								</div>
							@endif

							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif


							<div class="flex flex-col sm:flex-row">
								<div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
									<div>
										<label for="name">Title</label>
										<input id="title" type="text" name="title" value="{{ $blog->title }}"
											   class="form-input" required/>
									</div>

									<div>
										<label for="seachable-select">Category</label>
										<select id="seachable-select" name="category_id" required>
											@foreach ($categories as $category)
												<option name="category_id" @if($category->id == $blog->category_id) selected @endif
														value="{{$category->id}}">{{$category->name}}</option>
											@endforeach
										</select>
									</div>


									<div style="margin-bottom: 4rem">
										<label for="content">Content</label>

										<input id="content" style="display:none" name="content">

										<div id="editor">
											{!! $blog->content !!}
										</div>
									</div>


									<div>
										<label for="image">Photo</label>
										<input name="image" class="form-input" type="file" id="image">
									</div>


									<div>
										<label for="searchable">searchable</label>
										<select name="searchable" id="searchable" class="form-input">
											<option value="1" @if($blog->searchable) selected @endif>Yes</option>
											<option value="0" @if(!$blog->searchable) selected @endif>No</option>
										</select>
									</div>
									<div>
										<label for="seo_title">Seo Title</label>
										<input id="seo_title" type="text" name="seo_title" value="{{ $blog->seo_title }}"
											   class="form-input"/>
									</div>

									<div>
										<label for="seo_description">Seo Description</label>
										<textarea name="seo_description" id="seo_description"
												  class="form-input" cols="30" rows="10">{{ $blog->seo_description }}</textarea>
									</div>

									<div>
										<label for="featured_image">Featured Image</label>
										<input type="file" class="form-input" name="featured_image">
									</div>
									<div>
										<label for="facebook_title">Facebook Title</label>
										<input id="facebook_title" type="text" name="facebook_title" value="{{ $blog->facebook_title }}"
											   class="form-input"/>
									</div>

									<div>
										<label for="facebook_description">Facebook Description</label>
										<textarea name="facebook_description" id="facebook_description"
												  class="form-input" cols="30" rows="10">{{ $blog->facebook_description }}</textarea>
									</div>

									<div>
										<label for="facebook_image">Facebook Image</label>
										<input type="file" class="form-input" name="facebook_image">
									</div>

									<div>
										<label for="twitter_title">Twitter Title</label>
										<input id="twitter_title" type="text" name="twitter_title" value="{{ $blog->twitter_title }}"
											   class="form-input"/>
									</div>

									<div>
										<label for="twitter_description">Twitter Description</label>
										<textarea name="twitter_description" id="twitter_description"
												  class="form-input" cols="30" rows="10">{{ $blog->twitter_description }}</textarea>
									</div>

									<div>
										<label for="twitter_image">Twitter Image</label>
										<input type="file" class="form-input" name="twitter_image">
									</div>
									<div>
										<label for="status">publish</label>
										<select name="status" id="status" class="form-input">
											<option value="publish" @if($blog->status == 'publish') selected @endif >Publish</option>
											<option value="draft" @if($blog->status == 'draft') selected @endif>Draft</option>
										</select>
									</div>

									<div>
										<label for="logo">Logo</label>
										<input type="file" class="form-input" name="logo">
									</div>

									<div>
										<label for="header_style">header_style</label>
										<select name="header_style" id="header_style" class="form-input">
											<option value="normal" @if($blog->header_style == 'normal') selected @endif>Normal</option>
											<option value="transparent" @if($blog->header_style == 'transparent') selected @endif>Transparent</option>
										</select>
									</div>


									<div class="sm:col-span-2 mt-3">
										<button type="submit" class="btn btn-primary">Save</button>
									</div>
								</div>
							</div>
							<script>
								var quill = new Quill('#editor', {
									theme: 'snow'
								});
								var form = document.querySelector('form');
								form.onsubmit = function() {
									// Populate hidden form on submit
									var content = document.querySelector(".ql-editor").innerHTML;
									var bio = document.querySelector('input[name=content]');
									bio.value = content;
								};
							</script>
						</form>
					</div>
				</template>

			</div>
		</div>
	</div>
	<link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
	<script src="{{asset('assets/js/highlight.min.js')}}"></script>
	<script src="{{asset('assets/js/nice-select2.js')}}"></script>


	<script>
		document.addEventListener("DOMContentLoaded", function( e ) {
			// default
			var els = document.querySelectorAll(".selectize");
			els.forEach(function( select ) {
				NiceSelect.bind(select);
			});

			// seachable
			var options = {
				searchable: true
			};
			NiceSelect.bind(document.getElementById("seachable-select"), options);
		});

		var toolbar = quill.container.previousSibling;
		toolbar.querySelector('.ql-picker').setAttribute('title', 'Font Size');
		toolbar.querySelector('button.ql-bold').setAttribute('title', 'Bold');
		toolbar.querySelector('button.ql-italic').setAttribute('title', 'Italic');
		toolbar.querySelector('button.ql-link').setAttribute('title', 'Link');
		toolbar.querySelector('button.ql-underline').setAttribute('title', 'Underline');
		toolbar.querySelector('button.ql-clean').setAttribute('title', 'Clear Formatting');
		toolbar.querySelector('[value=ordered]').setAttribute('title', 'Ordered List');
		toolbar.querySelector('[value=bullet]').setAttribute('title', 'Bullet List');


	</script>

</x-layout.default>