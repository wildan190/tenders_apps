<!-- resources/views/admin/cek_personils/show.blade.php -->
<x-app-layout>
    <div class="container mx-auto">

        <!-- Page Heading -->
        <h1 class="text-2xl font-semibold mb-2 text-gray-800">Detail Cek Personil</h1>
        <p class="text-gray-600 mb-4">Informasi detail cek personil.</p>

        <!-- Card for Displaying Personil Information -->
        <!-- Card for Displaying Personil Information -->
        <div class="bg-white rounded-md overflow-hidden shadow-md mb-4">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">Informasi Personil</h2>

                <!-- Flowbite-styled table -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Nama Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jabatan Personil
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    NIK Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NPWP Personil
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Email Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telepon Personil
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $cekPersonil->nama_personil }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $cekPersonil->jabatan_personil }}
                                </td>
                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    {{ $cekPersonil->nik_personil }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cekPersonil->npwp_personil }}
                                </td>
                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    {{ $cekPersonil->email_personil }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cekPersonil->telepon_personil }}
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                <!-- End of Flowbite-styled table -->

            </div>
        </div>


        <!-- Card for Displaying Actions -->
        <div class="bg-white rounded-md overflow-hidden shadow-md">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">Aksi</h2>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.cek_personils.edit', $cekPersonil->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.cek_personils.destroy', $cekPersonil->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>