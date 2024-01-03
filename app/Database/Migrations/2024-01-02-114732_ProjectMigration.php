<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProjectMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'date' => [
                'type' => 'date',
                'nullable' => true
            ],
            'request_by' => [
                'type' => 'varchar',
                'constraint' => 255,
                'nullable' => true
            ],
            'status' => [
                'type' => 'enum',
                'constraint' => [
                    'progress',
                    'printed',
                    'done',
                    'cancel'
                ],
                'default' => 'progress'
            ],
            'image' => [
                'type' => 'varchar',
                'constraint' => 255,
                'nullable' => true
            ],
            'created_at' => [
                'type' => 'datetime',
                'nullable' => true
            ],
            'updated_at' => [
                'type' => 'datetime',
                'nullable' => true
            ]
        ])
            ->addPrimaryKey('id')
            ->createTable('tb_projects');
    }

    public function down()
    {
        $this->forge->dropTable('tb_projects');
    }
}
