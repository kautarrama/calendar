<?= $this->extend("layout/base_layout") ?>

<?= $this->section('title') ?>
Calendar Project
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class=" container mx-auto">
    <div class="flex justify-between mb-3">
        <h3 class=" text-3xl text-slate-600 font-semibold">Calendar Project</h3>

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
    <div id="calendar"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: <?= $data ?>
        });
        calendar.render();
    });
</script>

<?= $this->endSection() ?>