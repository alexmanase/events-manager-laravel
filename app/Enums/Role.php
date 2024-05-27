<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = "admin";
    case CORPORATE_ADMIN = "corporate_admin";
    case AUTHORIZED_REPORTER = "authorized_reporter";
    case REPORTER = "reporter";
    case READER = "reader";
}
