@section('title','Tambah Absensi')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-8">
            <div class="py-8 px-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div class="space-y-6 sm:space-y-5">
                    <div class="w-full md:w-1/2">
                        <form action="{{ route('absen.store') }}" method="POST" class="bg-white rounded-md px-10 py-4" style="padding: 30px">
                            <h2 class="text-2xl font-bold mb-5">
                                Buat Absensi
                            </h2>
                            @csrf
                            <div>
                                <label for="subject" class="block text-md font-medium mx-2 text-gray-700">Subject</label>
                                <select id="subject" name="subject" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                  <option value="" selected hidden>Pilih Subject</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" my-5">
                                <label for="class" class="block text-md font-medium mx-2 text-gray-700">Kelas</label>
                                <select id="class" name="class" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="" selected hidden>Pilih Kelas</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" my-5">
                                <label for="class" class="block text-md font-medium mx-2 text-gray-700">Topic</label>
                                <input type="text" name="topic" id="topic"  class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            </div>
                            <button class="py-2 px-4 bg-blue-500 rounded-md text-white">Buat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
