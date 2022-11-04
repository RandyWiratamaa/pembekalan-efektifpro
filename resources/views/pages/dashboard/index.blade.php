@extends('layouts.main')

@once
    @push('css')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    @endpush
@endonce

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Efektifpro</a></li>
                        <li class="breadcrumb-item active"><a href="javascript: void(0);">{{ $page_name }}</a></li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $page_name }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Curva Sertifikasi</h4>
                    <div class="mt-4 chartjs-chart">
                        <canvas id="chart-pembekalan" height="150" data-colors="#5671f0,#f35d5d" class="morris-chart mt-3"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="mt-4 chartjs-chart"> --}}
                        <div id="container" style="height: 150"></div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Curva Surat Penawaran</h4>
                    <div class="mt-4 chartjs-chart">
                        <canvas id="chart-surat-penawaran" height="150" data-colors="#5671f0,#f35d5d"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Curva Surat Penegasan</h4>
                    <div class="mt-4 chartjs-chart">
                        <canvas id="chart-surat-penegasan" height="150" data-colors="#5671f0,#f35d5d" class="morris-chart mt-3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@once
    @push('javascript')
    <script src="{{ asset('assets/libs/morris.js06/morris.min.js') }}"></script>
    <script src="{{ asset('assets/libs/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/chartjs.init.js') }}"></script>

    <script type="text/javascript">
        var label = {{ Js::from($label_surat_penawaran) }};
        var userData = {{ Js::from($data_surat_penawaran) }};
        Highcharts.chart('container', {
            title: {
                text: 'Surat Penawaran'
            },
            subtitle: {
                text: 'PT. Efektifpro Knowledge Source'
            },
            xAxis: {
                categories: label
            },
            yAxis: {
                title: {
                    text: 'Jumlah Surat Penawaran'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Surat Penawaran',
                data: userData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>

    <script type="text/javascript">
        // Surat Penawaran
        var label_surat_penawaran = {{ Js::from($label_surat_penawaran) }};
        var surat_penawaran = {{ Js::from($data_surat_penawaran) }};

        const data_surat_penawaran = {
            labels: label_surat_penawaran,
            datasets: [{
                label: 'Surat Penawaran',
                backgroundColor: '#fff',
                borderColor: '#23b019',
                data: surat_penawaran,
            }]
        };
        const config_surat_penawaran = {
            type: 'line',
            data: data_surat_penawaran,
            options: {}
        };

        const suratPenawaran = new Chart(
            document.getElementById('chart-surat-penawaran'),
            config_surat_penawaran
        );

        // Surat Penegasan
        var label_surat_penegasan = {{ Js::from($label_surat_penegasan) }};
        var surat_penegasan = {{ Js::from($data_surat_penegasan) }};

        const data_surat_penegasan = {
            labels: label_surat_penegasan,
            datasets: [{
                label: 'Surat Penegasan',
                backgroundColor: '#fff',
                borderColor: '#192bb0',
                data: surat_penegasan,
            }]
        };
        const config_surat_penegasan = {
            type: 'line',
            data: data_surat_penegasan,
            options: {}
        };

        const suratPenegasan = new Chart(
            document.getElementById('chart-surat-penegasan'),
            config_surat_penegasan
        );

        // Sertifikasi Pembekalan
        var label_pembekalan = {{ Js::from($label_pembekalan) }};
        var pembekalan = {{ Js::from($data_pembekalan) }};

        const data_pembekalan = {
            labels: label_pembekalan,
            datasets: [{
                label: 'Sertifikasi',
                backgroundColor: '#fff',
                borderColor: '#c77a28',
                data: pembekalan,
            }]
        };
        const config_pembekalan = {
            type: 'line',
            data: data_pembekalan,
            options: {}
        };

        const listPembekalan = new Chart(
            document.getElementById('chart-pembekalan').getContext('2d'),
            config_pembekalan
        );
    </script>
    @endpush
@endonce
