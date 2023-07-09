<x-layout.default>
    @section('title', 'Hotel Details')

    <div class="mt-5 panel p-0 border-0 overflow-hidden">
        <template x-if="displayType === 'list'">
            <div class="table-responsive">
                <table class="table-striped table-hover whitespace-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Location</th>
                            <!-- Add more table headers if needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$hotel->name}}</td>
                            <td>{{$hotel->price}}</td>
                            <td>{{$hotel->location}}</td>
                            <!-- Add more table cells with hotel details if needed -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </template>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("hotels", () => ({
                displayType: 'list',
            }));
        });
    </script>
</x-layout.default>
