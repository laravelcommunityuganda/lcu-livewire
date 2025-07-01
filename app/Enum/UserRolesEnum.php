<?php

namespace App\Enum;

enum UserRolesEnum: string
{
    case Super_Admin = 'super_admin';
    case Admin = 'admin';
    case Editor = 'editor';
    case User = 'user';

    public function label(): string
    {
        return match ($this) {
            self::Super_Admin => 'Super Administrator',
            self::Admin => 'Administrator',
            self::Editor => 'Editor',
            self::User => 'User',
        };
    }
    public function labels(): array
    {
        return [
            self::Super_Admin->value => self::Super_Admin->label(),
            self::Admin->value => self::Admin->label(),
            self::Editor->value => self::Editor->label(),
            self::User->value => self::User->label(),
        ];
    }

    public static function getRoles(): array
    {
        return array_map(fn($role) => $role->value, self::cases());
    }

    public static function getLabels(): array
    {
        return array_map(fn($role) => $role->label(), self::cases());
    }

}
