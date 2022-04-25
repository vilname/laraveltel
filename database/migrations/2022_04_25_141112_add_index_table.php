<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('alter table equipments modify column code int primary key auto_increment');
        DB::unprepared('alter table equipment_types modify column code int primary key auto_increment');

        Schema::table('equipments', function (Blueprint $table) {
            $table->integer('code_type')->change();

            $table->foreign('code_type', 'equipments_code_type_foreign')
                ->references('code')->on('equipment_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('equipment_types', function (Blueprint $table) {
            $table->unique('serial_number_mask', 'equipment_types_serial_number_mask_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->dropPrimary('code');
            $table->string('code')->change();
            $table->dropForeign('equipments_code_type_foreign');
        });

        Schema::table('equipments', function (Blueprint $table) {
            $table->string('code_type')->change();
        });

        Schema::table('equipment_types', function (Blueprint $table) {
            $table->dropPrimary('code');
            $table->string('code')->change();
            $table->dropUnique('equipment_types_serial_number_mask_unique');
        });
    }
}
