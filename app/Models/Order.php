<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'shipping_address' => 'array',
        'billing_address' => 'array',
    ];

    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;
    const STATUS_PROCESSING = 3;
    const STATUS_DELIVERING = 4;
    const STATUS_COMPLETED = 5;
    const STATUS_CANCELLED = 6;

    public function getStatusColorAndIcon() {
        return $result = match ($this->status) {
            self::STATUS_PENDING => ['color' => 'warning', 'icon' => 'hourglass'],
            self::STATUS_APPROVED => ['color' => 'success', 'icon' => 'hourglass-top'],
            self::STATUS_PROCESSING => ['color' => 'success', 'icon' => 'hourglass-split'],
            self::STATUS_DELIVERING => ['color' => 'success', 'icon' => 'truck'],
            self::STATUS_COMPLETED => ['color' => 'info', 'icon' => 'check2-all'],
            self::STATUS_CANCELLED => ['color' => 'danger', 'icon' => 'x-circle'],
            default => '',
        };
    }

    public function getStatusName(): string
    {
        return $result = match ($this->status) {
            self::STATUS_PENDING => 'Pending',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_PROCESSING => 'Processing',
            self::STATUS_DELIVERING => 'Delivering',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_CANCELLED => 'Cancelled',
            default => '',
        };

//        $result = '';
//
//        switch ($this->status) {
//            case self::STATUS_PENDING :
//                $result = 'Pending';
//                break;
//            case self::STATUS_APPROVED :
//                $result = 'Approved';
//                break;
//            case self::STATUS_PROCESSING :
//                $result = 'Processing';
//                break;
//            case self::STATUS_SHIPPING :
//                $result = 'Shipping';
//                break;
//            case self::STATUS_DELIVERED :
//                $result = 'Delivered';
//                break;
//        }
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function orderItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
