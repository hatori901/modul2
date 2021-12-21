<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __("Daftar Absensi ".$absen->kelas->name. " - ". $absen->subject->name) }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 md:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 md:px-8">
                        <h2 class="my-5 font-bold text-2xl">{{ __("Daftar Absensi ".$absen->kelas->name. " - ". $absen->subject->name) }}</h2>
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">No</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Nama</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Kelas</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Kehadiran</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($absens as $att)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $i }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->student->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->absen->kelas->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->attstatus }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->created_at }}</td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.print();
        </script>
    </body>
</html>

