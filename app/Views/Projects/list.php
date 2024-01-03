<?= $this->extend("layout/base_layout") ?>

<?= $this->section('title') ?>
List Project
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class=" container mx-auto">
    <div class="flex justify-between mb-3">
        <h3 class=" text-3xl text-slate-600 font-semibold">List Project</h3>

        <div>
            <button onclick="location.href='<?= base_url('?view=calendar') ?>'; return true;" class="bg-slate-600 -mr-2 rounded-l-sm p-4 text-white">
                <span class="iconify" data-icon="mdi-calendar-month"></span>
            </button>
            <button onclick="location.href='<?= base_url('?view=list') ?>'; return true;" class="bg-slate-600 rounded-r-sm p-4 text-white">
                <span class="iconify" data-icon="mdi-table-of-contents"></span>
            </button>
        </div>

        <button onclick="location.href='<?= base_url('projects/new') ?>';return true;" class="bg-slate-600 text-white rounded-md text-sm p-4 flex items-center">
            <span class="iconify text-lg mr-3" data-icon="mdi-plus"></span>
            Create Project
        </button>
    </div>
    <?php if ($message) : ?>
        <span><?= $message ?></span>
    <?php endif ?>

    <div class="bg-slate-500 rounded-lg overflow-hidden shadow-lg">
        <table class="min-w-full bg-white">
            <thead class="bg-slate-600 text-white">
                <tr>
                    <th class="py-2 px-4">Nama Project</th>
                    <th class="py-2 px-4">Tanggal</th>
                    <th class="py-2 px-4">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php foreach ($data as $row) : ?>
                    <tr class="border-b">
                        <td class="py-2 px-4"><?= $row->name ?></td>
                        <td class="py-2 px-4"><?= $row->date ?></td>
                        <td class="py-2 px-4"><?= $row->status ?></td>
                        <td>
                            <div class="flex gap-2">
                                <button onclick='location.href="<?= base_url("projects/edit/{$row->id}") ?>"' class="bg-blue-500 p-2 text-white rounded-md">
                                    <span class="iconify text-sm" data-icon="mdi-pencil"></span>
                                </button>

                                <button class="bg-red-500 p-2 text-white rounded-md">
                                    <span class="iconify text-sm" data-icon="mdi-trash"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>