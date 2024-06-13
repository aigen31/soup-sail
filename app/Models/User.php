<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\CanPay;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements Wallet
{
  use CanPay;
  use HasWallet;
  use HasApiTokens;
  use HasFactory;
  use HasProfilePhoto;
  use Notifiable;
  use TwoFactorAuthenticatable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
    'two_factor_recovery_codes',
    'two_factor_secret',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array<int, string>
   */
  protected $appends = [
    'profile_photo_url',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  // protected $attributes = [
  //   'user_role_id' => 3
  // ];

  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  // public function company(): HasOne
  // {
  //   return $this->hasOne(Company::class);
  // }

  public function role(): BelongsTo
  {
    return $this->belongsTo(UserRole::class, 'user_role_id');
  }

  public function cartItem(): HasOne
  {
    return $this->hasOne(CartItem::class);
  }

  public function service(): HasOneThrough
  {
    return $this->hasOneThrough(
      Service::class,
      CartItem::class,
      'user_id',
      'id',
      'id',
      'service_id'
    );
  }

  public function projects(): HasMany
  {
    return $this->hasMany(
      Project::class,
    );
  }

  public function project(): HasOne
  {
    return $this->hasOne(
      Project::class,
    );
  }

  public function services(): BelongsToMany
  {
    return $this->belongsToMany(Service::class, 'specialist_services');
  }

  public function tasks(): BelongsToMany
  {
    return $this->belongsToMany(Task::class, 'specialist_tasks');
  }
}
