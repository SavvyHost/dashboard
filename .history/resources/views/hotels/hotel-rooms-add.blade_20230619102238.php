<x-layout.default>
    @section('title','Rooms - New')
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div >
        {{-- <a href="{{route('room.at.form.show',$id)}}" class="text-primary hover:underline">Rooms</a> --}}

        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{route('rooms.show')}}" class="text-primary hover:underline">Rooms</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>New</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">

                    <h5 class="font-semibold text-lg dark:text-white-light">Enter Room Details</h5>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif

                <div class="mb-5">

                    <form class="space-y-5" method="POST" action="{{route('room.form.save',$id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex sm:flex-row flex-col ">
                            <label for="name" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Room Name</label>
                            <input id="name" type="text"  placeholder="Enter Room Name"
                                class="form-input flex-1" name="name" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="max_adult" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Max Adult</label>
                            <input id="max_adult" type="text"  placeholder="Enter Max Adult"
                                class="form-input flex-1" name="max_adult" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="max_child" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Max Child</label>
                            <input id="max_child" type="text"  placeholder="Enter Max Child"
                                class="form-input flex-1" name="max_child" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="price" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Room Price</label>
                            <input id="price" type="text"  placeholder="Enter Room Price"
                                class="form-input flex-1" name="price" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <div style="margin-right: 10px">
                                <label for="ctnFile">Banner Image</label>
                                <input id="ctnFile" type="file"  name="banner" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file-ml-5 file:text-white file:hover:bg-primary" required>
                                <output></output>
                            </div>
                            <div style="margin-right: 10px">
                                <label for="ctnFile">Images</label>
                                <input id="ctnFile" type="file" multiple="multiple" name="image[]" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file-ml-5 file:text-white file:hover:bg-primary" required>
                                <output></output>
                            </div>


                                <div class="flex sm:flex-row flex-col ">
                                    @foreach ($attrs as  $attr)
                                        <div class="w-full" style="margin-right: 10px">
                                            <label for="ctnFile">{{$attr->name}}</label>
                                            <select class="selectize" name="terms[]" multiple='multiple'>
                                                @foreach ($attr->terms as $term)
                                                    <option value="{{$term->id}}">{{$term->name}}{{$term->price}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                </div>


                        </div>
                        <div class="flex sm:flex-row flex-col">
                            <div class="w-full" style="margin-right: 10px">
                                <label for="ctnFile">Type</label>
                                <select class="selectize" name="type" {{-- multiple='multiple' --}}>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }} {{$type->price}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col">
                            <div class="w-full" style="margin-right: 10px">
                                <label for="ctnFile">Suppliements</label>
                                <select class="selectize" name="sups[]" multiple='multiple'>
                                    @foreach ($sups as $sup)
                                        <option value="{{ $sup->id }}">{{ $sup->name }} {{$sup->price}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <?php
$totalPrice = 0;

// Iterate over the $attrs array
foreach ($attrs as $attr) {
    // Iterate over the $attr->terms array
    foreach ($attr->terms as $term) {
        $price = floatval($term->price);
        $totalPrice += $price;
    }
}

// Iterate over the $types array
foreach ($types as $type) {
    $price = floatval($type->price);
    $totalPrice += $price;
}

// Iterate over the $sups array
foreach ($sups as $sup) {
    $price = floatval($sup->price);
    $totalPrice += $price;
}
?>











                        {{-- <div class="flex sm:flex-row flex-col ">
                            @foreach ($attrs as $attr)
                                <div class="w-full" style="margin-right: 10px">
                                    <label for="ctnFile">{{$attr->name}}</label>
                                    <select class="selectize" name="terms[]" multiple='multiple'>
                                        @foreach ($attr->terms as $term)
                                            <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div> --}}
                        <div class="mb-5">
                            <label for="editor">Description</label>
                            <input  style="display:none" name="description">

                            <div id="editor"></div>
                        </div>

                        <div x-data="chart" x-init="init()" class="bg-white dark:bg-black rounded-lg">
                            <div x-ref="radialBarChart"></div>
                            <div>Total Price: <span x-text="totalPrice"></span></div>
                        </div>


                        <button type="submit" class="btn btn-primary !mt-6">Submit</button>


                        <!-- radial bar -->


                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="{{asset('assets/js/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select2.js')}}"></script>

    <!-- end hightlight js -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var form = document.querySelector('form');
        form.onsubmit = function() {
        // Populate hidden form on submit
        var content = document.querySelector(".ql-editor").innerHTML;
        var bio = document.querySelector('input[name=description]');
        bio.value = content;
        };
    </script>
    <!-- script -->
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            // default
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
    </script>

<!-- script -->
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("chart", () => ({

            init() {
                isDark = this.$store.app.theme === "dark" ? true : false;

                let radialBarChart = new ApexCharts(this.$refs.radialBarChart, this.radialBarChartOptions);
                radialBarChart.render();

                get radialBarChartOptions() {
                    return {
                        series: [44, 55, 41],
                        chart: {
                            height: 300,
                            type: 'radialBar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4361ee', '#805dca', '#e2a03f'],
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        plotOptions: {
                            radialBar: {
                                dataLabels: {
                                    name: {
                                        fontSize: '22px',
                                    },
                                    value: {
                                        fontSize: '16px',
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        formatter: function(w) {
                                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                            return
                                        }
                                    }
                                }
                            }
                        },
                        labels: ['Apples', 'Oranges', 'Bananas'],
                        fill: {
                            opacity: 0.85
                        }
                    }
                },

                this.$watch('$store.app.theme', () => {
                    isDark = this.$store.app.theme === "dark" ? true : false;
                    radialBarChart.updateOptions(this.radialBarChartOptions);
                })
            },
        }));
    });
