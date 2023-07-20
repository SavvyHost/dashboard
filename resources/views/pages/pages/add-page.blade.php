<x-layout.default>
	@section('title','Page - New')

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
				<h5 class="font-semibold text-lg dark:text-white-light">Add new page</h5>
			</div>

			<div>
				<form method="POST" action="{{route('pages.page.store')}}" enctype="multipart/form-data"
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


							<!-- basic -->
							<div class="mb-5" x-data="{ activeTab: 1}">
								<div class="inline-block w-full">
									<ul class="mb-5 grid grid-cols-6 text-center">
										<li>
											<a href="javascript:"
											   class="bg-[#f3f2ee] dark:bg-[#1b2e4b] p-2.5 block rounded-full"
											   :class="{'!bg-primary text-white': activeTab === 1}"
											   @click="activeTab = 1">Page Content</a>
										</li>
										<li>
											<a href="javascript:"
											   class="bg-[#f3f2ee] dark:bg-[#1b2e4b] p-2.5 block rounded-full"
											   :class="{'!bg-primary text-white': activeTab === 2}"
											   @click="activeTab = 2">Seo</a>
										</li>
										<li>
											<a href="javascript:"
											   class="bg-[#f3f2ee] dark:bg-[#1b2e4b] p-2.5 block rounded-full"
											   :class="{'!bg-primary text-white': activeTab === 3}"
											   @click="activeTab = 3">Facebook</a>
										</li>
										<li>
											<a href="javascript:"
											   class="bg-[#f3f2ee] dark:bg-[#1b2e4b] p-2.5 block rounded-full"
											   :class="{'!bg-primary text-white': activeTab === 4}"
											   @click="activeTab = 4">Twitter</a>
										</li>
										<li>
											<a href="javascript:"
											   class="bg-[#f3f2ee] dark:bg-[#1b2e4b] p-2.5 block rounded-full"
											   :class="{'!bg-primary text-white': activeTab === 5}"
											   @click="activeTab = 5">Publish</a>
										</li>
									</ul>
									<div>
										<template x-if="activeTab === 1">
											<div>
												<div>
													<label for="name">Name</label>
													<input id="name" type="text" name="name" class="form-input"
														   required/>
												</div>

												<div>
													<label for="searchable">searchable</label>
													<select name="searchable" id="searchable" class="form-input">
														<option value="1">Yes</option>
														<option value="0">No</option>
													</select>
												</div>

												<div>
													<label for="header_style">header_style</label>
													<select name="header_style" id="header_style" class="form-input">
														<option value="normal">Normal</option>
														<option value="transparent">Transparent</option>
													</select>
												</div>
											</div>

										</template>
										<template x-if="activeTab === 2">

											<div>
												<div>
													<label for="seo_title">Seo Title</label>
													<input id="seo_title" type="text" name="seo_title"
														   class="form-input"/>
												</div>
                          
												<div>
													<label for="seo_description">Seo Description</label>
													<textarea name="seo_description" id="seo_description"
															  class="form-input" cols="30" rows="10"></textarea>
												</div>
                                                 
												<div>
													<label for="featured_image">Featured Image</label>
													<input type="file" class="form-input" name="featured_image">
												</div>
											</div>
										</template>
										<template x-if="activeTab === 3">

											<div>
												<div>
													<label for="facebook_title">Facebook Title</label>
													<input id="facebook_title" type="text" name="facebook_title"
														   class="form-input"/>
												</div>

												<div>
													<label for="facebook_description">Facebook Description</label>
													<textarea name="facebook_description" id="facebook_description"
															  class="form-input" cols="30" rows="10"></textarea>
												</div>

												<div>
													<label for="facebook_image">Facebook Image</label>
													<input type="file" class="form-input" name="facebook_image">
												</div>
											</div>
										</template>
										<template x-if="activeTab === 4">
											<div>
												<div>
													<label for="twitter_title">Twitter Title</label>
													<input id="twitter_title" type="text" name="twitter_title"
														   class="form-input"/>
												</div>

												<div>
													<label for="twitter_description">Twitter Description</label>
													<textarea name="twitter_description" id="twitter_description"
															  class="form-input" cols="30" rows="10"></textarea>
												</div>

												<div>
													<label for="twitter_image">Twitter Image</label>
													<input type="file" class="form-input" name="twitter_image">
												</div>
											</div>
										</template>
										<template x-if="activeTab === 5">
											<div>
												<div>
													<label for="publish">publish</label>
													<select name="publish" id="publish" class="form-input">
														<option value="1">Publish</option>
														<option value="0">Draft</option>
													</select>
												</div>

												<div>
													<label for="logo">Logo</label>
													<input type="file" class="form-input" name="logo">
												</div>

											</div>

										</template>
									</div>
									<div class="flex justify-between mt-5">
										<button type="button" class="btn btn-primary" :disabled="activeTab === 1"
												@click="activeTab--">Back
										</button>
										<button type="button" class="btn btn-primary" :disabled="activeTab === 5"
												@click="activeTab++">Next
										</button>
									</div>
								</div>
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
