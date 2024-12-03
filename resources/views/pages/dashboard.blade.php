<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard') }}" method="get">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="start_date">Start Date:</label>
                                            <input type="date" id="start_date" class="form-control" name="start_date"
                                                value="{{ request('start_date') }}" max="{{ now()->toDateString() }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="end_date">End Date:</label>
                                            <input type="date" id="end_date" class="form-control" name="end_date"
                                                value="{{ request('end_date') }}" max="{{ now()->toDateString() }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 d-flex flex-column justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            Search
                                        </button>
                                    </div>
                                    <div class="col-sm-2 d-flex flex-column justify-content-end">
                                        <a href="{{ route('dashboard') }}"
                                            class="btn btn-light">
                                            Reset
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card dash-mini card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1" id="overviewText">Overview</h4>
                        </div><!-- end card header -->

                        <div class="card-body pt-1">
                            <div class="row">
                                <div class="col-lg-3 mini-widget pb-3 pb-lg-0">
                                    <div class="d-flex align-items-end">
                                        <div class="flex-grow-1">
                                            <h2 class="mb-0 fs-24">
                                                <span class="counter-value" data-target="{{ $customers->count() }}"
                                                    id="clientsAdded"></span>
                                            </h2>
                                            <h5 class="text-muted fs-16 mt-2 mb-0">Total Customers</h5>
                                        </div>
                                        <div class="flex-shrink-0 me-1">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-title bg-soft-warning rounded fs-3">
                                                    <i class="las la-user-circle text-warning"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 mini-widget py-3 py-lg-0">
                                    <div class="d-flex align-items-end">
                                        <div class="flex-grow-1">
                                            <h2 class="mb-0 fs-24">
                                                <span class="counter-value"
                                                    data-target="{{ $pendingOrders->count() }}"
                                                    id="pendingOrders"></span>
                                            </h2>
                                            <h5 class="text-muted fs-16 mt-2 mb-0">Pending Orders</h5>
                                        </div>
                                        <div class="flex-shrink-0 me-1">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-title bg-soft-info rounded fs-3">
                                                    <i class="las la-file-invoice text-info"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 mini-widget py-3 py-lg-0">
                                    <div class="d-flex align-items-end">
                                        <div class="flex-grow-1">
                                            <h2 class="mb-0 fs-24">
                                                <span class="counter-value"
                                                    data-target="{{ $processingOrders->count() }}"
                                                    id="processingOrders"></span>
                                            </h2>
                                            <h5 class="text-muted fs-16 mt-2 mb-0">Processing Orders</h5>
                                        </div>
                                        <div class="flex-shrink-0 me-1">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-title bg-soft-success rounded fs-3">
                                                    <i class="las la-file-invoice text-success"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-lg-3 mini-widget pt-3 pt-lg-0">
                                    <div class="d-flex align-items-end">
                                        <div class="flex-grow-1">
                                            <h2 class="mb-0 fs-24">
                                                <span class="counter-value" data-target="{{ $completedOrders->count() }}"
                                                    id="completedOrders"></span>
                                            </h2>
                                            <h5 class="text-muted fs-16 mt-2 mb-0">Completed Orders</h5>
                                        </div>
                                        <div class="flex-shrink-0 me-1">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                                    <i class="las la-file-invoice text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <!-- card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-2">
                                        €
                                        <span class="counter-value"
                                            data-target="{{ $pendingOrders->sum('total_amount') }}"></span>
                                    </h4>
                                    <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Pending Orders</p>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light rounded-circle fs-3">
                                        <i class="las la-file-alt fs-24 text-primary"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <span
                                        class="badge bg-success me-1">{{ number_format($pendingOrders->count()) }}</span>
                                    <span class="text-muted">Pending Orders</span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-2">
                                        €
                                        <span class="counter-value"
                                            data-target="{{ $processingOrders->sum('total_amount') }}"></span>
                                    </h4>
                                    <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Processing Orders</p>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light rounded-circle fs-3">
                                        <i class="las la-check-square fs-24 text-primary"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <span
                                        class="badge bg-warning me-1">{{ number_format($processingOrders->count()) }}</span>
                                    <span class="text-muted">Processing Orders</span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-2">
                                        €
                                        <span class="counter-value"
                                            data-target="{{ $completedOrders->sum('total_amount') }}"></span>
                                    </h4>
                                    <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Completed Orders</p>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light rounded-circle fs-3">
                                        <i class="las la-clock fs-24 text-primary"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <span
                                        class="badge bg-primary me-1">{{ number_format($completedOrders->count()) }}</span>
                                    <span class="text-muted">Completed Orders</span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Payment Activity</h4>
                        </div>
                        <div class="card-body py-1">
                            <div class="row gy-2">
                                <div class="col-12">
                                    <h4 class="fs-22 mb-0">
                                        €{{ $totalOrders->sum('total_amount') }}
                                    </h4>
                                </div>
                            </div>

                            <div id="stacked-column-chart" class="apex-charts"
                                data-colors='["--in-light", "--in-primary-rgb, 0.7", "--in-primary"]' dir="ltr"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="card-title mb-2 text-truncate">Orders</h5>
                                </div>
                            </div>

                            <div id="structure-widget"
                                data-colors='["--in-primary", "--in-primary-rgb, 0.7", "--in-light"]'
                                class="apex-charts" dir="ltr"></div>


                            <div class="px-2">
                                <div class="structure-list d-flex justify-content-between border-bottom">
                                    <p class="mb-0">
                                        <i class="las la-dot-circle fs-18 text-primary me-2"></i>
                                        Pending
                                    </p>
                                    <div>
                                        <span
                                            class="pe-2 pe-sm-5">€{{ $pendingOrders->sum('total_amount') }}</span>
                                    </div>
                                </div>
                                <div class="structure-list d-flex justify-content-between border-bottom">
                                    <p class="mb-0">
                                        <i class="las la-dot-circle fs-18 text-primary me-2"></i>
                                        Processing
                                    </p>
                                    <div>
                                        <span
                                            class="pe-2 pe-sm-5">€{{ $processingOrders->sum('total_amount') }}</span>
                                    </div>
                                </div>
                                <div class="structure-list d-flex justify-content-between pb-0">
                                    <p class="mb-0">
                                        <i class="las la-dot-circle fs-18 text-primary me-2"></i>
                                        Completed
                                    </p>
                                    <div>
                                        <span
                                            class="pe-2 pe-sm-5">€{{ $completedOrders->sum('total_amount') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>

    <script>
        function getChartColorsArray(e) {
            if (null !== document.getElementById(e)) {
                var o = document.getElementById(e).getAttribute("data-colors");
                if (o)
                    return (o = JSON.parse(o)).map(function(e) {
                        var o = e.replace(" ", "");
                        return -1 === o.indexOf(",") ?
                            getComputedStyle(document.documentElement).getPropertyValue(o) || o :
                            2 == (e = e.split(",")).length ?
                            "rgba(" +
                            getComputedStyle(document.documentElement).getPropertyValue(e[0]) +
                            "," +
                            e[1] +
                            ")" :
                            o;
                    });
                console.warn("data-colors atributes not found on", e);
            }
        }
        var options,
            chart,
            linechartBasicColors = getChartColorsArray("stacked-column-chart"),
            barchartColors =
            (linechartBasicColors &&
                ((options = {
                        chart: {
                            height: 362,
                            type: "bar",
                            toolbar: {
                                show: !1
                            },
                            zoom: {
                                enabled: !0
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: !1,
                                columnWidth: "50%",
                                endingShape: "rounded"
                            },
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        series: [{
                                name: "Pending",
                                data: @json(array_column($ordersStats, 'pendingOrdersValue')),
                            },
                            {
                                name: "Processing",
                                data: @json(array_column($ordersStats, 'processingOrdersValue')),
                            },
                            {
                                name: "Completed",
                                data: @json(array_column($ordersStats, 'completedOrdersValue')),
                            },
                        ],
                        xaxis: {
                            categories: @json($last7Days),
                        },
                        grid: {
                            xaxis: {
                                lines: {
                                    show: !1
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: !1
                                }
                            },
                        },
                        colors: linechartBasicColors,
                        legend: {
                            show: !1
                        },
                        fill: {
                            opacity: 1
                        },
                    }),
                    (chart = new ApexCharts(
                        document.querySelector("#stacked-column-chart"),
                        options
                    )).render()),
                getChartColorsArray("structure-widget"));


        barchartColors &&
            ((options = {
                    chart: {
                        height: 300,
                        type: "donut"
                    },
                    series: [@json($completedOrders->count()), @json($processingOrders->count()), @json($pendingOrders->count())],
                    labels: ["Completed", "Processing", "Pending"],
                    colors: barchartColors,
                    plotOptions: {
                        pie: {
                            startAngle: 25,
                            donut: {
                                size: "78%"
                            }
                        }
                    },
                    legend: {
                        show: !1
                    },
                    dataLabels: {
                        style: {
                            fontSize: "11px",
                            fontFamily: "DM Sans,sans-serif",
                            colors: void 0,
                        },
                        background: {
                            enabled: !0,
                            foreColor: "#fff",
                            padding: 4,
                            borderRadius: 2,
                            borderWidth: 1,
                            borderColor: "#fff",
                            opacity: 1,
                        },
                    },
                    responsive: [{
                        breakpoint: 600,
                        options: {
                            chart: {
                                height: 240
                            },
                            legend: {
                                show: !1
                            }
                        },
                    }, ],
                }),
                (chart = new ApexCharts(
                    document.querySelector("#structure-widget"),
                    options
                )).render());
    </script>
</x-app-layout>
