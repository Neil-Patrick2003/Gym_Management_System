<x-trainer-layout>

    <div class="overflow-hidden mt-4 border rounded-lg bg-gray-100 shadow">
        <div class="px-4 py-5 sm:p-6">
            <div class="chart-container bg-white p-6 h-96">
                <h2 class="chart-title">Daily Sales for {{ $currentMonth }}</h2>
                <canvas id="salesChart" width="100" height="50"></canvas>
            </div>
            <div class="grid mt-8 mx-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-7">

                @foreach ($stats as $stat)
                <div class="relative bg-white shadow-sm space-y-2">
                    <!-- Title div that overlaps the left side of the card -->
                    <div class="w-full py-1 px-2 bg-red-500 text-white -ml-5 mt-2">
                      <p class="text-lg font-semibold tracking-wide">{{ $stat['title'] }}</p>
                    </div>
                    
                    <!-- Card Content -->
                    <div class="p-5">
                      <p class="text-3xl text-slate-800 font-thin">{{ $stat['value'] }}</p>
                    </div>
                  </div>
                @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="overflow-hidden mt-4 border rounded-lg bg-gray-100 shadow">
        <div class="px-4 py-5 sm:p-6">
            Today Schedules
        </div>
    </div>




    <script>
        // Get the data from the PHP variables passed to the Blade view
        var dates = @json($dates); // List of dates (YYYY-MM-DD)
        var sales = @json($sales); // Sales data for each date

        // Format the dates to show only the day (e.g., "1", "2", "3", etc.)
        var formattedDates = dates.map(function(date) {
            return new Date(date).getDate(); // Extract only the day of the month
        });

        // Create the chart
        var ctx = document.getElementById('salesChart').getContext('2d');

        // Create gradient for line
        var gradientStroke = ctx.createLinearGradient(0, 0, 0, 400);
        gradientStroke.addColorStop(0, "rgba(75, 192, 192, 1)");
        gradientStroke.addColorStop(1, "rgba(75, 192, 192, 0.2)");

        var gradientFill = ctx.createLinearGradient(0, 0, 0, 400);
        gradientFill.addColorStop(0, "rgba(75, 192, 192, 0.2)");
        gradientFill.addColorStop(1, "rgba(75, 192, 192, 0)");

        var salesChart = new Chart(ctx, {
            type: 'line', // Line chart type
            data: {
                labels: formattedDates, // X-axis labels (days of the month)
                datasets: [{
                    label: 'Total Sales (Profits)', // Label for the dataset
                    data: sales, // Y-axis data (sales)
                    borderColor: gradientStroke, // Line color (gradient)
                    backgroundColor: gradientFill, // Fill color (gradient)
                    fill: true, // Fill the area under the line
                    tension: 0.4, // Smoothness of the line
                    pointRadius: 5, // Point size
                    pointBackgroundColor: 'rgb(75, 192, 192)', // Point color
                    pointHoverRadius: 7, // Hover effect on point
                    pointHoverBackgroundColor: 'rgb(0, 123, 255)', // Hover color on point
                }]
            },
            options: {
                responsive: true, // Makes the chart responsive
                maintainAspectRatio: false, // Avoids fixed aspect ratio
                plugins: {
                    tooltip: {
                        callbacks: {
                            // Custom tooltip to display both date and sales
                            label: function(context) {
                                var date = formattedDates[context.dataIndex]; // Get the day from X-axis
                                var salesAmount = context.raw; // Get sales data from Y-axis
                                return 'Day ' + date + ': ' + salesAmount.toFixed(2); // Display in the tooltip
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true, // Ensures Y-axis starts from 0
                        ticks: {
                            callback: function(value) {
                                return '' + value.toFixed(2); // Format Y-axis with dollar sign
                            }
                        }
                    },
                    x: {
                        ticks: {
                            callback: function(value) {
                                return 'Day ' + value; // Format X-axis to show "Day X"
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-trainer-layout>
