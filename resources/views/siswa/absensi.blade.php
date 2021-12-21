@section('title')
{{ __('Absensi '.$absen->kelas->name. ' - '. $absen->subject->name. ' - '.$absen->date) }}
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absensi '.$absen->kelas->name. ' - '. $absen->subject->name. ' - '.$absen->date) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-8">
            <div class="py-8 px-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div class="space-y-6 sm:space-y-5">
                    <div class="w-full md:w-1/2">
                        @if ($data = Session('success'))
                        <div class="text-white rounded-md" style="background-color: rgb(34 197 94);margin:10px 0; padding:20px 10px">
                            {{ $data }}
                        </div>
                        @endif
                        <form action="{{ route('siswa.store',$absen->id) }}" method="POST" class="bg-white rounded-md px-10 py-4" style="padding: 30px">
                            @csrf
                            <div class="block md:flex">
                                <div class="my-5 w-full">
                                    <label for="class" class="block text-md font-medium mx-2 text-gray-700">Guru</label>
                                    <input type="text" name="topic" id="topic" value="{{ $absen->teacher->name }}" readonly  class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                </div>
                                <div class="my-5 w-full">
                                    <label for="class" class="block text-md font-medium mx-2 text-gray-700">Kelas</label>
                                    <input type="text" name="topic" id="topic" value="{{ $absen->kelas->name }}" readonly  class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                </div>
                            </div>
                            <div class=" my-5">
                                <label for="class" class="block text-md font-medium mx-2 text-gray-700">Subject</label>
                                <input type="text" name="topic" id="topic" value="{{ $absen->subject->name }}" readonly  class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            </div>
                            <div class=" my-5">
                                <label for="class" class="block text-md font-medium mx-2 text-gray-700">Topic</label>
                                <input type="text" name="topic" id="topic" value="{{ $absen->topic }}" readonly  class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            </div>
                            @if ($absen->date == date("Y-m-d"))
                            <div>
                                <label for="kehadiran" class="block text-md font-medium mx-2 text-gray-700">Kehadiran</label>
                                <select id="kehadiran" name="kehadiran" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="" selected hidden>Pilih Kahadiran</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                </select>
                            </div>
                            @endif
                            <button type="submit" class="bg-blue-500 text-white rounded-md" style="padding: 10px 20px;margin:20px 0%">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
