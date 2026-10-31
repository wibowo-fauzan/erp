<div class="filament-pages-profil-usaha">
    <form wire:submit="save">
        <div class="space-y-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Profil Usaha</h2>
                <p class="text-gray-500">Ubah deskripsi, kontak, dan identitas usaha. Perubahan akan langsung tampil di halaman publik.</p>
            </div>

            {{ $this->form }}

            <div class="pt-4 flex items-center space-x-3">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
