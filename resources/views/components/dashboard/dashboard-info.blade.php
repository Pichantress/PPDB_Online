<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            PENDAFTAR</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ \App\Models\registrants::count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            PENDING</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @php
                                $totalRegistrants = \App\Models\registrants::count(); // Assuming $allRegistrants is the array of all registrants
                                $totalAcceptedRegistrants = \App\Models\acceptedregistrants::count(); // Assuming $acceptedRegistrants is the array of accepted registrants
                                $Pending = $totalRegistrants - $totalAcceptedRegistrants ;
                            @endphp
                            {{ $Pending }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Verified
                        </div>
                        <div class="row no-gutters align-items-center">
                            @php
                                $totalRegistrants = \App\Models\registrants::count(); // Assuming $allRegistrants is the array of all registrants
                                $totalAcceptedRegistrants = \App\Models\acceptedregistrants::count(); // Assuming $acceptedRegistrants is the array of accepted registrants
                                $percentage = $totalRegistrants > 0 ? ceil(($totalAcceptedRegistrants / $totalRegistrants) * 100) : 0;
                            @endphp
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $percentage }}%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Pie Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Pending
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Verified
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Pendaftar
                    </span>
                </div>
                <script>
                    var siswaCount = {{ \App\Models\acceptedRegistrants::count() }};
                    var pendaftarCount = {{ \App\Models\registrants::count() }};
                    var pending = pendaftarCount - siswaCount;
                </script>
                <div class="mt-4 text-center small">
                </div>
            </div>
        </div>
    </div>
</div>
