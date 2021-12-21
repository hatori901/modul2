@section('title','Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard '.Auth::user()->role. ' - '. Auth::user()->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->role == "Siswa")
            <div class="flex justify-center items-center">
                <div class="bg-white shadow-md rounded-md w-full" style="padding: 50px 30px;margin: 0 20px">
                    <h2 class="text-center text-xl font-bold">Jumlah Hadir</h2>
                    <h1 class="text-center text-3xl font-bold">{{ $hadir }}</h1>
                </div>
                <div class="bg-white shadow-md rounded-md w-full" style="padding: 50px 30px;margin: 0 20px">
                    <h2 class="text-center text-xl font-bold">Jumlah Sakit</h2>
                    <h1 class="text-center text-3xl font-bold">{{ $sakit }}</h1>
                </div>
                <div class="bg-white shadow-md rounded-md w-full" style="padding: 50px 30px;margin: 0 20px">
                    <h2 class="text-center text-xl font-bold">Jumlah Izin</h2>
                    <h1 class="text-center text-3xl font-bold">{{ $izin }}</h1>
                </div>
                <div class="bg-white shadow-md rounded-md w-full" style="padding: 50px 30px;margin: 0 20px">
                    <h2 class="text-center text-xl font-bold">Jumlah Tanpa Keterangan</h2>
                    <h1 class="text-center text-3xl font-bold">{{ $tanket }}</h1>
                </div>

            </div>
            @endif
            <div class="flex flex-col mt-12">
                <div class="-my-2 overflow-x-auto sm:-mx-6 md:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 md:px-8">
                        <h2 class="my-5 font-bold text-2xl">{{ __("Daftar Absensi") }}</h2>
                        @if(Auth::user()->role == "Guru")
                        <a href="{{ route("absen.tambah") }}"><button class="bg-blue-500 text-white rounded-md px-4 py-2">Tambah Presensi</button></a>
                        @endif
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">No</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Kelas</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Guru</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Subject</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Topic</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Date</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ( $attendances as $att)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $i }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->kelas->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->teacher->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->subject->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->topic }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                                            @if (Auth::user()->role == "Guru")
                                            <a href="{{ route('absen.show',$att->id) }}"><button class="bg-blue-500 px-4 py-2 text-white rounded-md">Lihat</button></a>
                                            <a href="{{ route('absen.delete',$att->id) }}"><button class="text-white rounded-md" style="background-color: rgb(255, 137, 137);padding:10px 20px">Hapus</button></a>
                                            @else
                                            <a href="{{ route("siswa.absen",$att->id) }}"><button class="bg-blue-500 px-4 py-2 text-white rounded-md">Presensi</button></a>
                                            @endif
                                        </td>
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
    </div>
</x-app-layout>
