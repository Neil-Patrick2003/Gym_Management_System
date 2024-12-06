<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                <!-- Total Sales Card -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="flex items-center space-x-6">
                        <div class="text-4xl text-green-500">
                            <i class="fas fa-chart-line"></i> <!-- Sales Icon with an Arrow -->
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-700">Total Sales</h3>
                            <p class="text-3xl font-semibold text-gray-900">{{ $stats[0]['value'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Appointment Statuses Card -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        <div class="text-2xl text-gray-700">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Appointment Statuses</h3>
                            <ul class="space-y-2">
                                <li class="flex items-center text-gray-900">
                                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                    Accepted: <span class="font-semibold">{{ $statusCounts['accepted'] ?? 0 }}</span>
                                </li>
                                <li class="flex items-center text-gray-900">
                                    <i class="fas fa-times-circle text-red-500 mr-2"></i>
                                    Denied: <span class="font-semibold">{{ $statusCounts['denied'] ?? 0 }}</span>
                                </li>
                                <li class="flex items-center text-gray-900">
                                    <i class="fas fa-hourglass-half text-yellow-500 mr-2"></i>
                                    Pending: <span class="font-semibold">{{ $statusCounts['pending'] ?? 0 }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Additional Cards for Recommendation Counts -->



                @foreach($recommendationCounts as $recommendation)
                    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center justify-center">
                        <div class="text-4xl text-gray-700 mb-4">
                            <!-- Supplement icon -->
                            <i class="fas fa-pills text-blue-500"></i> <!-- Supplement icon -->
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-semibold text-gray-700">{{ $recommendation->type }} Recommendations</h3>
                            <p class="text-2xl font-semibold text-gray-900">{{ $recommendation->count }}</p>
                        </div>
                    </div>
                @endforeach






            </div>





        </div>





        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mt-6">


            <!-- User Roles Chart Card -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">User Roles Distribution</h3>
                <div class="relative">
                    <canvas id="rolesChart" class="w-full h-48"></canvas>
                </div>
            </div>

            <!-- Programs Bar Chart Card -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Programs Distribution</h3>
                <div class="relative">
                    <canvas id="programsChart" class="w-full h-48"></canvas>
                </div>
            </div>
        </div>

        <!-- Additional Cards for Role Counts -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-6 justify-center">
            <!-- Admin Role Card -->
            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center justify-center">
                <div class="text-3xl text-gray-700">
                    <i class="fas fa-user-shield"></i> <!-- Admin Icon -->
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-semibold text-gray-700">Admins</h3>
                    <p class="text-2xl font-semibold text-gray-900">{{ $roleCounts['admin'] ?? 0 }}</p>
                </div>
            </div>

            <!-- Member Role Card -->
            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center justify-center">
                <div class="text-3xl text-gray-700">
                    <i class="fas fa-user"></i> <!-- Member Icon -->
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-semibold text-gray-700">Members</h3>
                    <p class="text-2xl font-semibold text-gray-900">{{ $roleCounts['member'] ?? 0 }}</p>
                </div>
            </div>

            <!-- Trainer Role Card -->
            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center justify-center">
                <div class="text-3xl text-gray-700">
                    <i class="fas fa-chalkboard-teacher"></i> <!-- Trainer Icon -->
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-semibold text-gray-700">Trainers</h3>
                    <p class="text-2xl font-semibold text-gray-900">{{ $roleCounts['trainer'] ?? 0 }}</p>
                </div>
            </div>
        </div>


        <!-- Align Sales Overview Chart Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6 mt-6">
            <!-- Sales Overview Chart Card -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Sales Overview</h3>
                <div class="relative">
                    <canvas id="salesChart" class="w-full h-48"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div>



    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Prepare data for the roles chart
        const roles = @json($roles);

        const rolesLabels = roles.map(role => role.role || 'Unknown');
        const rolesData = roles.map(role => role.count);

        const rolesCtx = document.getElementById('rolesChart').getContext('2d');
        new Chart(rolesCtx, {
            type: 'pie',
            data: {
                labels: rolesLabels,
                datasets: [{
                    label: 'Users by Role',
                    data: rolesData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.label}: ${tooltipItem.raw}`;
                            }
                        }
                    }
                }
            }
        });

        // Prepare data for the programs chart
        const programs = @json($programs);

        const programsLabels = programs.map(program => program.name);
        const programsData = programs.map(program => program.count);

        const programsCtx = document.getElementById('programsChart').getContext('2d');
        new Chart(programsCtx, {
            type: 'bar',
            data: {
                labels: programsLabels,
                datasets: [{
                    label: 'Programs Count',
                    data: programsData,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true,
                    },
                    y: {
                        beginAtZero: true,
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.label}: ${tooltipItem.raw}`;
                            }
                        }
                    }
                }
            }
        });
    </script>


    <!-- Add the chart script -->
    <script>
        // Individual Transaction Data
        const transactions = @json($transactions);

        const transactionLabels = transactions.map(transaction => {
            const date = new Date(transaction.created_at);
            return `${date.toLocaleDateString()} ${date.toLocaleTimeString()}`;
        });

        const transactionData = transactions.map(transaction => transaction.amount);

        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: transactionLabels,
                datasets: [{
                    label: 'Sales per Transaction',
                    data: transactionData,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 2,
                    fill: false, // Line graph without fill
                    tension: 0.3 // Smooth curves
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `Php ${tooltipItem.raw.toLocaleString()}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Transaction Timestamp',
                        },
                        ticks: {
                            autoSkip: true, // Skip some labels for better readability
                            maxRotation: 45,
                            minRotation: 0
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Amount (Php)',
                        },
                    }
                }
            }
        });
    </script>



</x-app-layout>