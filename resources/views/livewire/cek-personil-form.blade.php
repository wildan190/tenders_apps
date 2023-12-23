<!-- resources/views/livewire/cek-personil-form.blade.php -->
<div>
    <div class="form-group">
        <label for="additional_members">Tambah Anggota (pisahkan dengan koma):</label>
        <input type="text" class="form-control" id="additional_members" name="additional_members[]" placeholder="Anggota Pokja">
        <button wire:click="addMember" type="button" class="btn btn-success btn-sm mt-2">
            <i class="fas fa-plus"></i> Tambah Anggota
        </button>
    </div>

    @foreach($members as $index => $member)
        <div class="form-group">
            <label for="additional_members">Anggota {{ $index + 1 }}:</label>
            <input type="text" class="form-control" id="additional_members" wire:model="members.{{ $index }}" placeholder="Anggota Pokja">
            <button wire:click="removeMember({{ $index }})" type="button" class="btn btn-danger btn-sm mt-2">
                <i class="fas fa-times"></i> Hapus Anggota
            </button>
        </div>
    @endforeach
</div>
