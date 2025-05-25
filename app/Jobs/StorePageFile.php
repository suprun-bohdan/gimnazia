<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class StorePageFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected UploadedFile $file;
    protected string $filePath;

    public function __construct(UploadedFile $file, string $filePath)
    {
        $this->file = $file;
        $this->filePath = $filePath;
    }

    public function handle()
    {
        Storage::disk('public')->putFileAs(
            dirname($this->filePath),
            $this->file,
            basename($this->filePath)
        );
    }
}
