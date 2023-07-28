<x-layout.default>

	@section('title','Blogs')
	@vite(['resources/css/app.css'])
	<div class="panel border-[#e0e6ed] px-0 dark:border-[#1b2e4b]" style="padding: 30px">
		<div x-data="contacts">
			<div class="flex items-center justify-between flex-wrap gap-4">
				<h2 class="text-xl">
					&nbsp;&nbsp;&nbsp;&nbsp;
					Blogs</h2>

				<input class="dataTable-search" placeholder="Search..." type="text"
					   style="width:30%;border-radius: 50px;margin-right:24%">
				<div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">

					<div class="mb-5 flex items-center gap-2">
						<button type="button" class="btn btn-danger gap-2" @click="deleteRow()">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								 xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
								<path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
									  stroke-linecap="round"></path>
								<path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
									  stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
								<path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5"
									  stroke-linecap="round"></path>
								<path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5"
									  stroke-linecap="round"></path>
								<path opacity="0.5"
									  d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
									  stroke="currentColor" stroke-width="1.5"></path>
							</svg>
							Delete
						</button>


						<a href="{{route('blog.create')}}" class="btn btn-primary gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
								 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
								 stroke-linejoin="round" class="h-5 w-5">
								<line x1="12" y1="5" x2="12" y2="19"></line>
								<line x1="5" y1="12" x2="19" y2="12"></line>
							</svg>
							Add New
						</a>
					</div>
				</div>
			</div>


			<div class="mt-5 panel p-0 border-0 overflow-hidden">
				{{-- <template x-if="displayType === 'list'"> --}}
				<div class="invoice-table">
					<div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">

						<div class="dataTable-container">
							<table id="myTable" class="whitespace-nowrap dataTable-table">
								<thead>
								<tr>

									<th data-sortable="false" style="width: 4.5%;">
										<input type="checkbox" class="form-checkbox" :checked="checkAllCheckbox"
											   :value="checkAllCheckbox" @change="checkAll($event.target.checked)">
									</th>

									<th>ID</th>
									<th style="width: 40%">Title</th>
									<th>Category</th>
									<th>Author</th>
                  <th>Image</th>
									<th>Date</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($blogs as $blog)
									<tr>
										<td>
											<input type="checkbox" class="form-checkbox mt-1"
												   :id="'chk' + {{ $blog->id }}" :value="({{ $blog->id }})"
												   x-model.number="selectedRows">
										</td>
										{{-- <td>
											<input type="checkbox" class="form-checkbox mt-1" :id="'chk' + 1" :value="({{$user->id}})" x-model.number="selectedRows" id="chk1" value="{{$user->id}}">
										</td> --}}
										<td>{{$blog->id}}</td>
										<td>

											<a href="{{ route('blog.edit', $blog->id) }}" class="hover:text-info">
												<div class="flex items-center font-semibold" style="width:40%">
													{{$blog->title}}
												</div>
											</a>
										</td>
										<td>{{$blog->category?->name}}</td>
										<td>{{$blog->user->name}}</td>
                                        <td>
                                            <div class="flex items-center font-semibold">
                                                <div class="p-0.5 bg-white-dark/30 rounded-full w-max ltr:mr-2 rtl:ml-2">
                                                    <img class="h-8 w-8 rounded-full object-cover"
                                                         src="{{ asset($blog->image) }}">
                                                </div>
                                            </div>
                                        </td>										<td>{{$blog->created_at}}</td>

										<td>
											@if ($blog->status == "publish")
												<span class="badge badge-outline-success">{{$blog->status}}
                                                                <span>
                                                            @else
																		<span class="badge badge-outline-danger">{{$blog->status}}
                                                                <span>
											@endif

										</td>


										<td>
											<form id="delete-form-{{ $blog->id }}"
                          action="{{ route('blog.destroy', $blog->id) }}" method="POST">
												@csrf
												@method('DELETE')
											</form>
											<div class="flex gap-4 items-center">

												<a href="{{ route('blog.edit', $blog->id) }}" class="hover:text-info">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														 xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5">
														<path opacity="0.5"
															  d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5"
															  stroke="currentColor" stroke-width="1.5"
															  stroke-linecap="round"></path>
														<path d="M17.3009 2.80624L16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9L8.03811 15.0229C7.9492 15.2897 8.01862 15.5837 8.21744 15.7826C8.41626 15.9814 8.71035 16.0508 8.97709 15.9619L10.1 15.5876L11.8354 15.0091C12.3775 14.8284 12.6485 14.7381 12.9035 14.6166C13.2043 14.4732 13.4886 14.2975 13.7513 14.0926C13.9741 13.9188 14.1761 13.7168 14.5801 13.3128L20.5449 7.34795L21.1938 6.69914C22.2687 5.62415 22.2687 3.88124 21.1938 2.80624C20.1188 1.73125 18.3759 1.73125 17.3009 2.80624Z"
															  stroke="currentColor" stroke-width="1.5"></path>
														<path opacity="0.5"
															  d="M16.6522 3.45508C16.6522 3.45508 16.7333 4.83381 17.9499 6.05034C19.1664 7.26687 20.5451 7.34797 20.5451 7.34797M10.1002 15.5876L8.4126 13.9"
															  stroke="currentColor" stroke-width="1.5"></path>
													</svg>
												</a>


												<a href="{{ route('blog.destroy', $blog->id) }}"
												   class="hover:text-danger"
												   onclick="showAlert(event, '{{ $blog->id }}')" , @click=" deleteRow(1)">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														 xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
														<path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
															  stroke-linecap="round"></path>
														<path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
															  stroke="currentColor" stroke-width="1.5"
															  stroke-linecap="round"></path>
														<path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor"
															  stroke-width="1.5" stroke-linecap="round"></path>
														<path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor"
															  stroke-width="1.5" stroke-linecap="round"></path>
														<path opacity="0.5"
															  d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
															  stroke="currentColor" stroke-width="1.5"></path>
													</svg>

												</a>
												</button>
											</div>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>

							<nav class="dataTable-pagination">
                                    {{ $blogs->links("vendor.pagination.tailwind") }}
							</nav>
						</div>
					</div>
				</div>
				{{-- </template> --}}
			</div>
		</div>
	</div>

	</div>

	@section('scripts')

		<script src="assets/js/alpine-collaspe.min.js"></script>
		<script src="assets/js/alpine-persist.min.js"></script>
		<script defer="" src="assets/js/alpine-ui.min.js"></script>
		<script defer="" src="assets/js/alpine-focus.min.js"></script>
		<script defer="" src="assets/js/alpine.min.js"></script>
		<script src="assets/js/custom.js"></script>

		<script>


			document.addEventListener("alpine:init", () => {
				Alpine.data("contacts", () => ({
					defaultParams: {
						id: null,
						name: '',
						email: '',
						username: '',
						phone: '',
						status: '',
					},

					displayType: 'list',
					addContactModal: false,
					params: {
						id: null,
						name: '',
						email: '',
						username: '',
						phone: '',
						status: '',
					},
					filterdContactsList: [],
					searchUser: '',
					contactList: {!! $blogs !!},

					init() {
						this.searchContacts();
					},

					checkAllCheckbox() {
						if ( this.items.length && this.selectedRows.length === this.items.length ) {
							return true;
						} else {
							return false;
						}
					},

					checkAll( isChecked ) {
						if ( isChecked ) {
							this.selectedRows = this.items.map(( d ) => {
								return d.id;
							});
						} else {
							this.selectedRows = [];
						}
					},

					setTableData() {
						this.dataArr = [];
						for ( let i = 0; i < this.items.length; i++ ) {
							this.dataArr[i] = [];
							for ( let p in this.items[i] ) {
								if ( this.items[i].hasOwnProperty(p) ) {
									this.dataArr[i].push(this.items[i][p]);
								}
							}
						}
					},

					searchInvoice() {
						return this.items.filter(( d ) =>
							(d.id && d.id.toLowerCase().includes(this.searchText)) ||
							(d.name && d.name.toLowerCase().includes(this.searchText)) ||
							(d.email && d.email.toLowerCase().includes(this.searchText)) ||
							(d.username && d.username.toLowerCase().includes(this.searchText)) ||
							(d.phone && d.phone.toLowerCase().includes(this.searchText)) ||
							(d.status && d.status.toLowerCase().includes(this.searchText))
						);
					},

					// deleteRow(item) {
					//     if (confirm('Are you sure want to delete selected row ?')) {
					//         if (item) {
					//             this.items = this.items.filter((d) => d.id != item);
					//             this.selectedRows = [];
					//         } else {
					//             this.items = this.items.filter((d) => !this.selectedRows.includes(d.id));
					//             this.selectedRows = [];
					//         }
					//     }
					// },

				}));
			});

		</script>

		<script>
			function showAlert( event, userId ) {
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
				}).then(( result ) => {
					if ( result.isConfirmed ) {
						document.getElementById('delete-form-' + userId).submit();
					}
				});
			}
		</script>

	@endsection
</x-layout.default>

