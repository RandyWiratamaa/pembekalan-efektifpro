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
                    <div id="chart-schedule" style="height:150"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div id="chart-pengajar" style="height: 150"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div id="chart-surat-penawaran" style="height: 150"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div id="chart-surat-penegasan" style="height: 150"></div>
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
        // CHART SCHEDULE
        var label_schedule = {{ Js::from($label_schedule) }}
        var data_schedule = {{ Js::from($data_schedule) }}
        Highcharts.chart('chart-schedule', {
            title: {
                text: 'Grafik Schedule'
            },
            subtitle: {
                text: 'PT. Efektifpro Knowledge Source'
            },
            xAxis: {
                categories: label_schedule
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
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
                name: 'Schedule',
                data: data_schedule
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
        })

        // JML KELAS PENGAJAR
        var label_pengajar = {{ Js::from($label_pengajar) }};
        var data_pengajar = {{ Js::from($data_pengajar) }};
        Highcharts.chart('chart-pengajar', {
            title: {
                text: 'Jumlah Kelas'
            },
            subtitle: {
                text: 'PT. Efektifpro Knowledge Source'
            },
            xAxis: {
                categories: label_pengajar
            },
            yAxis: {
                title: {
                    text: 'Jumlah Kelas'
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
                name: 'Pengajar',
                data: data_pengajar
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

        //SURAT PENAWARAN
        var label_penawaran = {{ Js::from($label_surat_penawaran) }};
        var data_penawaran = {{ Js::from($data_surat_penawaran) }};
        Highcharts.chart('chart-surat-penawaran', {
            title: {
                text: 'Surat Penawaran'
            },
            subtitle: {
                text: 'PT. Efektifpro Knowledge Source'
            },
            xAxis: {
                categories: label_penawaran
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
                data: data_penawaran
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

        // SURAT PENEGASAN
        var label_penegasan = {{ Js::from($label_surat_penegasan) }};
        var data_penegasan = {{ Js::from($data_surat_penegasan) }};
        Highcharts.chart('chart-surat-penegasan', {
            title: {
                text: 'Surat Penegasan'
            },
            subtitle: {
                text: 'PT. Efektifpro Knowledge Source'
            },
            xAxis: {
                categories: label_penegasan
            },
            yAxis: {
                title: {
                    text: 'Jumlah Surat Penegasan'
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
                name: 'Surat Penegasan',
                data: data_penegasan
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
    @endpush
@endonce
