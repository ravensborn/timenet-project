<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use HasFactory, LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded();
    }

    public function getStatusColorAndIcon(): array|string
    {

        $result = ['color' => 'warning', 'icon' => 'hourglass'];

        switch ($this->status) {
            case self::STATUS_PENDING :
                $result = ['color' => 'warning', 'icon' => 'hourglass'];
                break;
            case self::STATUS_APPROVED :
                $result = ['color' => 'success', 'icon' => 'hourglass-top'];
                break;
            case self::STATUS_PROCESSING :
                $result = ['color' => 'success', 'icon' => 'hourglass-split'];
                break;
            case self::STATUS_DELIVERING :
                $result = ['color' => 'success', 'icon' => 'truck'];
                break;
            case self::STATUS_COMPLETED :
                $result = ['color' => 'info', 'icon' => 'check2-all'];
                break;
            case self::STATUS_CANCELLED :
                $result = ['color' => 'danger', 'icon' => 'x-circle'];
                break;
        }

        return $result;
    }

    public function getStatusName(): string
    {
        $result = 'Pending';

        switch ($this->status) {
            case self::STATUS_PENDING :
                $result = 'Pending';
                break;
            case self::STATUS_APPROVED :
                $result = 'Approved';
                break;
            case self::STATUS_PROCESSING :
                $result = 'Processing';
                break;
            case self::STATUS_DELIVERING :
                $result = 'Delivering';
                break;
            case self::STATUS_COMPLETED :
                $result = 'Completed';
                break;
            case self::STATUS_CANCELLED :
                $result = 'Cancelled';
                break;
        }

        return $result;
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
