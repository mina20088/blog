<?php

namespace App\Enums;

enum DashboardNavigationSideBarItems: string
{
    case Dashboard = 'DashboardController';
    case Posts = 'Posts';
    case Users = 'Users';
    case SignOut = 'Sign out';
}
