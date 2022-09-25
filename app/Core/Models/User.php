<?php

namespace App\Core\Models;

use App\Core\Events\User\UserCreated;
use App\Core\Events\User\UserDeleted;
use App\Core\Events\User\UserSaved;
use ArrayAccess;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes;

    /**
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * @var array<string, string>
     */
    protected $dispatchesEvents = [
        'created' => UserCreated::class,
        'saved' => UserSaved::class,
        'deleted' => UserDeleted::class,
    ];

    public function receivesBroadcastNotificationsOn(): string
    {
        return sprintf('user.%s', $this->getRouteKey());
    }

    public function scopeContaining(Builder $query, string $email): Builder
    {
        return $query->whereRaw('lower('.$this->getQuery()->getGrammar()->wrap('email').') like ?', ['%'.mb_strtolower($email).'%']);
    }

    public static function findOrCreate(string|array|ArrayAccess $values): Collection|User|static
    {
        $models = collect($values)->map(function ($value) {
            if ($value instanceof self) {
                return $value;
            }

            return static::findOrCreateFromString($value);
        });

        return is_string($values) ? $models->first() : $models;
    }

    public static function findFromString(string $email): ?User
    {
        return static::query()->firstWhere('email', $email);
    }

    protected static function findOrCreateFromString(string $email): User
    {
        $model = static::findFromString($email);

        if (! $model) {
            $model = static::create([
                'email' => $email,
            ]);
        }

        return $model;
    }
}
