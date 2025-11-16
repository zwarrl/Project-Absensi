<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('absensis', function (Blueprint $table) {
    if (!Schema::hasColumn('absensis', 'foto')) {
        $table->string('foto')->nullable()->after('keterangan');
    }
});
}

public function down()
{
    Schema::table('absensis', function (Blueprint $table) {
        $table->dropColumn('foto');
    });
}
};
