<?= $this->extend('layout/base_layout') ?>

<?= $this->section('title') ?>
<?= $formTitle ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class=" container mx-auto">
    <h3 class=" text-3xl text-slate-600 font-semibold mb-4"><?= $formTitle ?></h3>

    <form action="<?= $formAction ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="<?= $formMethod ?>">

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Nama<span class=" text-red-500">*</span></label>
            <input type="text" id="name" name="name" value="<?= $row->name ?>" placeholder="Masukkan nama anda" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-600">Tanggal</label>
            <input type="date" id="date" name="date" value="<?= $row->date ?>" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="request_by" class="block text-sm font-medium text-gray-600">Diminta</label>
            <input type="text" id="request_by" name="request_by" value="<?= $row->request_by ?>" placeholder="Ex: John Doe" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-600">Status</label>
            <select name="status" id="status" class="mt-1 p-2 w-full border rounded-md">
                <option value="">Pilih satu</option>
                <option value="progress" <?= $row->status == 'progress' ? 'selected' : null ?>>On Progress</option>
                <option value="printed" <?= $row->status == 'printed' ? 'selected' : null ?>>Printed</option>
                <option value="done" <?= $row->status == 'done' ? 'selected' : null ?>>Done</option>
                <option value="cancel" <?= $row->status == 'cancel' ? 'selected' : null ?>>Cancel</option>
            </select>
        </div>

        <button type="submit" class="bg-slate-600 text-white p-4 w-full rounded-md">Simpan</button>
    </form>

</div>
<?= $this->endSection() ?>