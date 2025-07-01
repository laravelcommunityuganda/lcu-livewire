<?php

namespace App\Enum;

enum UserPermissionsEnum: string
{
    //User Permissions
    case CreateUsers = 'create-users';
    case ViewUsers = 'view-users';
    case UpdateUsers = 'update-users';
    case DeleteUsers = 'delete-users';

    //Events Permissions
    case CreateEvents = 'create-events';
    case ViewEvents = 'view-events';
    case UpdateEvents = 'update-events';
    case DeleteEvents = 'delete-events';

    //Forum Permissions
    case CreateForumPosts = 'create-forum-posts';
    case ViewForumPosts = 'view-forum-posts';
    case UpdateForumPosts = 'update-forum-posts';
    case DeleteForumPosts = 'delete-forum-posts';

    //Jobs Permissions
    case CreateJobs = 'create-jobs';
    case ViewJobs = 'view-jobs';
    case UpdateJobs = 'update-jobs';
    case DeleteJobs = 'delete-jobs';

    //Posts Permissions
    case CreatePosts = 'create-posts';
    case ViewPosts = 'view-posts';
    case UpdatePosts = 'update-posts';
    case DeletePosts = 'delete-posts';

    //Resource Permissions
    case CreateResources = 'create-resources';
    case ViewResources = 'view-resources';
    case UpdateResources = 'update-resources';
    case DeleteResources = 'delete-resources';

    //Thread Permissions
    case CreateThreads = 'create-threads';
    case ViewThreads = 'view-threads';
    case UpdateThreads = 'update-threads';
    case DeleteThreads = 'delete-threads';

    //Force Delete Permission
    case ForceDelete = 'force-delete';

    public function label(): string
    {
        return match ($this) {
            self::CreateUsers => 'Create Users',
            self::ViewUsers => 'View Users',
            self::UpdateUsers => 'Update Users',
            self::DeleteUsers => 'Delete Users',
            self::CreateEvents => 'Create Events',
            self::ViewEvents => 'View Events',
            self::UpdateEvents => 'Update Events',
            self::DeleteEvents => 'Delete Events',
            self::CreateForumPosts => 'Create Forum Posts',
            self::ViewForumPosts => 'View Forum Posts',
            self::UpdateForumPosts => 'Update Forum Posts',
            self::DeleteForumPosts => 'Delete Forum Posts',
            self::CreateJobs => 'Create Jobs',
            self::ViewJobs => 'View Jobs',
            self::UpdateJobs => 'Update Jobs',
            self::DeleteJobs => 'Delete Jobs',
            self::CreatePosts => 'Create Posts',
            self::ViewPosts => 'View Posts',
            self::UpdatePosts => 'Update Posts',
            self::DeletePosts => 'Delete Posts',
            self::CreateResources => 'Create Resources',
            self::ViewResources => 'View Resources',
            self::UpdateResources => 'Update Resources',
            self::DeleteResources => 'Delete Resources',
            self::CreateThreads => 'Create Threads',
            self::ViewThreads => 'View Threads',
            self::UpdateThreads => 'Update Threads',
            self::DeleteThreads => 'Delete Threads',
            self::ForceDelete => 'Force Delete',
        };
    }

    public function labels(): array
    {
        return [
            self::CreateUsers->value => self::CreateUsers->label(),
            self::ViewUsers->value => self::ViewUsers->label(),
            self::UpdateUsers->value => self::UpdateUsers->label(),
            self::DeleteUsers->value => self::DeleteUsers->label(),
            self::CreateEvents->value => self::CreateEvents->label(),
            self::ViewEvents->value => self::ViewEvents->label(),
            self::UpdateEvents->value => self::UpdateEvents->label(),
            self::DeleteEvents->value => self::DeleteEvents->label(),
            self::CreateForumPosts->value => self::CreateForumPosts->label(),
            self::ViewForumPosts->value => self::ViewForumPosts->label(),
            self::UpdateForumPosts->value => self::UpdateForumPosts->label(),
            self::DeleteForumPosts->value => self::DeleteForumPosts->label(),
            self::CreateJobs->value => self::CreateJobs->label(),
            self::ViewJobs->value => self::ViewJobs->label(),
            self::UpdateJobs->value => self::UpdateJobs->label(),
            self::DeleteJobs->value => self::DeleteJobs->label(),
            self::CreatePosts->value => self::CreatePosts->label(),
            self::ViewPosts->value => self::ViewPosts->label(),
            self::UpdatePosts->value => self::UpdatePosts->label(),
            self::DeletePosts->value => self::DeletePosts->label(),
            self::CreateResources->value => self::CreateResources->label(),
            self::ViewResources->value => self::ViewResources->label(),
            self::UpdateResources->value => self::UpdateResources->label(),
            self::DeleteResources->value => self::DeleteResources->label(),
            self::CreateThreads->value => self::CreateThreads->label(),
            self::ViewThreads->value => self::ViewThreads->label(),
            self::UpdateThreads->value => self::UpdateThreads->label(),
            self::DeleteThreads->value => self::DeleteThreads->label(),
            self::ForceDelete->value => self::ForceDelete->label(),
        ];
    }

    public static function getPermissions(): array
    {
        return array_map(fn($permission) => $permission->value, self::cases());
    }

    public static function getLabels(): array
    {
        return array_map(fn($permission) => $permission->label(), self::cases());
    }

    public static function getLabelsWithValues(): array
    {
        return array_map(fn($permission) => [
            'value' => $permission->value,
            'label' => $permission->label()
        ], self::cases());
    }

}
