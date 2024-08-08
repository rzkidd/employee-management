@extends('layouts.main')

@section('container')
    <div class="mt-20">
        @if (session()->has('success'))
            <div id="alert-1" class="flex items-center p-4 mb-4 text-green-50 rounded-lg bg-green-700 dark:bg-gray-800 dark:text-green-400" role="alert">
                <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @elseif (session()->has('error'))
            <div id="alert-1" class="flex items-center p-4 mb-4 text-red-50 rounded-lg bg-red-700 dark:bg-gray-800 dark:text-red-400" role="alert">
                <div class="ms-3 text-sm font-medium">
                {{ session('error') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>

        @endif

        <h1 class="text-green-700 text-3xl font-bold">Data Pegawai</h1>

        <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg  px-5 py-2.5 me-2 my-2 text-center inline-flex items-center" data-modal-target="crud-modal" data-modal-toggle="crud-modal" onclick="initProvinsi()">
            <svg class="w-5 h-5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
            </svg>              
            Tambah data pegawai
        </button>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-3xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Tambah data pegawai
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="/pegawai" id="form-input" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Ex: John Doe" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Ex: johndoe@email.com" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 ">No. Telp</label>
                                <input type="tel" name="no_telp" id="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Ex: 0123456789" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 ">Jabatan</label>
                                <input type="tel" name="jabatan" id="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Ex: Web Developer" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal lahir</label>
                                <input type="text" name="tgl_lahir" id="tgl_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "  required="" value="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 ">Gender</label>
                                <select id="gender" name="gender" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                    <option selected=""></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-span-2 text-sm font-medium text-gray-900">
                                Alamat rumah
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 ">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="select-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                    <option selected=""></option>
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="kab_kota" class="block mb-2 text-sm font-medium text-gray-900 ">Kab/Kota</label>
                                <select id="kab_kota" name="kab_kota" class="select-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                    <option selected=""></option>
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 ">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" class="select-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                    <option selected=""></option>
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="kelurahan" class="block mb-2 text-sm font-medium text-gray-900 ">Kelurahan</label>
                                <select id="kelurahan" name="kelurahan" class="select-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                    <option selected=""></option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <input id="photo" type="file" class="file" name="photo">
                            </div>
                        </div>
                        <div class="flex justify-content-end">
                            <button type="submit" class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center align-self-end">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 

        <table id="employee-table" class="w-full text-left rtl:text-right hover text-sm">
            <thead class="text-sm text-green-700 bg-white">
                <tr >
                    <th class="!border-0"></th>
                    <th class="!border-0">Nama</th>
                    <th class="!border-0">Jabatan</th>
                    <th class="!border-0">Email</th>
                    <th class="!border-0">No. Telp</th>
                    <th class="!border-0">Tanggal Lahir</th>
                    <th class="!border-0">Foto</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <script>
        $('#form-input').validate({
            errorClass: 'text-red-500',
            validClass: 'border-green-500 border-2'
        })

        function format(d) {
            if (!d.photo_url.includes('photos')){
                return (
                    `<dl class="grid gap-4 mb-4 grid-cols-2 ">
                        <div class="">
                            <dt>Nama:</dt>
                            <dd>${d.nama}</dd>    
                        </div>
                        <div>
                            <dt>Email:</dt>
                            <dd>${d.email}</dd>    
                        </div>
                        <div>
                            <dt>No. Telp:</dt>
                            <dd>${d.no_telp}</dd>    
                        </div>
                        <div>
                            <dt>Jabatan:</dt>
                            <dd>${d.jabatan}</dd>    
                        </div>
                        <div>
                            <dt>Tanggal lahir:</dt>
                            <dd>${d.tgl_lahir}</dd>    
                        </div>
                        <div>
                            <dt>Gender:</dt>
                            <dd>${d.gender}</dd>    
                        </div>
                        <div>
                            <dt>Alamat:</dt>
                            <dd>${d.kelurahan_name}, ${d.kecamatan_name}, ${d['kab/kota_name']}, ${d.provinsi_name}</dd>    
                        </div>
                        <div>
                            <dt>Foto:</dt>
                            <dd><img src="${d.photo_url}" class="w-40" alt="${d.nama}" /></dd>    
                        </div>
                    </dl>`
                );
            }
            return (
                `<dl class="grid gap-4 mb-4 grid-cols-2 ">
                    <div class="">
                        <dt>Nama:</dt>
                        <dd>${d.nama}</dd>    
                    </div>
                    <div>
                        <dt>Email:</dt>
                        <dd>${d.email}</dd>    
                    </div>
                    <div>
                        <dt>No. Telp:</dt>
                        <dd>${d.no_telp}</dd>    
                    </div>
                    <div>
                        <dt>Jabatan:</dt>
                        <dd>${d.jabatan}</dd>    
                    </div>
                    <div>
                        <dt>Tanggal lahir:</dt>
                        <dd>${d.tgl_lahir}</dd>    
                    </div>
                    <div>
                        <dt>Gender:</dt>
                        <dd>${d.gender}</dd>    
                    </div>
                    <div>
                        <dt>Alamat:</dt>
                        <dd>${d.kelurahan_name}, ${d.kecamatan_name}, ${d['kab/kota_name']}, ${d.provinsi_name}</dd>    
                    </div>
                    <div>
                        <dt>Foto:</dt>
                        <dd><img src="{{ asset('storage/${d.photo_url}') }}" class="w-40" alt="${d.nama}" /></dd>    
                    </div>
                </dl>`
            );
        }

        var table = $('#employee-table').DataTable( {
            ajax: 'http://employee-management.test:8080/api/list-pegawai',
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: ''
                },
                {data: 'nama'},
                {data: 'jabatan'},
                {data: 'email'},
                {data: 'no_telp'},
                {data: 'tgl_lahir'},
                {data: 'photo_url'},
            ],
            columnDefs: [
                {
                    targets: -1,
                    data: 'photo_url',
                    render: function (data, type, row, meta) {
                        if (!data.includes('photos')){
                            return `<img src="${data}" class="w-20" alt="${row.nama}" />`;
                        }
                        return `<img src="{{ asset('storage/${data}') }}" class="w-20" alt="${row.nama}" />`;
                    }
                }
            ],
            scrollY: '400px',
            order: [[1, 'asc']]
        } );

        // Add event listener for opening and closing details
        table.on('click', 'td.dt-control', function (e) {
            let tr = e.target.closest('tr');
            let row = table.row(tr);
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
            } else {
                if (!row.data().photo_url.includes('photos')){
                    row.child(format(row.data())).show();
                } else {
                    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/province/' + row.data().provinsi + '.json')
                        .then(response => response.json())
                        .then(response => {
                            row.data().provinsi_name = response.name
                            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/regency/' + row.data()['kab/kota'] + '.json')
                                .then(response => response.json())
                                .then(response => {
                                    row.data()['kab/kota_name'] = response.name
                                    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/district/' + row.data().kecamatan + '.json')
                                        .then(response => response.json())
                                        .then(response => {
                                            row.data().kecamatan_name = response.name
                                            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/village/' + row.data().kelurahan + '.json')
                                                .then(response => response.json())
                                                .then(response => {
                                                    row.data().kelurahan_name = response.name
                                                    if (row.child.isShown()) {
                                                        // This row is already open - close it
                                                        row.child.hide();
                                                    }
                                                    else {
                                                        // Open this row
                                                        row.child(format(row.data())).show();
                                                    }
                                                })
                                        })
                                })
                        })
                }
            }
        
            
        });

        $('#tgl_lahir').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoApply: true,
            autoUpdateInput: true,
            maxYear: parseInt(moment().format('YYYY'),10)
        });
        $('.select-input').select2({
            width: '100%'
        })

        $('#provinsi').on('change', function () {
            initKota(this.value)
        });
        $('#kab_kota').on('change', function () {
            initKecamatan(this.value)
        });
        $('#kecamatan').on('change', function () {
            initKelurahan(this.value)
        });

        $('#photo').fileinput({
            allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
            elErrorContainer: "#errorBlock",
            maxFileCount: 1,
            browseClass: "btn bg-green-700 text-white"
        })

        function initProvinsi(){
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                .then(response => response.json())
                .then(response => {
                    response.map((res) => res.text = res.name)
                    var data = response
                    $('#provinsi').select2({
                        data: data
                    })
                })
        }
        function initKota(id){
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + id + '.json')
                .then(response => response.json())
                .then(response => {
                    response.map((res) => res.text = res.name)
                    var data = response
                    $('#kab_kota').select2({
                        data: data
                    })
                })
        }
        function initKecamatan(id){
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/districts/' + id + '.json')
                .then(response => response.json())
                .then(response => {
                    response.map((res) => res.text = res.name)
                    var data = response
                    $('#kecamatan').select2({
                        data: data
                    })
                })
        }
        function initKelurahan(id){
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/villages/' + id + '.json')
                .then(response => response.json())
                .then(response => {
                    response.map((res) => res.text = res.name)
                    var data = response
                    $('#kelurahan').select2({
                        data: data
                    })
                })
        }
            

            
    </script>
@endsection