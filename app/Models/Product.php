<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected static function booted(): void
    {
        static::saved(function (self $product): void {

            if (
                !$product->qr_code_path ||
                $product->wasChanged('slug')
            ) {
                $product->generateQrCode();
            }

        });

        static::deleted(function (self $product): void {

            if ($product->qr_code_path) {

                Storage::disk('public')->delete(
                    $product->qr_code_path
                );

            }

        });
    }


    public function generateQrCode(): void
    {
        $productUrl = route('catalog.show', [
            'product' => $this->slug
        ]);

        $qrCode = new \Endroid\QrCode\QrCode(
            data: $productUrl,
            size: 320,
            margin: 12
        );

        $writer = new \Endroid\QrCode\Writer\SvgWriter();

        $svg = $writer->write($qrCode)->getString();

        $path = 'products/qrcodes/product-' . $this->id . '.svg';

        Storage::disk('public')->put($path, $svg);

        // QR path update without triggering saved event again
        static::whereKey($this->id)->update([
            'qr_code_path' => $path
        ]);

        $this->qr_code_path = $path;
    }


    public function getQrCodeUrlAttribute(): ?string
    {
        return $this->qr_code_path
            ? Storage::disk('public')->url($this->qr_code_path)
            : null;
    }

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'stock' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Route Model Binding
    |--------------------------------------------------------------------------
    |
    | Product detail URL ID ki jagah slug use karega.
    |
    | Example:
    | /product/black-bull
    |
    */

    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    /*
    |--------------------------------------------------------------------------
    | Image URL
    |--------------------------------------------------------------------------
    */

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (
            str_starts_with($this->image, 'http://') ||
            str_starts_with($this->image, 'https://')
        ) {
            return $this->image;
        }

        return Storage::disk('public')
            ->url($this->image);
    }


    /*
    |--------------------------------------------------------------------------
    | Active Products
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where(
            'is_active',
            true
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Featured Products
    |--------------------------------------------------------------------------
    */

    public function scopeFeatured($query)
    {
        return $query->where(
            'is_featured',
            true
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Ordered Products
    |--------------------------------------------------------------------------
    */

    public function scopeOrdered($query)
    {
        return $query
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('id');
    }


    /*
    |--------------------------------------------------------------------------
    | Low Stock
    |--------------------------------------------------------------------------
    */

    public function scopeLowStock(
        $query,
        int $limit = 5
    ) {
        return $query
            ->where('stock', '>', 0)
            ->where('stock', '<=', $limit);
    }


    /*
    |--------------------------------------------------------------------------
    | Out Of Stock
    |--------------------------------------------------------------------------
    */

    public function scopeOutOfStock($query)
    {
        return $query->where(
            'stock',
            '<=',
            0
        );
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}