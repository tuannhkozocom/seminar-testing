<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadFileTest extends TestCase
{
    public function test_upload_valid_file_size()
    {
        Storage::fake('files');
        $validFile = UploadedFile::fake()->image('avatar.jpg');
        $response = $this->post('/api/upload-file', [
            'avatar' => $validFile,
        ]);
        $response->assertStatus(200);
        Storage::disk('local')->assertExists('files/' . $validFile->hashName());
    }

    public function test_upload_invalid_file_size()
    {
        $invalidFile = UploadedFile::fake()->image('avatar.jpg')->size(103);
        $response = $this->post('/api/upload-file', [
            'avatar' => $invalidFile,
        ]);
        $response->assertStatus(302);
    }
}
