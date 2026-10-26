<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('b2b_consent_logs', function (Blueprint $table) {
            $table->id();
            $table->string('lead_name')->nullable();
            $table->string('business_name')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('origin')->default('web_diagnostico_ia');
            $table->string('ip_address', 45);
            $table->text('user_agent')->nullable();
            $table->boolean('accepted_terms_msa')->default(true);
            $table->boolean('accepted_privacy_nda_whatsapp')->default(true);
            $table->string('legal_version')->default('v1.0-biocorexstack-2026-10');
            $table->dateTime('timestamp_utc');
            $table->timestamps();

            $table->index(['ip_address', 'timestamp_utc']);
            $table->index('origin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b2b_consent_logs');
    }
};