</script>

<!-- script -->
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("chart", () => ({
            totalPrice: 0,

            init() {
                this.calculateTotalPrice();
                this.renderChart();

                this.$watch('$store.app.theme', () => {
                    this.renderChart();
                });
            },

            calculateTotalPrice() {
                let totalPrice = 0;

                // Iterate over the $attrs array
                this.$refs.attrs.forEach((attr) => {
                    // Iterate over the $attr->terms array
                    attr.terms.forEach((term) => {
                        let price = parseFloat(term.price);
                        totalPrice += price;
                    });
                });

                // Iterate over the $types array
                this.$refs.types.forEach((type) => {
                    let price = parseFloat(type.price);
                    totalPrice += price;
                });

                // Iterate over the $sups array
                this.$refs.sups.forEach((sup) => {
                    let price = parseFloat(sup.price);
                    totalPrice += price;
                });

                this.totalPrice = totalPrice.toFixed(2);
            },

            renderChart() {
                let isDark = this.$store.app.theme === "dark";
                let radialBarChart = new ApexCharts(this.$refs.radialBarChart, this.radialBarChartOptions(isDark));
                radialBarChart.render();
            },

            radialBarChartOptions(isDark) {
                return {
                    series: [44, 55, 41],
                    chart: {
                        height: 300,
                        type: 'radialBar',
                        zoom: {
                            enabled: false
                        },
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#4361ee', '#805dca', '#e2a03f'],
                    grid: {
                        borderColor: isDark ? '#191e3a' : '#e0e6ed',
                    },
                    plotOptions: {
                        radialBar: {
                            dataLabels: {
                                name: {
                                    fontSize: '22px',
                                },
                                value: {
                                    fontSize: '16px',
                                },
                                total: {
                                    show: true,
                                    label: 'Total',
                                    formatter: (w) => {
                                        return this.totalPrice;
                                    }
                                }
                            }
                        }
                    },
                    labels: ['Apples', 'Oranges', 'Bananas'],
                    fill: {
                        opacity: 0.85
                    }
                };
            }
        }));
    });
</script>
</x-layout.default>
