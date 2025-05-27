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
        $source = storage_path('app/' . $this->tmpPath);
        if (! file_exists($source)) {
            return;
        }

        $dir  = dirname($this->filePath);
        $info = pathinfo($this->filePath);
        $name = $info['filename'];
        $ext  = isset($info['extension']) ? '.'.$info['extension'] : '';

        $target = $this->filePath;
        $disk   = Storage::disk('public');

        if ($disk->exists($target)) {
            $id     = uniqid();
            $target = "{$dir}/{$name}_{$id}{$ext}";
        }

        $disk->put($target, file_get_contents($source));
        unlink($source);
    }

}
