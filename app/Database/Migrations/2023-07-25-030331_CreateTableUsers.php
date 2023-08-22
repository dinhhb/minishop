<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'UserID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'UserEmail' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
            ],
            'UserPassword' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'UserFirstName' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'UserLastName' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'UserCity' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'UserState' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'UserZip' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'UserEmailVerified' => [
                'type'       => 'INT',
                'constraint' => 1,
            ],
            'UserRegistrationDate' => [
                'type' => 'DATE',
            ],
            'UserVerificationCode' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'UserIP' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'UserPhone' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'UserFax' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'UserCountry' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'UserAddress' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'UserAddress2' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'UserIsAdmin' => [
                'type'       => 'INT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('UserID', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
