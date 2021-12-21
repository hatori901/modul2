@section('title','Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absensi '.$absen->kelas->name. ' - '. $absen->subject->name. ' - '.$absen->date) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
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
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Nama</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Kelas</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Kehadiran</th>
                                        <th scope="col" class="px-6 py-3  text-center text-xs font-medium text-gray-800 uppercase tracking-wider">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900"></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->kelas->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->teacher->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->subject->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->topic }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $att->date }}</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
