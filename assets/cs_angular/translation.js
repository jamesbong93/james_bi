(function (angular) {
    'use strict';
    angular.module('BiApp').config(['$translateProvider', function ($translateProvider) {

        $translateProvider.useSanitizeValueStrategy(null);
        $translateProvider.preferredLanguage('en');

        $translateProvider.translations('en', {
            header_you_have: 'You have',
            header_message: 'message',
            header_notification: 'notification',
            header_task: 'task',
            header_view_all: 'View all',
            header_complete: 'Complete',
            header_member_since: 'Member since',
            header_followers: 'Followers',
            header_sales: 'Sales',
            header_friends: 'Friends',
            header_profile: 'Profile',
            header_sign_out: 'Sign out',

            menu_online: 'Online',
            menu_search: 'Search',
            menu_access_website: 'Access to the Web site',
            menu_main_navigation: 'Main Navigation',
            menu_dashboard: 'Dashboard',
            menu_administration: 'Administration',
            menu_users: 'Users',
            menu_users_profile: 'Profile',
            menu_users_deactivate: 'Deactivate',
            menu_users_create: 'Create',
            menu_users_edit: 'Edit',
            menu_security_groups: 'Security groups',
            menu_groups_create: 'Create',
            menu_groups_edit: 'Edit',
            menu_prefe1rences: 'Preferences',
            menu_interfaces: 'Interfaces',
            menu_int_admin: 'Administration',
            menu_int_public: 'Public',
            menu_report: 'Reports',
            menu_files: 'Files',

            actions_cancel: 'Cancel',
            actions_create: 'Create',
            actions_default_values: 'Default values',
            actions_edit: 'Edit',
            actions_ok: 'Ok',
            actions_no: 'No',
            actions_reset: 'Reset',
            actions_see: 'See',
            actions_yes: 'Yes',
            actions_submit: 'Submit',
            actions_delete: 'Delete',
            actions_security_error: 'Security error',
            actions_file_install_exist: 'You must %s the installation files.',

            users_action: 'Action',
            users_active: 'Active',
            users_company: 'Company',
            users_create_user: 'Create user',
            users_created_on: 'Created on',
            users_deactivate_question: 'Are you sure you want to deactivate the user ?',
            users_edit_user: 'Edit user',
            users_email: 'Email',
            users_firstname: 'First name',
            users_groups: 'Groups',
            users_inactive: 'Inactive',
            users_ip_address: 'IP address',
            users_last_login: 'Last login',
            users_lastname: 'Last name',
            users_member_of_groups: 'Member of groups',
            users_password: 'Password',
            users_password_confirm: 'Password confirm',
            users_phone: 'Phone',
            users_status: 'Status',
            users_username: 'User name / Pseudo',

            groups_name: 'Name',
            groups_description: 'Description',
            groups_action: 'Action',
            groups_edit_group: 'Edit group',
            groups_create: 'Create group',
            groups_color: 'Color',

            footer_copyright: 'Copyright',
            footer_all_rights_reserved: 'All rights reserved',
            footer_version: 'version'


        });

        $translateProvider.translations('cn', {
            header_you_have: '你有',
            header_message: '信息',
            header_notification: '提示',
            header_task: '项目',
            header_view_all: '显示全部',
            header_complete: '完成',
            header_member_since: '会员注册日期',
            header_followers: '跟踪者',
            header_sales: '业务',
            header_friends: '朋友',
            header_profile: '个人主页',
            header_sign_out: '退出',

            menu_online: '在线',
            menu_search: '搜索',
            menu_access_website: '进入主页',
            menu_main_navigation: '主要导航',
            menu_dashboard: '仪表板',
            menu_administration: '行政管理',
            menu_users: '用户管理',
            menu_users_profile: '个人主页',
            menu_users_deactivate: '冻结',
            menu_users_create: '创建用户',
            menu_users_edit: '更改用户',
            menu_security_groups: '组别管理',
            menu_groups_create: '添加组别',
            menu_groups_edit: '更改组别',
            menu_prefe1rences: '优先权',
            menu_interfaces: '界面管理',
            menu_int_admin: '行政',
            menu_int_public: '公开',
            menu_report: '报告管理',
            menu_files: '文件管理',
            

            actions_cancel: '取消',
            actions_create: '创建',
            actions_default_values: '默认数值',
            actions_edit: '更改',
            actions_ok: 'Ok',
            actions_no: 'No',
            actions_reset: '重设',
            actions_see: 'See',
            actions_yes: 'Yes',
            actions_submit: '提交',
            actions_delete: '删除',
            actions_security_error: '安全问题',
            actions_file_install_exist: '必须安装某些文件',

            users_action: '操作',
            users_active: '正常',
            users_company: '公司',
            users_create_user: '创建用户',
            users_created_on: '创建时间',
            users_deactivate_question: '确定冻结这个用户 ?',
            users_edit_user: '编辑用户',
            users_email: '邮件',
            users_firstname: '名字',
            users_groups: '组别',
            users_inactive: '冻结',
            users_ip_address: 'IP地址',
            users_last_login: '最后登录',
            users_lastname: '姓氏',
            users_member_of_groups: '用户组别',
            users_password: '密码',
            users_password_confirm: '确认密码',
            users_phone: '电话号码',
            users_status: '状态',
            users_username: '用户名字',

            groups_name: '组名',
            groups_description: '描述',
            groups_action: '操作',
            groups_edit_group: '组别更改',
            groups_create: '创建组别',
            groups_color: '颜色',

            footer_copyright: '版权',
            footer_all_rights_reserved: '版权所有',
            footer_version: '版本'
            


        });




    }]);
})(angular);
