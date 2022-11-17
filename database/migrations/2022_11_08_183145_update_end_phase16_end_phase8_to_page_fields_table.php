<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEndPhase16EndPhase8ToPageFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_fields', function (Blueprint $table) {
            $table->datetime('end_phase16')->nullable()->after('policy');
            $table->datetime('end_phase8')->nullable()->after('end_phase16');
            $table->datetime('end_phase4')->nullable()->after('end_phase8');
            $table->datetime('end_phase2')->nullable()->after('end_phase4');
            $table->datetime('end_phase1')->nullable()->after('end_phase2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_fields', function (Blueprint $table) {
            //
        });
    }
}
