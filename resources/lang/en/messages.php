<?php

return [
    'home'                                => 'Home',
    'system'                              => 'System',
    'name'                                => 'Name',
    'title'                               => 'Title',
    'action'                              => 'Actions',
    'save'                                => 'Save',
    'cancel'                              => 'Cancel',
    'version'                             => 'Version',
    'login'                               => 'Login',
    'password'                            => 'Password',
    'confirm_password'                    => 'Confirm Password',
    'sign_in'                             => 'Sign In',
    'sign_up'                             => 'Sign Up',
    'remember_me'                         => 'Remember me',
    'forget_password'                     => 'Forgot your password?',
    'success_user_add'                    => 'User added successfully',
    'success_role_add'                    => 'Role added successfully',
    'success_permission_add'              => 'Permission added successfully',
    'success_user_edit'                   => 'User edited successfully',
    'success_role_edit'                   => 'Role edited successfully',
    'success_permission_edit'             => 'Permission edited successfully',
    'success_user_delete'                 => 'User deleted successfully',
    'success_role_delete'                 => 'Role deleted successfully',
    'success_permission_delete'           => 'Permission deleted successfully',

    'success_department_add'              => 'Department successfully added',
    'success_department_edit'             => 'Department successfully edited',
    'success_department_delete'           => 'Department successfully deleted',

    'success_position_add'                => 'Position successfully added',
    'success_position_edit'               => 'Position successfully edited',
    'success_position_delete'             => 'Position successfully deleted',

    'success_staff_add'                   => 'Staff successfully added',
    'success_staff_edit'                  => 'Staff successfully updated',
    'success_staff_delete'                => 'Staff successfully deleted',

    'success_news_add'                    => 'News successfully added',
    'success_news_edit'                   => 'News successfully edited',
    'success_news_delete'                 => 'News successfully deleted',

    'success_ads_add'                     => 'Ads successfully added',
    'success_ads_edit'                    => 'Ads successfully edited',
    'success_ads_delete'                  => 'Ads successfully deleted',

    'success_category_add'                => 'Program category successfully added',
    'success_category_edit'               => 'Program category successfully edited',
    'success_category_delete'             => 'Program category successfully deleted',

    'success_software_add'                => 'Software successfully added',
    'success_software_edit'               => 'Software successfully edited',
    'success_software_delete'             => 'Software successfully deleted',

    'success_slider_add'                  => 'Slider successfully added',
    'success_slider_edit'                 => 'Slider successfully edited',
    'success_slider_delete'               => 'Slider successfully deleted',



    'crud' => [
        'add'    => 'Добавить',
        'edit'   => 'Редактировать',
        'delete' => 'Удалить',
        'show'   => 'Просмотреть',
    ],


    'lang' => [
        'title' => 'Choose language',
        'uz'    => 'Uzbek',
        'en'    => 'English',
        'ru'    => 'Russian',
    ],

    'users' => [
        'title'       => 'Users',
        'fullname'    => 'Fullname',
        'email'       => 'Email',
        'user_create' => 'Add User',
        'user_edit'   => 'Edit User',
        'user_delete' => 'Delete User',
        'user_view'   => 'View User',
    ],

    'roles' => [
        'title'       => 'Roles',
        'role_create' => 'Add Role',
        'role_edit'   => 'Edit Role',
        'role_delete' => 'Delete Role',
        'role_view'   => 'View Role',
    ],

    'permissions' => [
        'title'             => 'Permissions',
        'permission_create' => 'Add Permission',
        'permission_edit'   => 'Edit Permission',
        'permission_delete' => 'Delete Permission',
        'permission_view'   => 'View Permission',
    ],

    'departments' => [
        'title'             => 'Departments',
        'name'              => 'Name',
        'department_create' => 'Add Departments',
        'department_edit'   => 'Edit Departments',
        'department_delete' => 'Delete Departments',
        'department_view'   => 'View Departments',
    ],

    'staffs' => [
        'title'      => 'Employees',
        'fullname'   => 'Full Name',
        'photo'      => 'Photo',
        'position'   => 'Position',
        'department' => 'Department',
        ],

        'sliders' => [
            'name'      => 'Slider',
            'title'     => 'Title',
            'caption'   => 'Caption',
            'photo'     => 'Photo',
        ],

        'software_categories' => [
            'name' => 'Software Categories',
        ],

        'positions' => [
            'title'      => 'Positions',
            'name'       => 'Name',
        ],

        'softwares' => [
            'title'         => 'Software',
            'name'          => 'Name',
            'description'   => 'Description',
            'photo'         => 'Photo',
        ],

        'projects' => [
            'name'          => 'Name',
            'description'   => 'Description',
            'photo'         => 'Photo',
        ],

        'news' => [
            'title'         => 'Title',
            'name'          => 'News',
            'description'   => 'Description',
            'photo'         => 'Photo',
            'user_id'       => 'Entered by',
        ],

        'ads' => [
            'title'         => 'Title',
            'name'          => 'Announcements',
            'description'   => 'Description',
            'photo'         => 'Photo',
            'user_id'       => 'Entered by',
        ],

        'requests' => [
            'title'         => 'Requests',
            'fullname'      => 'Full Name',
            'department'    => 'Department',
            'file'          => 'File',
            'text'          => 'Message',
            'faculty'       => 'Faculty or Organization',
            'accept'        => 'Request accepted',
            'reject'        => 'Request rejected',
        ],

        'validation' => [
            'department_required' => 'Department selection is required.',
            'department_exists'   => 'This department does not exist.',
            'name_uz_required'    => 'Uzbek name is required.',
            'name_en_required'    => 'English name is required.',
            'name_ru_required'    => 'Russian name is required.',
            'string'              => 'The :attribute must be a string.',
            'max'                 => 'The :attribute must not exceed :max characters.',
        ],
        'department_created' => 'Department successfully created.',

];
