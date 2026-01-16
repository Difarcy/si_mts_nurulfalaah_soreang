<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Complete Database Schema for MTs Nurul Falaah Soreang
     * Single migration file untuk production deployment
     * Optimized for PostgreSQL
     */
    public function up(): void
    {
        // ==================== AUTHENTICATION & SESSIONS ====================
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // ==================== CACHE & JOBS ====================
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        // ==================== CONTENT MANAGEMENT ====================
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type')->default('berita')->index(); // berita, artikel, etc.
            $table->text('excerpt')->nullable();
            $table->longText('body');
            $table->string('thumbnail_path')->nullable();
            $table->string('status')->default('draft')->index();
            $table->timestamp('published_at')->nullable()->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('author_name')->nullable();
            $table->string('meta_description')->nullable();
            $table->json('tags')->nullable();
            $table->json('images')->nullable();
            $table->json('image_metadata')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamps();
        });

        Schema::create('post_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->string('session_id')->index();
            $table->string('ip_address')->nullable();
            $table->timestamp('viewed_at')->useCurrent();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('comments')->cascadeOnDelete();
            $table->boolean('is_admin')->default(false);
            $table->string('name');
            $table->string('email')->index();
            $table->text('comment');
            $table->string('admin_reply_by')->nullable();
            $table->text('admin_reply')->nullable();
            $table->timestamp('admin_replied_at')->nullable();
            $table->boolean('is_approved')->default(false)->index();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        Schema::create('comment_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('session_id')->nullable()->index();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('tagline')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar');
            $table->string('link')->nullable();
            $table->string('button_text')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('show_logo')->default(false);
            $table->boolean('show_tagline')->default(false);
            $table->boolean('show_title')->default(false);
            $table->boolean('show_description')->default(false);
            $table->boolean('show_button')->default(false);
            $table->timestamps();
        });

        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('isi');
            $table->date('tanggal')->nullable()->index();
            $table->integer('urutan')->default(0);
            $table->string('status')->default('draft')->index(); // publish, draft
            $table->string('author_name')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });

        Schema::create('info_texts', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });

        // ==================== SCHOOL PROFILE & MEDIA ====================
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah')->nullable();
            $table->string('gambar_sekolah')->nullable();
            $table->text('deskripsi_sekolah')->nullable();
            $table->longText('sejarah')->nullable();
            $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->longText('tujuan')->nullable();
            $table->longText('struktur_organisasi')->nullable();
            $table->string('kepala_sekolah_nama')->nullable();
            $table->string('kepala_sekolah_foto')->nullable();
            $table->text('kepala_sekolah_sambutan')->nullable();
            $table->timestamps();
        });

        Schema::create('visual_identities', function (Blueprint $table) {
            $table->id();
            $table->string('logo_path')->nullable();
            $table->string('tagline')->nullable();
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('link')->nullable();
            $table->string('button_text')->nullable();
            $table->boolean('show_logo')->default(true);
            $table->boolean('show_tagline')->default(true);
            $table->boolean('show_title')->default(true);
            $table->boolean('show_description')->default(true);
            $table->boolean('show_button')->default(true);
            $table->string('promosi_banner_path')->nullable();
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->index(); // email, phone, address, social
            $table->string('label')->nullable();
            $table->text('nilai');
            $table->string('icon')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        Schema::create('activity_photos', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar');
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        Schema::create('activity_videos', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('youtube_url');
            $table->string('youtube_id')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        Schema::create('student_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nama_siswa')->nullable();
            $table->string('kelas')->nullable();
            $table->string('jenis_prestasi')->nullable()->index(); // Akademik / Non-Akademik
            $table->string('tingkat_prestasi')->nullable()->index(); // Kabupaten, Provinsi, Nasional
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('foto_sertifikat')->nullable();
            $table->date('tanggal_prestasi')->nullable()->index();
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        // ==================== EVENTS & SCHEDULE ====================
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->index();
            $table->string('author_name')->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_mulai')->nullable()->index();
            $table->date('tanggal_selesai')->nullable();
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('urutan')->default(0);
            $table->string('status')->default('draft')->index(); // publish, draft
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });

        // ==================== CHATBOT ====================
        Schema::create('chatbot_conversations', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->index();
            $table->text('user_message')->nullable();
            $table->text('bot_response')->nullable();
            $table->string('intent_matched')->nullable()->index();
            $table->decimal('confidence_score', 5, 2)->nullable();
            $table->integer('response_time_ms')->nullable();
            $table->string('method')->nullable()->index(); // built-in, rule-based, retrieval, fallback
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });

        Schema::create('inbox_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->index();
            $table->string('phone')->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false)->index();
            $table->timestamps();
        });

        // ==================== SPMB (PENERIMAAN PESERTA DIDIK) ====================
        Schema::create('spmb_settings', function (Blueprint $table) {
            $table->id();
            $table->string('registration_status')->default('closed')->index(); // open, soon, closed
            $table->string('academic_year', 255)->nullable();
            $table->text('hero_slogan')->nullable();
            $table->date('registration_start_date')->nullable();
            $table->date('registration_end_date')->nullable();
            $table->string('contact_wa')->nullable();
            $table->string('quota')->nullable();
            $table->decimal('registration_fee', 12, 2)->default(0);
            $table->string('banner_path')->nullable();
            $table->boolean('show_brochure')->default(false);
            $table->string('brochure_path')->nullable();
            $table->string('flow_image_path')->nullable();

            // Alur pendaftaran (start & end dates)
            $table->date('step_1_start_date')->nullable();
            $table->date('step_1_end_date')->nullable();
            $table->date('step_2_start_date')->nullable();
            $table->date('step_2_end_date')->nullable();
            $table->date('step_3_start_date')->nullable();
            $table->date('step_3_end_date')->nullable();
            $table->date('step_4_start_date')->nullable();
            $table->date('step_4_end_date')->nullable();
            $table->date('step_5_start_date')->nullable();
            $table->date('step_5_end_date')->nullable();

            $table->timestamps();
        });

        Schema::create('spmb_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });

        Schema::create('spmb_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->enum('type', ['general', 'document', 'other'])->default('general')->index();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });

        Schema::create('spmb_timelines', function (Blueprint $table) {
            $table->id();
            $table->string('activity')->index();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('description')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // SPMB tables
        Schema::dropIfExists('spmb_timelines');
        Schema::dropIfExists('spmb_requirements');
        Schema::dropIfExists('spmb_faqs');
        Schema::dropIfExists('spmb_settings');

        // Chatbot tables
        Schema::dropIfExists('inbox_messages');
        Schema::dropIfExists('chatbot_conversations');

        // Events & Schedule
        Schema::dropIfExists('agendas');

        // Media & School
        Schema::dropIfExists('student_achievements');
        Schema::dropIfExists('activity_videos');
        Schema::dropIfExists('activity_photos');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('visual_identities');
        Schema::dropIfExists('school_profiles');

        // Content
        Schema::dropIfExists('info_texts');
        Schema::dropIfExists('announcements');
        Schema::dropIfExists('banners');
        Schema::dropIfExists('comment_likes');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('post_views');
        Schema::dropIfExists('posts');

        // Jobs & Cache
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');

        // Auth & Sessions
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
