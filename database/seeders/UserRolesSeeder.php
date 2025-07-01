<?php

namespace Database\Seeders;

use App\Enum\UserPermissionsEnum;
use App\Enum\UserRolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        //Create Roles
        $superAdminRole = Role::create(['name' => UserRolesEnum::Super_Admin->value]);
        $adminRole = Role::create(['name' => UserRolesEnum::Admin->value]);
        $editorRole = Role::create(['name' => UserRolesEnum::Editor->value]);
        $userRole = Role::create(['name' => UserRolesEnum::User->value]);

        //Create Permissions
        $createUsersPermission = Permission::create(['name' => UserPermissionsEnum::CreateUsers->value]);
        $viewUsersPermission = Permission::create(['name' => UserPermissionsEnum::ViewUsers->value]);
        $updateUsersPermission = Permission::create(['name' => UserPermissionsEnum::UpdateUsers->value]);
        $deleteUsersPermission = Permission::create(['name' => UserPermissionsEnum::DeleteUsers->value]);

        $createJobsPermission = Permission::create(['name' => UserPermissionsEnum::CreateJobs->value]);
        $viewJobsPermission = Permission::create(['name' => UserPermissionsEnum::ViewJobs->value]);
        $updateJobsPermission = Permission::create(['name' => UserPermissionsEnum::UpdateJobs->value]);
        $deleteJobsPermission = Permission::create(['name' => UserPermissionsEnum::DeleteJobs->value]);

        $createEventsPermission = Permission::create(['name' => UserPermissionsEnum::CreateEvents->value]);
        $viewEventsPermission = Permission::create(['name' => UserPermissionsEnum::ViewEvents->value]);
        $updateEventsPermission = Permission::create(['name' => UserPermissionsEnum::UpdateEvents->value]);
        $deleteEventsPermission = Permission::create(['name' => UserPermissionsEnum::DeleteEvents->value]);

        $createForumPostsPermission = Permission::create(['name' => UserPermissionsEnum::CreateForumPosts->value]);
        $viewForumPostsPermission = Permission::create(['name' => UserPermissionsEnum::ViewForumPosts->value]);
        $updateForumPostsPermission = Permission::create(['name' => UserPermissionsEnum::UpdateForumPosts->value]);
        $deleteForumPostsPermission = Permission::create(['name' => UserPermissionsEnum::DeleteForumPosts->value]);

        $createPostsPermission = Permission::create(['name' => UserPermissionsEnum::CreatePosts->value]);
        $viewPostsPermission = Permission::create(['name' => UserPermissionsEnum::ViewPosts->value]);
        $updatePostsPermission = Permission::create(['name' => UserPermissionsEnum::UpdatePosts->value]);
        $deletePostsPermission = Permission::create(['name' => UserPermissionsEnum::DeletePosts->value]);

        $createResourcesPermission = Permission::create(['name' => UserPermissionsEnum::CreateResources->value]);
        $viewResourcesPermission = Permission::create(['name' => UserPermissionsEnum::ViewResources->value]);
        $updateResourcesPermission = Permission::create(['name' => UserPermissionsEnum::UpdateResources->value]);
        $deleteResourcesPermission = Permission::create(['name' => UserPermissionsEnum::DeleteResources->value]);

        $createThreadsPermission = Permission::create(['name' => UserPermissionsEnum::CreateThreads->value]);
        $viewThreadsPermission = Permission::create(['name' => UserPermissionsEnum::ViewThreads->value]);
        $updateThreadsPermission = Permission::create(['name' => UserPermissionsEnum::UpdateThreads->value]);
        $deleteThreadsPermission = Permission::create(['name' => UserPermissionsEnum::DeleteThreads->value]);

        //For Super Admin
        $forceDeletePermission = Permission::create(['name' => UserPermissionsEnum::ForceDelete->value]);

        //Assign Permissions to Roles
        $superAdminRole->syncPermissions([
            //Only Super Admin can delete from trash
            $forceDeletePermission,

            $createUsersPermission,
            $viewUsersPermission,
            $updateUsersPermission,
            $deleteUsersPermission,
            $createJobsPermission,
            $viewJobsPermission,
            $updateJobsPermission,
            $deleteJobsPermission,
            $createEventsPermission,
            $viewEventsPermission,
            $updateEventsPermission,
            $deleteEventsPermission,
            $createForumPostsPermission,
            $viewForumPostsPermission,
            $updateForumPostsPermission,
            $deleteForumPostsPermission,
            $createPostsPermission,
            $viewPostsPermission,
            $updatePostsPermission,
            $deletePostsPermission,
            $createResourcesPermission,
            $viewResourcesPermission,
            $updateResourcesPermission,
            $deleteResourcesPermission,
            $createThreadsPermission,
            $viewThreadsPermission,
            $updateThreadsPermission,
            $deleteThreadsPermission,
        ]);

        $adminRole->syncPermissions([
            $createUsersPermission,
            $viewUsersPermission,
            $updateUsersPermission,
            $deleteUsersPermission,
            $createJobsPermission,
            $viewJobsPermission,
            $updateJobsPermission,
            $deleteJobsPermission,
            $createEventsPermission,
            $viewEventsPermission,
            $updateEventsPermission,
            $deleteEventsPermission,
            $createForumPostsPermission,
            $viewForumPostsPermission,
            $updateForumPostsPermission,
            $deleteForumPostsPermission,
            $createPostsPermission,
            $viewPostsPermission,
            $updatePostsPermission,
            $deletePostsPermission,
            $createThreadsPermission,
            $viewThreadsPermission,
            $updateThreadsPermission,
            $deleteThreadsPermission,
        ]);

        // Editor Role can create, read, update on some routes.
        $editorRole->syncPermissions([
            $createJobsPermission,
            $viewJobsPermission,
            $updateJobsPermission,
            $createEventsPermission,
            $viewEventsPermission,
            $updateEventsPermission,
            $createForumPostsPermission,
            $viewForumPostsPermission,
            $updateForumPostsPermission,
            $createPostsPermission,
            $viewPostsPermission,
            $updatePostsPermission,
            $createResourcesPermission,
            $viewResourcesPermission,
            $updateResourcesPermission,
            $createThreadsPermission,
            $viewThreadsPermission,
            $updateThreadsPermission,
            $deleteThreadsPermission,
        ]);

        // User Role can create, read on some routes.
        $userRole->syncPermissions([
            $viewJobsPermission,
            $viewEventsPermission,
            $createForumPostsPermission,
            $viewForumPostsPermission,
            $updateForumPostsPermission,
            $deleteForumPostsPermission,
            $viewPostsPermission,
            $viewResourcesPermission,
            $createThreadsPermission,
            $viewThreadsPermission,
            $updateThreadsPermission,
            $deleteThreadsPermission,
        ]);

    }
}
