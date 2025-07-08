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
        //
        Schema::create('candidate_form_table', function (Blueprint $table) {

            $table->id(); // INT PRIMARY KEY AUTO_INCREMENT
            $table->string('candidate_name');

            // Experience/YES-NO booleans
            $table->boolean('dementia_experience')->default(false);
            $table->boolean('hospice_experience')->default(false);
            $table->boolean('bedbound_experience')->default(false);
            $table->boolean('incontinence_experience')->default(false);
            $table->boolean('auto_insurance')->default(false);
            $table->boolean('drivers_license')->default(false);
            $table->boolean('okay_transport')->default(false);
            $table->boolean('okay_with_gender')->default(false);
            $table->boolean('okay_with_smokers')->default(false);
            $table->boolean('okay_with_pets')->default(false);
            $table->boolean('slide_board')->default(false);
            $table->boolean('gait_belt_experience')->default(false);
            $table->boolean('hoyer_lift_experience')->default(false);
            $table->boolean('couples_care')->default(false);
            $table->boolean('meal_prep')->default(false);
            $table->boolean('covid_vaccinated')->default(false);
            $table->boolean('interested_pca_certification')->default(false);

            // Text fields
            $table->text('preferred_location')->nullable();
            $table->text('referral_source')->nullable(); // How did you know...
            $table->string('salary')->nullable();
            $table->string('certificates')->nullable(); // Companion, CNA, HHA
            $table->text('availability')->nullable(); // earliest & latest
            $table->text('background_disclosure')->nullable();
            $table->text('others')->nullable();

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('candidates');
    }
};
