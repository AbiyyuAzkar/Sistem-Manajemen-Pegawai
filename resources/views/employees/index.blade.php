<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Sistem Manajemen Pegawai</h1>

        <!-- Form Tambah Pegawai -->
        <form action="/employees" method="POST" class="space-y-4 mb-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input type="text" name="name" placeholder="Nama Pegawai"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>

                <input type="text" name="position" placeholder="Jabatan"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>

                <input type="number" name="salary" placeholder="Gaji"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <button type="submit"
                class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Tambah Pegawai
            </button>
        </form>

        <!-- Daftar Pegawai -->
        <table class="w-full text-left border border-collapse bg-white shadow-sm">
            <thead>
                <tr class="bg-blue-100">
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Jabatan</th>
                    <th class="p-3 border">Gaji</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border">{{ $employee->name }}</td>
                    <td class="p-3 border">{{ $employee->position }}</td>
                    <td class="p-3 border">Rp {{ number_format($employee->salary, 0, ',', '.') }}</td>
                    <td class="p-3 border text-center">
                        <form action="/employees/{{ $employee->id }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>
                        <!-- Tombol Edit -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>