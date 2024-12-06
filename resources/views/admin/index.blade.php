<x-app-layout>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }} {{ $user->name }}
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
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-6">
                <!-- Admin Role Card -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        <div class="text-2xl text-gray-700">
                            <i class="fas fa-user-shield"></i> <!-- Admin Icon -->
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Admins</h3>
                            <p class="text-xl font-semibold text-gray-900">{{ $roleCounts['admin'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <!-- User Role Card -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        <div class="text-2xl text-gray-700">
                            <i class="fas fa-user"></i> <!-- User Icon -->
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Users</h3>
                            <p class="text-xl font-semibold text-gray-900">{{ $roleCounts['user'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <!-- Trainer Role Card -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        <div class="text-2xl text-gray-700">
                            <i class="fas fa-chalkboard-teacher"></i> <!-- Trainer Icon -->
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Trainers</h3>
                            <p class="text-xl font-semibold text-gray-900">{{ $roleCounts['trainer'] ?? 0 }}</p>
                        </div>
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
                            label: function(tooltipItem) {
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
                            label: function(tooltipItem) {
                                return `${tooltipItem.label}: ${tooltipItem.raw}`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
