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

    protected string $tmpPath;
    protected string $filePath;

    public function __construct(string $tmpPath, string $filePath)
    {
        $this->tmpPath = $tmpPath;
        $this->filePath = $filePath;
    }

    public function handle(): void
    {
        $file = storage_path('app/' . $this->tmpPath);
        if (file_exists($file)) {
            Storage::disk('public')->put(
                $this->filePath,
                file_get_contents($file)
            );
            unlink($file);
        }
    }
}
